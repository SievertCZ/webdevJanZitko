<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_date',
        'user_id',
        'category_id',
        'amount',
        'account_id',
        'note',
        'transaction_type',
    ];

    /**
     * Vztah k účtu
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * Vztah ke kategorii
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Vztah k uživateli (přidáno pro správné propojení)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
