<?php
namespace App\Repositories\Contracts;

use App\Models\Orders\Book;

interface BookRepositoryInterface
{
    public function create(array $attributes) : Book;
    public function update(int $id,array $attributes) : Book;
}
