<?php

namespace App\Http\Controllers\User;

use App\Models\Checklist;
use App\Services\ChecklistService;
use App\Http\Controllers\Controller;

class ChecklistController extends Controller
{
    public function show(Checklist $checklist)
    {
        (new ChecklistService())->sync_checklist($checklist, auth()->id());

        return view('user.checklists.show', compact('checklist'));
    }
}
