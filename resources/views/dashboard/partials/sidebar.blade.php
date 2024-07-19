<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Sidebar header -->
        <div class="sidebar-section">
            <div class="sidebar-section-body d-flex justify-content-center">
                <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Navigation</h5>

                <div>
                    <button type="button"
                            class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                        <i class="ph-arrows-left-right"></i>
                    </button>

                    <button type="button"
                            class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                        <i class="ph-x"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- /sidebar header -->


        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header pt-0">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Main</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>


                <li class="nav-item">
                    <a href="{{ route('novelties.index') }}" class="nav-link">
                        <i class="ph-article"></i>
                        <span>News and Events</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('vacancies.index') }}" class="nav-link">
                        <i class="ph-article"></i>
                        <span>Vacancies</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('faculties.index') }}" class="nav-link">
                        <i class="ph-article"></i>
                        <span>Faculties</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('galleries.index') }}" class="nav-link">
                        <i class="ph-article"></i>
                        <span>Galleries</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
