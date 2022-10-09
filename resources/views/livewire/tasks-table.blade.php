<div class="table-responsive mt-3" wire:sortable="updateTaskOrder">
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                <th class="text-secondary opacity-7"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
                    <td class="align-middle">
                        <span class="font-weight-bold text-sm ps-3">{{ $task->name }}</span>
                    </td>
                    <td>
                        <a href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}" class="btn bg-gradient-primary btn-sm mb-0 px-3 py-1">Edit</a>
                        <form action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task]) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')

                            <button type="submit" onclick="return confirm('{{ __('Are you sure?') }}')" class="btn bg-gradient-danger btn-sm mb-0 px-3 py-1">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
