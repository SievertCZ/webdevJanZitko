<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'transaction_date',
        'category_id',
        'amount',
        'account_id',
        'note',
        'inserted_by',
        'inserted_at',
        'transaction_type',
        'icon',
    ];

    // Pokud potřebuješ vazbu na account:
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    // Pokud máš vazbu na category:
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
