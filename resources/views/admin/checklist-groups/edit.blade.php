@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">

            <div class="card">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-0">{{ __('Edit Checklist Group') }}</h6>
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

                    <form action="{{ route('admin.checklist-groups.update', $checklistGroup) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="form-control-label">{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $checklistGroup->name) }}">
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn bg-gradient-primary px-5 mb-0">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>

            <form action="{{ route('admin.checklist-groups.destroy', $checklistGroup) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-sm mt-4" onclick="return confirm('{{ __('Are you sure?') }}')">{{ __('Delete This Checklist Group') }}</button>
            </form>
        </div>
    </div>
@endsection
