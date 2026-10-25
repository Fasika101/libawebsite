<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();
        $settings = [
            ['blog_heading', 'Blog page heading', 'Blog', 20],
            ['blog_intro', 'Blog page introduction', 'Notes and updates from Liba Digitals.', 21],
        ];

        foreach ($settings as [$key, $label, $value, $order]) {
            DB::table('site_settings')->insertOrIgnore([
                'setting_key' => $key,
                'label' => $label,
                'setting_value' => $value,
                'sort_order' => $order,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    public function down(): void
    {
        DB::table('site_settings')->whereIn('setting_key', ['blog_heading', 'blog_intro'])->delete();
    }
};
