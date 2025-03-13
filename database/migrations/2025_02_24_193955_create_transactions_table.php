<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->date('transaction_date')->comment('Datum transakce');

            // Odkaz na uživatele
            $table->unsignedBigInteger('user_id')->comment('ID uživatele');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Odkaz na kategorii
            $table->unsignedBigInteger('category_id')->comment('ID kategorie');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            // Odkaz na účet
            $table->unsignedBigInteger('account_id')->comment('ID účtu');
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            $table->decimal('amount', 10, 2)->comment('Částka');
            $table->text('note')->nullable()->comment('Poznámka');
            $table->enum('transaction_type', ['income', 'expense'])->comment('Typ transakce: příjem/výdaj');
            $table->timestamps();
        });

        // ✅ Vložení testovacích dat
        $this->seedData();
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }

    private function seedData()
    {
        // Získání uživatele, účtů a kategorií
        $user = DB::table('users')->where('id', 1)->first();
        if (!$user) {
            $userId = DB::table('users')->insertGetId([
                'name' => 'Testovací uživatel',
                'email' => 'test@user.com',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            $userId = $user->id;
        }

        $csobAccount = DB::table('accounts')->where('bank_name', 'ČSOB')->first();
        $kbAccount = DB::table('accounts')->where('bank_name', 'Komerční banka')->first();

        $foodCategory = DB::table('categories')->where('name', 'Jídlo')->first();
        $restaurantCategory = DB::table('categories')->where('name', 'Restaurace')->first();

        // ✅ Vložení testovacích transakcí
        DB::table('transactions')->insert([
            [
                'transaction_date' => '2025-01-12',
                'user_id' => $userId,
                'category_id' => $foodCategory->id ?? null,
                'account_id' => $csobAccount->id ?? null,
                'amount' => 5000.00,
                'note' => 'Testovací transakce - nákup potravin',
                'transaction_type' => 'expense',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'transaction_date' => '2025-01-15',
                'user_id' => $userId,
                'category_id' => $restaurantCategory->id ?? null,
                'account_id' => $kbAccount->id ?? null,
                'amount' => 3000.00,
                'note' => 'Testovací transakce - oběd v restauraci',
                'transaction_type' => 'expense',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'transaction_date' => '2025-01-18',
                'user_id' => $userId,
                'category_id' => $foodCategory->id ?? null,
                'account_id' => $csobAccount->id ?? null,
                'amount' => 10000.00,
                'note' => 'Testovací transakce - příjem z prodeje',
                'transaction_type' => 'income',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
};
