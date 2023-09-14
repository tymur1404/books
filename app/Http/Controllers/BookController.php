<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Models\Author;
use App\Models\Book;
use App\Services\BookService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class BookController extends Controller
{
    const COUNT_BOOKS_ON_PAGE = 10;
    public function __construct(private readonly BookService $bookService)
    {}

    public function index(): View
    {
        $books = Book::with('authors')->paginate(self::COUNT_BOOKS_ON_PAGE);

        return view('book.index', compact('books'));
    }

    public function create(): View
    {
        $authors = Author::all();

        return view('book.create', compact('authors'));
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $this->bookService->createOrUpdate($data);

        return to_route('book.index')->with('success_book_create', 'Book successfully created');
    }

    public function show(string $id): View
    {
        $book = Book::find($id);

        return view('book.show', compact('book'));
    }

    public function edit(Book $book): View
    {
        $authors = Author::all();
        return view('book.edit', compact('book', 'authors'));
    }

    public function update(UpdateRequest $request, Book $book): RedirectResponse
    {
        $data = $request->validated();

        $this->bookService->createOrUpdate($data, $book);

        return to_route('book.edit', $book->id)->with('success_book_update', 'Book successfully updated');
    }

    public function destroy(Book $book): RedirectResponse
    {
        if($book->delete())
        {
            return to_route('book.index')->with('success_book_delete', 'Book successfully deleted');
        }

        return to_route('book.show', $book->id)->with('error_book_delete', 'The book was not deleted');
    }
}
