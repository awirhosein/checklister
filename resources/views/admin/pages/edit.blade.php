@extends('layouts.app')

@section('content')

    <div class="row justify-content-center mt-5">
        <div class="col-lg-12 mb-lg-0 mb-4">

            <div class="card">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-0">{{ __('Edit Page') }}</h6>
                    </div>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger border-0 small" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li class="text-white">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session()->has('message'))
                        <div class="alert alert-success border-0 small text-white" role="alert">{{ session('message') }}</div>
                    @endif

                    <form action="{{ route('admin.pages.update', $page) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>{{ __('Title') }}</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $page->title) }}">
                        </div>

                        <div class="form-group">
                            <label>{{ __('Content') }}</label>
                            <textarea name="content" class="form-control" rows="5" id="task-editor">{{ old('content', $page->content) }}</textarea>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn bg-gradient-primary px-5 mb-0">{{ __('Save Page') }}</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#task-editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection('script')
