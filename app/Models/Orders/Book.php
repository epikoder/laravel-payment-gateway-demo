<?php

namespace App\Models\Orders;

use Epikoder\LaravelPaymentGateway\Contracts\OrderInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model implements OrderInterface
{
    use HasFactory;

    protected $fillable = [
        'title',
        'amount',
        'author',
        'desc',
        'slug',
    ];

    public function identifier(): string
    {
        return $this->slug;
    }

    public function amount(): int
    {
        return $this->amount;
    }
}
