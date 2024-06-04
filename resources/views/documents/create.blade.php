@extends('layouts.app')


@section('title', 'Dodawanie dokumentu')

@section('head')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

@endsection

@section('javascript')
    <script src="https://cdn.tiny.cloud/1/qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc/tinymce/7/tinymce.min.js">
    </script>

    <script>
        tinymce.init({
            selector: 'textarea#body',
            height: 500,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });
    </script>




@endsection

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

            <div class="mb-3">
                <label for="category_id" class="form-label">Kategoria</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <option value="">Wybierz kategorię</option>
                    {{-- @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach --}}
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>
@endsection
