{{-- bg-white --}}
<aside class="sidenav bg-default navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html" target="_blank">
            <img src="{{ asset('dashboard-assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Checklister</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">

    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">

            {{-- <li class="nav-item">
                <a class="nav-link active" href="#">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li> --}}

            @if (auth()->user()->is_admin)

                <li class="nav-item">
                    <span class="nav-link font-weight-bolder ms-1">{{ __('Manage Checklists') }}</span>
                </li>

                @foreach (\App\Models\ChecklistGroup::with('checklists')->get() as $group)
                    <li class="nav-item">
                        <div class="d-flex justify-content-between">
                            <a class="nav-link" href="{{ route('admin.checklist-groups.edit', $group) }}">
                                <span class="nav-link-text ms-1">{{ $group->name }}</span>
                            </a>
                            <a class="nav-link" href="{{ route('admin.checklist-groups.checklists.create', $group) }}">
                                <span class="badge bg-gradient-success">Add</span>
                            </a>
                        </div>

                        <div id="group-{{ $group->id }}" class="accordion-collapse" data-bs-parent="#sidenav-collapse-main">
                            @foreach ($group->checklists as $checklist)
                                <a class="nav-link py-0 ms-3" href="{{ route('admin.checklist-groups.checklists.edit', [$group, $checklist]) }}">
                                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                                    </div>
                                    <span class="nav-link-text ">{{ $checklist->name }}</span>
                                </a>
                            @endforeach
                        </div>
                    </li>
                @endforeach

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.checklist-groups.create') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text">{{ __('New checklist group') }}</span>
                    </a>
                </li>

                <hr class="horizontal dark mb-0">

                <li class="nav-item">
                    <span class="nav-link font-weight-bolder ms-1">{{ __('Pages') }}</span>
                </li>

                @foreach (\App\Models\Page::all() as $page)
                    <li class="nav-item">
                        <a class="nav-link py-0" href="{{ route('admin.pages.edit', $page) }}">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text">{{ $page->title }}</span>
                        </a>
                    </li>
                @endforeach

                <hr class="horizontal dark mb-0">

            @endif
           
            <li class="nav-item">
                <span class="nav-link font-weight-bolder ms-1">{{ __('Other') }}</span>
            </li>

            <li class="nav-item">
                <a class="nav-link py-0" href="#" onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('logout-form').submit();">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text">{{ __('Logout') }}</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>
