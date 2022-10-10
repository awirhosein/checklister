<?php

namespace App\Http\Controllers\Admin;

use App\Models\ChecklistGroup;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreChecklistGroupRequest;

class ChecklistGroupController extends Controller
{
    public function create(): View
    {
        return view('admin.checklist-groups.create');
    }

    public function store(StoreChecklistGroupRequest $request): RedirectResponse
    {
        ChecklistGroup::create($request->validated());

        return redirect()->route('home');
    }

    public function edit(ChecklistGroup $checklistGroup): View
    {
        return view('admin.checklist-groups.edit', compact('checklistGroup'));
    }

    public function update(StoreChecklistGroupRequest $request, ChecklistGroup $checklistGroup): RedirectResponse
    {
        $checklistGroup->update($request->validated());

        return redirect()->route('home');
    }

    public function destroy(ChecklistGroup $checklistGroup): RedirectResponse
    {
        $checklistGroup->delete();

        return redirect()->route('home');
    }
}
