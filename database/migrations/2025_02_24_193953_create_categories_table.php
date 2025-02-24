<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Název kategorie');
            $table->string('icon')->nullable()->comment('Ikona kategorie');
            $table->unsignedBigInteger('parent_id')->nullable()->comment('ID nadřazené kategorie (pokud existuje)');
            $table->foreign('parent_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
            $table->timestamps();
        });

        // Vložení testovacích dat do tabulky categories
        DB::table('categories')->insert([
            [
                'name'       => 'Jídlo',
                'icon'       => 'img/food.png',
                'parent_id'  => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Restaurace',
                'icon'       => 'img/restaurant.png',
                // Předpokládáme, že první vložená kategorie "Jídlo" má ID 1
                'parent_id'  => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Doprava',
                'icon'       => 'img/transport.png',
                'parent_id'  => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
