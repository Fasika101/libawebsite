<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Support\UploadedImage;
use Illuminate\Http\Request;

class BrandingController extends Controller
{
    public function edit()
    {
        $assets = $this->assets();
        foreach ($assets as $key => $asset) {
            $path = $this->current($key);
            $assets[$key]['path'] = $path;
            $assets[$key]['preview'] = $this->previewUrl($key, $path);
            $assets[$key]['custom'] = str_starts_with($key, 'travel_')
                ? str_starts_with($path, 'assets/brand/')
                : str_starts_with($path, 'image/brand/');
        }

        return view('branding.edit', ['assets' => $assets]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'main_logo' => UploadedImage::rules(),
            'main_footer_logo' => UploadedImage::rules(),
            'main_favicon' => UploadedImage::rules(true),
            'travel_logo' => UploadedImage::rules(),
            'travel_favicon' => UploadedImage::rules(true),
            'restore' => ['nullable', 'array'],
            'restore.*' => ['in:main_logo,main_footer_logo,main_favicon,travel_logo,travel_favicon'],
        ]);

        $changed = false;

        foreach (array_keys($this->assets()) as $key) {
            if ($request->boolean('restore.'.$key)) {
                $this->deleteUploaded($key, $this->current($key));
                $this->saveSetting($key, '');
                $changed = true;
                continue;
            }

            if (! $request->hasFile($key) && ! $request->filled($key.'_data')) {
                continue;
            }

            $this->deleteUploaded($key, $this->current($key));
            $stored = UploadedImage::storeRequest($request, $key, $this->directoryFor($key));
            if ($stored === null) {
                continue;
            }
            $this->saveSetting($key, $this->saveStoredPath($key, $stored));
            $changed = true;
        }

        return redirect()
            ->route('branding.edit')
            ->with('status', $changed ? 'Logo and favicon updated.' : 'No new images were selected.');
    }

    private function assets(): array
    {
        return [
            'main_logo' => [
                'label' => 'Header logo',
                'hint' => 'Shown in the main site navigation.',
                'group' => 'Main site',
            ],
            'main_footer_logo' => [
                'label' => 'Footer logo',
                'hint' => 'Shown in the main site footer.',
                'group' => 'Main site',
            ],
            'main_favicon' => [
                'label' => 'Favicon',
                'hint' => 'Browser tab icon for the main site.',
                'group' => 'Main site',
            ],
            'travel_logo' => [
                'label' => 'Logo',
                'hint' => 'Shown in the Liba Travel header.',
                'group' => 'Liba Travel',
            ],
            'travel_favicon' => [
                'label' => 'Favicon',
                'hint' => 'Browser tab icon for Liba Travel.',
                'group' => 'Liba Travel',
            ],
        ];
    }

    private function current(string $key): string
    {
        $defaults = [
            'main_logo' => 'image/new_logo.png',
            'main_footer_logo' => 'image/footer_logo.png',
            'main_favicon' => 'image/logo.jpg',
            'travel_logo' => 'assets/logo_main.png',
            'travel_favicon' => 'assets/favicon.png',
        ];

        $value = SiteSetting::where('setting_key', $key)->value('setting_value');

        return ($value === null || $value === '') ? $defaults[$key] : $value;
    }

    private function previewUrl(string $key, string $path): string
    {
        $base = rtrim((string) config('liba.public_site_url'), '/');
        if (str_starts_with($key, 'travel_')) {
            return $base.'/travel/'.ltrim($path, '/');
        }

        return $base.'/'.ltrim($path, '/');
    }

    private function saveSetting(string $key, string $value): void
    {
        $labels = [
            'main_logo' => 'Main header logo',
            'main_footer_logo' => 'Main footer logo',
            'main_favicon' => 'Main favicon',
            'travel_logo' => 'Travel logo',
            'travel_favicon' => 'Travel favicon',
        ];

        SiteSetting::updateOrCreate(
            ['setting_key' => $key],
            ['label' => $labels[$key], 'setting_value' => $value, 'sort_order' => 40]
        );
    }

    private function directoryFor(string $key): string
    {
        $folder = str_starts_with($key, 'travel_')
            ? 'travel'.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'brand'
            : 'image'.DIRECTORY_SEPARATOR.'brand';

        return dirname(base_path()).DIRECTORY_SEPARATOR.$folder;
    }

    private function saveStoredPath(string $key, string $filename): string
    {
        return str_starts_with($key, 'travel_')
            ? 'assets/brand/'.$filename
            : 'image/brand/'.$filename;
    }

    private function deleteUploaded(string $key, string $path): void
    {
        $custom = str_starts_with($key, 'travel_')
            ? str_starts_with($path, 'assets/brand/')
            : str_starts_with($path, 'image/brand/');

        if (! $custom) {
            return;
        }

        $relative = str_starts_with($key, 'travel_') ? 'travel/'.$path : $path;
        $fullPath = dirname(base_path()).DIRECTORY_SEPARATOR.str_replace('/', DIRECTORY_SEPARATOR, $relative);
        if (is_file($fullPath)) {
            unlink($fullPath);
        }
    }
}
