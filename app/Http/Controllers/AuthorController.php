<?php

namespace App\Http\Controllers;


use App\Http\Requests\Author\StoreRequest;
use App\Http\Requests\Author\UpdateRequest;
use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class AuthorController extends Controller
{
    const COUNT_AUTHORS_ON_PAGE = 10;
    public function index(): View
    {
        $authors = Author::paginate(self::COUNT_AUTHORS_ON_PAGE);

        return view('author.index', compact('authors'));
    }
    public function create(): View
    {
        return view('author.create');
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Author::create($data);

        return to_route('book.index')->with('success_author_create', 'Author successfully created');
    }

    public function edit(Author $author): View
    {
        return view('author.edit', compact('author'));
    }

    public function update(UpdateRequest $request, Author $author): RedirectResponse
    {
        $data = $request->validated();
        $author->update($data);

        return to_route('author.edit', $author->id)->with('success_author_update', 'Author successfully updated');
    }

    public function destroy(Author $author): RedirectResponse
    {
        if($author->delete())
        {
            return to_route('author.index')->with('success_author_delete', 'Author successfully deleted');
        }

        return to_route('author.show', $author->id)->with('error_author_delete', 'The author was not deleted');
    }
}
