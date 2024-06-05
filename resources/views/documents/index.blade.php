@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista dokumentów</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Tytuł</th>
                    <th>Skrót</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $document)
                    <tr>
                        <td><a href="{{ route('documents.show', $document) }}">{{ $document->title }}</a></td>
                        <td>{{ $document->slug }}</td>
                        <td class="text-right">
                            <a href="{{ route('documents.show', $document) }}" class="btn btn-primary">Zobacz</a>
                            <a href="{{ route('documents.edit', $document) }}" class="btn btn-warning">Edytuj</a>
                            <form style="display: inline-block" action="{{ route('api.documents.destroy', $document) }}"
                                method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć ten dokument?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Usuń</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
