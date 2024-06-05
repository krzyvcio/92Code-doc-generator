@extends('layouts.app')

@section('title', 'Document')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>{{ $document->title }}</h1>
            <p>{{ htmlspecialchars($document->body) }}</p>
            <p>Category: {{ $document->category->name }}</p>
            <p>Author: {{ $document->user->name }}</p>
        </div>
    </div>
</div>
@endsection