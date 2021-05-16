<?php
namespace App\Repositories;

use App\Models\Orders\Book;
use App\Repositories\Contracts\BookRepositoryInterface;

class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    public function __construct(Book $book)
    {
        parent::__construct($book);
    }

    public function create(array $attributes): Book
    {
        return $this->model->create([
            'title' => $attributes['title'],
            'slug' => slugger($attributes['title'], Book::class),
            'amount' => $attributes['amount'],
            'author' => $attributes['author'],
            'desc' => $attributes['desc'],
        ]);
    }

    public function update(int $id, array $attributes): Book
    {
        $book = $this->model->findOrFail($id);
        foreach ( $attributes as $key => $value) {
            if (model_has_attribute($this->model, $key) && !in_array($key, self::GUARDED) ) {
                $this->model->$key = $value;
            }
        }
        $book->save();
        return $book;
    }
}
