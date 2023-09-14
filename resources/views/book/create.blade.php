@extends('layouts.app')

@section('content')
    @php
        $currentYear = date('Y');
    @endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Book create' }}</div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <a class="btn btn-primary" href={{ route('book.index') }}> {{ __('Back') }}</a>
                    </div>
                </div>
                <form action="{{ route('book.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3 mt-3">
                        <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>

                        <div class="col-md-6">
                            <label>
                                <input type="text"
                                       class="form-control
                                       @error('title') is-invalid @enderror"
                                       name="title"
                                       id="title"
                                       required
                                       autofocus>
                            </label>
                            @error('title')
                                <div class="small text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <label for="publication_year" class="col-md-4 col-form-label text-md-end">{{ 'Publication year' }}</label>

                        <div class="col-md-6">
                            <label>
                                <input type="number"
                                       min="1900"
                                       max="{{ $currentYear }}"
                                       step="1"
                                       class="form-control
                                       @error('publication_year') is-invalid @enderror"
                                       name="publication_year"
                                       id="publication_year"
                                       required
                                       autofocus>
                            </label>
                            @error('publication_year')
                                <div class="small text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <label for="isbn" class="col-md-4 col-form-label text-md-end">{{ 'ISBN' }}</label>

                        <div class="col-md-6">
                            <label>
                                <input type="text"
                                       class="form-control
                                       @error('isbn') is-invalid @enderror"
                                       name="isbn"
                                       id="isbn"
                                       required
                                       autofocus>
                            </label>
                            @error('isbn')
                                <div class="small text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <label for="authors" class="col-md-4 col-form-label text-md-end">{{ 'Authors' }}</label>

                        <div class="col-md-6">
                            <label>
                                <select id="authors" class="form-select" name="authors[]" multiple="multiple">
                                    @foreach($authors as $author)
                                        <option  value="{{ $author->id }}">
                                            {{ $author->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </label>
                            @error('authors')
                            <div class="small text-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-8 offset-md-4">
                            <a class="btn btn-primary" href={{ route('author.create') }}> {{ __('Create a new author') }}</a>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-8 offset-md-10">
                            <button type="submit" class="btn btn-success">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
