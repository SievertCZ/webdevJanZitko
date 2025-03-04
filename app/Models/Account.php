<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    protected $fillable = [
        'user_id',
        'account_number',
        'bank_name',
        'iban',
        'swift',
    ];

    /**
     * Relace na transakce
     */
    public function transaction(): HasMany
    {
        return $this->hasMany(Transactions::class);
    }
}
