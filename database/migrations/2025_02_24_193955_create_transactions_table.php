<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->date('transaction_date')->comment('Datum transakce');

            // Odkaz na kategorii
            $table->unsignedBigInteger('category_id')->comment('ID kategorie');
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');

            $table->decimal('amount', 10, 2)->comment('Částka');

            // Odkaz na účet
            $table->unsignedBigInteger('account_id')->comment('ID účtu');
            $table->foreign('account_id')
                ->references('id')->on('accounts')
                ->onDelete('cascade');

            $table->text('note')->nullable()->comment('Poznámka');
            $table->string('inserted_by')->comment('Kdo vložil');
            $table->timestamp('inserted_at')->comment('Datum a čas vložení');

            // Sloupec pro typ transakce: 'income' (příjem) nebo 'expense' (výdaj)
            $table->enum('transaction_type', ['income', 'expense'])->comment('Typ transakce: příjem/výdaj');

            // Sloupec pro ikonu (např. cesta k souboru v public složce nebo URL)
            $table->string('icon')->nullable()->comment('Ikona');

            $table->timestamps();
        });

        // Vložení testovacích dat do tabulky transactions
        DB::table('transactions')->insert([
            [
                'transaction_date' => '2025-01-12',
                // Odkazujeme na kategorii "Jídlo" (ID 1)
                'category_id'      => 1,
                'amount'           => 5000.00,
                // Odkazujeme na účet ČSOB (ID 1)
                'account_id'       => 1,
                'note'             => 'Testovací transakce - nákup potravin',
                'inserted_by'      => 'Jan Novák',
                'inserted_at'      => now(),
                'transaction_type' => 'expense',
                'icon'             => 'img/transaction1.png',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'transaction_date' => '2025-01-15',
                // Odkazujeme na kategorii "Restaurace" (ID 2)
                'category_id'      => 2,
                'amount'           => 3000.00,
                // Odkazujeme na účet Komerční banka (ID 2)
                'account_id'       => 2,
                'note'             => 'Testovací transakce - oběd v restauraci',
                'inserted_by'      => 'Petr Svoboda',
                'inserted_at'      => now(),
                'transaction_type' => 'expense',
                'icon'             => 'img/transaction2.png',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'transaction_date' => '2025-01-18',
                // Opět odkaz na kategorii "Jídlo" (ID 1)
                'category_id'      => 1,
                'amount'           => 10000.00,
                // Opět účet ČSOB (ID 1)
                'account_id'       => 1,
                'note'             => 'Testovací transakce - příjem z prodeje',
                'inserted_by'      => 'Lucie Dvořáková',
                'inserted_at'      => now(),
                'transaction_type' => 'income',
                'icon'             => 'img/transaction3.png',
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
