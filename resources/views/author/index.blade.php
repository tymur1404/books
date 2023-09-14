@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Authors' }}</div>
                @if (session('success_author_create'))
                    <div class="alert alert-success">
                        {{ session('success_author_create') }}
                    </div>
                @endif
                <div class="row mb-3">

                    <div class="col-md-6">
                        <a class="btn btn-primary" href={{ route('book.index') }}> {{ __('Go to List of Books') }}</a>
                    </div>
                </div>
                <table id="userTable" class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Author name</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($authors as $author)
                        <tr>
                            <td>{{ $author->id }}</td>
                            <td>{{ $author->name }}</td>
                            <td>
                                <div class="col-md-8 offset-md-4">
                                    <a class="btn btn-primary" href={{ route('author.edit', $author->id) }}> {{ __('Edit') }}</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-6">
                        {{$authors->withQueryString()->links()}}
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-success" href={{ route('author.create') }}> {{ __('Create') }}</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
