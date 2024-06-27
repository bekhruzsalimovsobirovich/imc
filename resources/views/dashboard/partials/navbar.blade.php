<div class="navbar navbar-dark navbar-expand-lg navbar-static border-bottom border-bottom-white border-opacity-10">
    <div class="container-fluid">
        <div class="d-flex d-lg-none me-2">
            <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
                <i class="ph-list"></i>
            </button>
        </div>

        <div class="navbar-brand flex-1 flex-lg-0">
            <a href="#" class="d-inline-flex align-items-center">
                <img style="width: 100%; height: 60px;" src="{{ asset('logo-light.png')}}" alt="">
{{--                <img src="{{ asset('dashboard/assets/images/logo_icon.svg')}}" alt="">--}}
{{--                <img src="{{ asset('dashboard/assets/images/logo_text_light.svg')}}" class="d-none d-sm-inline-block h-16px ms-3" alt="">--}}
            </a>
        </div>

        <ul class="nav flex-row">
            <li class="nav-item d-lg-none">
                <a href="#navbar_search" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="collapse">
                    <i class="ph-magnifying-glass"></i>
                </a>
            </li>
        </ul>

{{--        <div class="navbar-collapse justify-content-center flex-lg-1 order-2 order-lg-1 collapse" id="navbar_search">--}}
{{--            <div class="navbar-search flex-fill position-relative mt-2 mt-lg-0 mx-lg-3">--}}

{{--                <div class="dropdown-menu w-100 p-3">--}}
{{--                    <div class="d-flex align-items-center mb-3">--}}
{{--                        <h6 class="mb-0">Search options</h6>--}}
{{--                        <a href="#" class="text-body rounded-pill ms-auto">--}}
{{--                            <i class="ph-clock-counter-clockwise"></i>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                    <div class="mb-3">--}}
{{--                        <label class="d-block form-label">Category</label>--}}
{{--                        <label class="form-check form-check-inline">--}}
{{--                            <input type="checkbox" class="form-check-input" checked>--}}
{{--                            <span class="form-check-label">Invoices</span>--}}
{{--                        </label>--}}
{{--                        <label class="form-check form-check-inline">--}}
{{--                            <input type="checkbox" class="form-check-input">--}}
{{--                            <span class="form-check-label">Files</span>--}}
{{--                        </label>--}}
{{--                        <label class="form-check form-check-inline">--}}
{{--                            <input type="checkbox" class="form-check-input">--}}
{{--                            <span class="form-check-label">Users</span>--}}
{{--                        </label>--}}
{{--                    </div>--}}

{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label">Addition</label>--}}
{{--                        <div class="input-group">--}}
{{--                            <select class="form-select w-auto flex-grow-0">--}}
{{--                                <option value="1" selected>has</option>--}}
{{--                                <option value="2">has not</option>--}}
{{--                            </select>--}}
{{--                            <input type="text" class="form-control" placeholder="Enter the word(s)">--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="mb-3">--}}
{{--                        <label class="form-label">Status</label>--}}
{{--                        <div class="input-group">--}}
{{--                            <select class="form-select w-auto flex-grow-0">--}}
{{--                                <option value="1" selected>is</option>--}}
{{--                                <option value="2">is not</option>--}}
{{--                            </select>--}}
{{--                            <select class="form-select">--}}
{{--                                <option value="1" selected>Active</option>--}}
{{--                                <option value="2">Inactive</option>--}}
{{--                                <option value="3">New</option>--}}
{{--                                <option value="4">Expired</option>--}}
{{--                                <option value="5">Pending</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="d-flex">--}}
{{--                        <button type="button" class="btn btn-light">Reset</button>--}}

{{--                        <div class="ms-auto">--}}
{{--                            <button type="button" class="btn btn-light">Cancel</button>--}}
{{--                            <button type="button" class="btn btn-primary ms-2">Apply</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <ul class="nav flex-row justify-content-end order-1 order-lg-2">
            <li class="nav-item ms-lg-2">
                <a href="#" class="navbar-nav-link navbar-nav-link-icon rounded-pill" data-bs-toggle="offcanvas" data-bs-target="#notifications">
                    <i class="ph-bell"></i>
                    <span class="badge bg-yellow text-black position-absolute top-0 end-0 translate-middle-top zindex-1 rounded-pill mt-1 me-1">2</span>
                </a>
            </li>

            <li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
                <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
                    <div class="status-indicator-container">
                        <img src="{{ asset('user.png') }}" class="w-32px h-32px rounded-pill" alt="">
                        <span class="status-indicator bg-success"></span>
                    </div>
                    <span class="d-none d-lg-inline-block mx-lg-2">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-end">
                    <a href="#" class="dropdown-item">
                        <i class="ph-user-circle me-2"></i>
                        My profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="ph-gear me-2"></i>
                        Account settings
                    </a>
                    <a href="{{ route('auth.logout') }}" class="dropdown-item">
                        <i class="ph-sign-out me-2"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>
