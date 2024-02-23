<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_technology', function (Blueprint $table) {
            $table->foreignId('technology_id')->constrained('technologies');
            $table->foreignId('project_id')->constrained('projects');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('type_id')->constrained('types');
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            $table->dropColumn('type_id');
        });
        Schema::table('project_technology', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropColumn('project_id');

            $table->dropForeign(['technology_id']);
            $table->dropColumn('technology_id');
        });
    }
};
