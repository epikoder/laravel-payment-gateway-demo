<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\CreateBookRequest;
use App\Repositories\BookRepository;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function index()
    {
        
    }

    public function create_form()
    {
        return view('books.create');
    }

    public function create(CreateBookRequest $createBookRequest)
    {
        $book = $this->bookRepository->create(request()->all());
        return redirect()->route('books.view', ['slug' =>  $book->slug]);
    }

    public function view($slug)
    {
        $book = $this->bookRepository->findBySlug($slug);
        return view('books.view', [
            'book' => $book
        ]);
    }

    public function delete()
    {

    }

    public function update()
    {

    }
}
