<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgodaFieldsToHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bravo_hotels', function (Blueprint $blueprint) {
            if (!Schema::hasColumn('bravo_hotels', 'agoda_hotel_id')) {
                $blueprint->string('agoda_hotel_id')->nullable()->index();
            }
            if (!Schema::hasColumn('bravo_hotels', 'agoda_last_synced_at')) {
                $blueprint->timestamp('agoda_last_synced_at')->nullable();
            }
            if (!Schema::hasColumn('bravo_hotels', 'agoda_data')) {
                $blueprint->json('agoda_data')->nullable(); // Store full Agoda response if needed
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bravo_hotels', function (Blueprint $blueprint) {
            $blueprint->dropColumn(['agoda_hotel_id', 'agoda_last_synced_at', 'agoda_data']);
        });
    }
}
