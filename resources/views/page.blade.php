@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    {{ $page->title }}
                </div>
                <div class="card-body">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
