@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-0">{{ $checklist->name }}</h6>
                    </div>
                </div>

                <div class="table-responsive mt-3">
                    <table class="table align-items-center mb-0">
                        <tbody>
                            @foreach ($checklist->tasks as $task)
                                <tr data-toggle="collapse" data-target="#task-{{ $task->id }}">
                                    <td></td>
                                    <td>
                                        <span class="font-weight-bold">{{ $task->name }}</span>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr class="d-none" id="task-{{ $task->id }}">
                                    <td></td>
                                    <td colspan="2">
                                        <span class="text-sm">{!! $task->description !!}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $("[data-toggle=collapse]").click(function(){
                
                $($(this).data('target')).toggleClass('d-none');
            });
        });
    </script>
@endsection('script')
