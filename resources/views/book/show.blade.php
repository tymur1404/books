@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row mb-3">
                <div class="col-md-12">
                    <a class="btn btn-primary" href={{ route('book.index', $book->id) }}> {{ __('Back') }}</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ 'Book info' }}</div>
                @if (session('error_book_delete'))
                    <div class="alert alert-success">
                        {{ session('error_book_delete') }}
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
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->publication_year }}</td>
                            <td>{{ $book->isbn }}</td>
                            <td>
                                @foreach($book->authors as $author)
                                    {{ $author->name }} <br>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="card-header d-flex p-3">
                    <div class="m-1">
                        <a class="btn btn-primary" href={{ route('book.edit', $book->id) }}> {{ __('Edit') }}</a>
                    </div>
                    <div class="m-1">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">
                            {{ 'Delete' }}
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">{{ 'Confirm your action' }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ 'Are you sure that you want delete this book?' }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ 'Cancel' }}</button>
                <form method="POST" action="{{ route('book.destroy', $book->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ 'Delete' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
