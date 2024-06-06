@extends('layouts.app')

@section('title', 'Document')

@section('content')
    <div class="container">
        @include('components.navbar')
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>{{ $document->title }}</h1>
                <p>{!! $document->body !!}</p>

                <p>Category: {{ $document->category->name }}</p>
                <p>Author: {{ $document->user?->name }}</p>
            </div>
        </div>
    </div>
@endsection
