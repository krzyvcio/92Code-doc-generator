@extends('layouts.app')




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

@section('title', 'Dodaj dokument')
@section('content')
    <div class="container">
        @include('components.navbar')

        <h1>Dodawanie dokumentu</h1>

        <form action="{{ route('documents.store') }}" method="POST" novalidate>
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Tytuł</label>
                <input type="text" class="form-control" id="title" name="title" required tabindex="1">
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Treść</label>
                <textarea class="form-control" id="body" name="body" rows="5" required tabindex="0"></textarea>
                @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Kategoria</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <option value="" disabled>Wybierz kategorię</option>
                    @php
                        $categories = \App\Models\Category::all();
                    @endphp
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Kategoria</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                </select>
            </div>

            <div class="validation-errors">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <button id="btnSubmit" class="btn btn-primary">Dodaj</button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
                    $('#btnSubmit').on('click', function(event) {
                        event.preventDefault();

                        const title = $('#title').val();
                        const category_id = $('#category_id').val();
                        const body = $('#body').val();
                        const user_id = $('#user_id').val();


                        // Disable the button during loading
                        $(this).prop('disabled', true);

                        $.ajax({
                            url: "{{ route('documents.store') }}",
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                title,
                                category_id,
                                body,
                                slug: 'slug',
                                user_id,

                            },
                            success: function(response) {
                                (this).removeProp('disabled');
                                console.log(response);
                                // Add code to handle success here
                            },
                            error: function(xhr, status, error) {
                                (this).removeProp('disabled');
                                console.log({
                                    response: xhr.responseText,
                                    status,
                                });
                                console.log(error);
                                // Add code to handle error here
                            },
                            complete: function() {
                                // Enable the button after the request is complete
                                // $(this).prop('disabled', false);
                            },
                            beforeSend: function() {
                                // Disable the button during loading
                                $(this).prop('disabled', true);
                            }
                        });
                    });
    </script>
@endsection
