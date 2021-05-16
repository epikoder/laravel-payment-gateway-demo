<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider',
        'transaction_reference',
        'amount',
        'order_id',
        'successful',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
