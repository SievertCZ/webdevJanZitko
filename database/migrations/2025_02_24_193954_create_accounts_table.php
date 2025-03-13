<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('ID uživatele');
            $table->string('account_number')->comment('Číslo účtu');
            $table->string('bank_name')->comment('Název banky');
            $table->string('iban')->nullable()->comment('IBAN');
            $table->string('swift')->nullable()->comment('SWIFT');
            $table->timestamps();

            // Cizí klíč na tabulku users
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });

        // ✅ Vložení testovacích dat
        $this->seedData();
    }

    public function down()
    {
        Schema::dropIfExists('accounts');
    }

    private function seedData()
    {
        // Získání uživatele s ID 1 nebo jeho vytvoření
        $user = DB::table('users')->where('id', 1)->first();

        if (!$user) {
            $userId = DB::table('users')->insertGetId([
                'name' => 'Cristian',
                'email' => 'info@sievert-consulting.cz',
                'password' => bcrypt('HESLO12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            $userId = $user->id;
        }


        // ✅ Vložení účtů s vazbou na uživatele
        DB::table('accounts')->insert([
            [
                'user_id'       => $userId, // Vazba na uživatele
                'account_number' => '1234567890',
                'bank_name'      => 'ČSOB',
                'iban'           => 'CZ6508000000192000145399',
                'swift'          => 'CSOBCZPP',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'user_id'       => $userId, // Vazba na uživatele
                'account_number' => '0987654321',
                'bank_name'      => 'Komerční banka',
                'iban'           => 'CZ6508000000192000145398',
                'swift'          => 'KOMBCZPP',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ]);
    }
};
