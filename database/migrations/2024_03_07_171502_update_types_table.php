<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up(): void
        {
            Schema::table('projects', function (Blueprint $table) {
                $table->unsignedBigInteger('type_id')->nullable();

                $table->foreign('type_id')
                    ->references('id')
                    ->on('types')
                    ->onUpdate('cascade')
                    ->onDelete('set Null'); // Assicurati che il nome della tabella sia 'types' e non 'tipes'
            });
        }

        public function down(): void
        {
            Schema::table('projects', function (Blueprint $table) {
                if (Schema::hasColumn('projects', 'type_id')) {
                    $table->dropForeign(['type_id']);
                    $table->dropColumn('type_id');
                }
            });
        }
};
