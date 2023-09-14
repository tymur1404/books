@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Books' }}</div>
                @if (session('success_book_delete'))
                    <div class="alert alert-success">
                        {{ session('success_book_delete') }}
                    </div>
                @endif
                @if (session('success_book_create'))
                    <div class="alert alert-success">
                        {{ session('success_book_create') }}
                    </div>
                @endif
                @if (session('success_author_create'))
                    <div class="alert alert-success">
                        {{ session('success_author_create') }}
                    </div>
                @endif

                <table id="userTable" class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Publication year</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Author</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td><a href="{{ route('book.show', $book->id) }}">{{ $book->title }} </a></td>
                            <td>{{ $book->publication_year }}</td>
                            <td>{{ $book->isbn }}</td>
                            <td>
                                @foreach($book->authors as $author)
                                    <a href="{{ route('author.edit', $author->id) }}">{{ $author->name }} </a>
                                    <br>

                                @endforeach
                            </td>
                            <td>
                                <div class="col-md-8 offset-md-4">
                                    <a class="btn btn-primary" href={{ route('book.edit', $book->id) }}> {{ __('Edit') }}</a>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-6">
                        {{$books->withQueryString()->links()}}
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-success" href={{ route('book.create') }}> {{ __('Create') }}</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
