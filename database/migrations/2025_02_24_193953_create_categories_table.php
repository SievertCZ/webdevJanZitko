<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Název kategorie');
            $table->string('icon')->nullable()->comment('Ikona kategorie (Material Icons)');
            $table->enum('type', ['income', 'expense', 'investment'])->comment('Typ kategorie: příjem, výdaj, investice');
            $table->unsignedBigInteger('parent_id')->nullable()->comment('ID nadřazené kategorie (pokud existuje)');
            $table->foreign('parent_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');
            $table->timestamps();
        });

        // ✅ Naplnění tabulky testovacími daty
        $this->seedData();
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }

    private function seedData()
    {
        // 🔹 Hlavní kategorie pro výdaje
        $foodId = DB::table('categories')->insertGetId([
            'name' => 'Jídlo',
            'icon' => 'restaurant',
            'type' => 'expense',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $transportId = DB::table('categories')->insertGetId([
            'name' => 'Doprava',
            'icon' => 'directions_bus',
            'type' => 'expense',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 🔹 Podkategorie pro výdaje
        DB::table('categories')->insert([
            ['name' => 'Restaurace', 'parent_id' => $foodId, 'icon' => 'local_dining', 'type' => 'expense', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fast Food', 'parent_id' => $foodId, 'icon' => 'fastfood', 'type' => 'expense', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Nákup potravin', 'parent_id' => $foodId, 'icon' => 'shopping_cart', 'type' => 'expense', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'MHD', 'parent_id' => $transportId, 'icon' => 'directions_subway', 'type' => 'expense', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Auto', 'parent_id' => $transportId, 'icon' => 'directions_car', 'type' => 'expense', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vlak', 'parent_id' => $transportId, 'icon' => 'train', 'type' => 'expense', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 🔹 Hlavní kategorie pro příjmy
        $incomeId = DB::table('categories')->insertGetId([
            'name' => 'Příjmy',
            'icon' => 'attach_money',
            'type' => 'income',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 🔹 Podkategorie pro příjmy
        DB::table('categories')->insert([
            ['name' => 'Mzda', 'parent_id' => $incomeId, 'icon' => 'work', 'type' => 'income', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Důchod', 'parent_id' => $incomeId, 'icon' => 'elderly', 'type' => 'income', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ostatní', 'parent_id' => $incomeId, 'icon' => 'more_horiz', 'type' => 'income', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 🔹 Hlavní kategorie pro investice
        $investmentId = DB::table('categories')->insertGetId([
            'name' => 'Investice',
            'icon' => 'trending_up',
            'type' => 'investment',
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
};
