<?php

namespace App\View\Composers;

use App\Models\Page;
use Illuminate\View\View;
use App\Models\ChecklistGroup;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class MenuComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $pages = [];

        if (auth()->user()->is_admin) {
            $groups = $this->getAdminGroups();
            $pages = Page::all();
        } else {
            $groups = $this->getUserGroups();
        }

        $view->with([
            'checklist_groups' => $groups,
            'pages' => $pages
        ]);
    }

    public function getAdminGroups(): Collection
    {
        return ChecklistGroup::with('checklists')->get();
    }

    public function getUserGroups(): Collection
    {
        $groups = ChecklistGroup::with(['checklists' => function ($query) {
            $query->whereNull('user_id');
        }])->get();

        $last_action_at = auth()->user()->last_action_at;
        if (is_null($last_action_at)) {
            $last_action_at = now()->subYears(10);
        }

        foreach ($groups as $group) {
            $group['is_new'] = Carbon::create($group['created_at'])->greaterThan($last_action_at);
            $group['is_updated'] = !($group['is_new']) && Carbon::create($group['updated_at'])->greaterThan($last_action_at);

            foreach ($group->checklists as $checklist) {
                $checklist['is_new'] = !($group['is_new']) && Carbon::create($checklist['created_at'])->greaterThan($last_action_at);
                $checklist['is_updated'] = !($group['is_updated']) && !($checklist['is_new']) && Carbon::create($checklist['updated_at'])->greaterThan($last_action_at);
                $checklist['tasks'] = 1;
                $checklist['completed_tasks'] = 0;
            }
        }

        return $groups;
    }
}
