<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('blog_posts')) {
            Schema::create('blog_posts', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug', 191)->unique();
                $table->string('excerpt', 500)->nullable();
                $table->longText('body');
                $table->string('cover_image')->nullable();
                $table->enum('status', ['draft', 'published'])->default('draft');
                $table->string('channel', 20)->default('main')->index();
                $table->timestamp('published_at')->nullable();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('site_settings')) {
            Schema::create('site_settings', function (Blueprint $table) {
                $table->id();
                $table->string('setting_key', 191)->unique();
                $table->string('label');
                $table->text('setting_value')->nullable();
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
            });
        }

        $now = now();
        $settings = [
            ['phone_primary', 'Primary phone', '+251 942 81 6768', 1],
            ['phone_secondary', 'Secondary phone', '+251 901 20 8372', 2],
            ['email_primary', 'Primary email', 'info@libadigitals.com', 3],
            ['email_sales', 'Sales email', 'sales@libadigitals.com', 4],
            ['address', 'Address', 'Addis Ababa, Ethiopia', 5],
            ['hours_weekday', 'Weekday hours', 'Monday - Friday: 9:00 AM - 6:00 PM', 6],
            ['hours_saturday', 'Saturday hours', 'Saturday: 10:00 AM - 4:00 PM', 7],
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
        Schema::dropIfExists('blog_posts');
        Schema::dropIfExists('site_settings');
    }
};
