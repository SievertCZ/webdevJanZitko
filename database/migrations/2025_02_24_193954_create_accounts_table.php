<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_number')->comment('Číslo účtu');
            $table->string('bank_name')->comment('Název banky');
            $table->string('iban')->nullable()->comment('IBAN');
            $table->string('swift')->nullable()->comment('SWIFT');
            $table->timestamps();
        });

        // Vložení testovacích dat do tabulky accounts
        DB::table('accounts')->insert([
            [
                'account_number' => '1234567890',
                'bank_name'      => 'ČSOB',
                'iban'           => 'CZ6508000000192000145399',
                'swift'          => 'CSOBCZPP',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'account_number' => '0987654321',
                'bank_name'      => 'Komerční banka',
                'iban'           => 'CZ6508000000192000145398',
                'swift'          => 'KOMBCZPP',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
