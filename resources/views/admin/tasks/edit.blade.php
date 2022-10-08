@extends('layouts.app')

@section('content')

    <div class="row justify-content-center mt-5">
        <div class="col-lg-12 mb-lg-0 mb-4">

            @if ($errors->storeTask->any())
                <div class="alert alert-danger border-0 small" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->storeTask->all() as $error)
                            <li class="text-white">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-0">{{ __('Edit Task') }}</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.checklists.tasks.update', [$checklist, $task]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $task->name) }}">
                        </div>

                        <div class="form-group">
                            <label>{{ __('Description') }}</label>
                            <textarea name="description" class="form-control" rows="5">{{ old('description', $task->description) }}</textarea>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn bg-gradient-primary px-5 mb-0">{{ __('Save Task') }}</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    
@endsection
