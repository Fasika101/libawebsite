<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('blog_posts') && ! Schema::hasColumn('blog_posts', 'channel')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->string('channel', 20)->default('main')->index()->after('status');
            });
        }

        $now = now();
        $settings = [
            ['travel_blog_heading', 'Travel blog heading', 'Travel notes', 22],
            ['travel_blog_intro', 'Travel blog introduction', 'Flight, hotel, and travel notes from Liba Travel in Addis Ababa.', 23],
        ];

        if (Schema::hasTable('site_settings')) {
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
    }

    public function down(): void
    {
        if (Schema::hasTable('site_settings')) {
            DB::table('site_settings')->whereIn('setting_key', ['travel_blog_heading', 'travel_blog_intro'])->delete();
        }

        if (Schema::hasTable('blog_posts') && Schema::hasColumn('blog_posts', 'channel')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->dropColumn('channel');
            });
        }
    }
};
