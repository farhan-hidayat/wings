<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TransactionDetail extends Model
{
    protected $fillable = [
        'code',
        'transactions_id',
        'products_id',
        'price',
        'quantity',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'products_id');
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'id', 'transactions_id');
    }

    public function user()

    {
        return $this->hasManyThrough(Transaction::class, User::class);
    }    // public function transactionUser()
    // {
    //     return $this->hasOneThrough(Transaction::class, User::class);
    // }
}
