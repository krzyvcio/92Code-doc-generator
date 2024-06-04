@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Dodawanie dokumentu</h1>

        <form action="{{ route('documents.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Tytuł</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Treść</label>
                <textarea class="form-control" id="body" name="body" rows="5" required></textarea>
            </div>

            @dd($categories)

            <div class="mb-3">
                <label for="category_id" class="form-label">Kategoria</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <option value="">Wybierz kategorię</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>
@endsection
