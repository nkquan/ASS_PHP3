<div class="db-sidebar bg-body">
    <aside class="navbar navbar-expand-xl navbar-light d-block px-0 header-sticky dashboard-nav py-0">
        <div class="sticky-area border-right">
            <div class="d-flex px-6 px-xl-10 w-100 border-bottom py-7 justify-content-between">
                <a href="../index-2.html" class="navbar-brand py-4">
                    <img class="light-mode-img" src="{{ asset('assets/admin') }}/images/others/logo.png" width="179"
                        height="26" alt="Glowing - Bootstrap 5 HTML Templates">
                    <img class="dark-mode-img" src="{{ asset('assets/admin') }}/images/others/logo-white.png"
                        width="179" height="26" alt="Glowing - Bootstrap 5 HTML Templates"></a>
                <div class="ml-auto d-flex align-items-center ">
                    <div class="d-flex align-items-center d-xl-none">
                        <div class="color-modes position-relative px-4">
                            <a class="bd-theme btn btn-link nav-link dropdown-toggle d-inline-flex align-items-center justify-content-center text-primary p-0 position-relative rounded-circle"
                                href="#" aria-expanded="true" data-bs-toggle="dropdown" data-bs-display="static"
                                aria-label="Toggle theme (light)">
                                <svg class="bi my-1 theme-icon-active">
                                    <use href="#sun-fill"></use>
                                </svg>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end fs-14px" data-bs-popper="static">
                                <li>
                                    <button type="button" class="dropdown-item d-flex align-items-center active"
                                        data-bs-theme-value="light" aria-pressed="true">
                                        <svg class="bi me-4 opacity-50 theme-icon">
                                            <use href="#sun-fill"></use>
                                        </svg>
                                        Light
                                        <svg class="bi ms-auto d-none">
                                            <use href="#check2"></use>
                                        </svg>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item d-flex align-items-center"
                                        data-bs-theme-value="dark" aria-pressed="false">
                                        <svg class="bi me-4 opacity-50 theme-icon">
                                            <use href="#moon-stars-fill"></use>
                                        </svg>
                                        Dark
                                        <svg class="bi ms-auto d-none">
                                            <use href="#check2"></use>
                                        </svg>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item d-flex align-items-center"
                                        data-bs-theme-value="auto" aria-pressed="false">
                                        <svg class="bi me-4 opacity-50 theme-icon">
                                            <use href="#circle-half"></use>
                                        </svg>
                                        Auto
                                        <svg class="bi ms-auto d-none">
                                            <use href="#check2"></use>
                                        </svg>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="dropdown no-caret py-4 px-3 d-flex align-items-center notice me-6">
                            <a href="#"
                                class="dropdown-toggle text-body-emphasis fs-5 fw-500 lh-1 position-relative"
                                data-bs-toggle="dropdown">
                                <i class="far fa-bell"></i>
                                <span
                                    class="badge bg-primary rounded-pill position-absolute fw-bold fs-13px bottom-100 start-100 translate-middle-x">1</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <button class="navbar-toggler border-0 px-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#primaryMenuSidebar" aria-controls="primaryMenuSidebar" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
            <div class="collapse navbar-collapse bg-body position-relative z-index-5" id="primaryMenuSidebar">
                <form class="d-block d-xl-none pt-8 px-6">
                    <div class="input-group position-relative bg-body-tertiary">
                        <input type="text" class="form-control border-0 bg-transparent pl-4 shadow-none"
                            placeholder="Search Item">
                        <div class="input-group-append fs-14px px-6 border-start border-2x ">
                            <button class="bg-transparent border-0 outline-none py-5">
                                <i class="far fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <ul class="list-group list-group-flush list-group-no-border w-100 p-6">
                    <li class="list-group-item px-0 py-0 sidebar-item mb-3 border-0">
                        <a href="{{ route('admin.dashboard') }}"
                            class="text-heading text-decoration-none lh-1 sidebar-link py-5 px-6 d-flex align-items-center"
                            title="Dashboard">
                            <span class="sidebar-item-icon w-40px d-inline-block text-muted">
                                <i class="fas fa-home-lg-alt"></i>
                            </span>
                            <span class="sidebar-item-text fs-14px fw-semibold">Dashboard</span>
                        </a>
                    </li>
                    <li class="list-group-item px-0 py-0 sidebar-item mb-3 has-children border-0">
                        <a href="{{ route('danhmucs.index') }}"
                            class="text-heading text-decoration-none lh-1 d-flex sidebar-link align-items-center py-5 px-6 position-relative"
                            title="Products">
                            <span class="sidebar-item-icon d-inline-block w-40px text-muted">
                                <i class="fa-solid fa-layer-group"></i>
                            </span>
                            <span class="sidebar-item-text fs-14px fw-semibold">Danh mục</span>
                        </a>
                    </li>
                    <li class="list-group-item px-0 py-0 sidebar-item mb-3 has-children border-0">
                        <a href="{{ route('sanphams.index') }}"
                            class="text-heading text-decoration-none lh-1 d-flex sidebar-link align-items-center py-5 px-6 position-relative"
                            title="Products">
                            <span class="sidebar-item-icon d-inline-block w-40px text-muted">
                                <i class="fas fa-shopping-bag"></i>
                            </span>
                            <span class="sidebar-item-text fs-14px fw-semibold">Sản phẩm</span>
                        </a>
                    </li>
                    <li class="list-group-item px-0 py-0 sidebar-item mb-3 has-children border-0">
                        <a href="#order"
                            class="text-heading text-decoration-none lh-1 d-flex sidebar-link align-items-center py-5 px-6 position-relative"
                            title="Order">
                            <span class="sidebar-item-icon d-inline-block w-40px text-muted">
                                <i class="fas fa-shopping-cart"></i>
                            </span>
                            <span class="sidebar-item-text fs-14px fw-semibold">Order</span>
                        </a>
                    </li>
                    <li class="list-group-item px-0 py-0 sidebar-item mb-3 has-children border-0">
                        <a href="{{ route('chucvus.index') }}"
                            class="text-heading text-decoration-none lh-1 d-flex sidebar-link align-items-center py-5 px-6 position-relative"
                            title="Products">
                            <span class="sidebar-item-icon d-inline-block w-40px text-muted">
                                <i class="fa-solid fa-location-dot"></i>
                            </span>
                            <span class="sidebar-item-text fs-14px fw-semibold">Chức vụ</span>
                        </a>
                    </li>
                    <li class="list-group-item px-0 py-0 sidebar-item mb-3 has-children border-0">
                        <a href="{{ route('taikhoans.index') }}"
                            class="text-heading text-decoration-none lh-1 d-flex sidebar-link align-items-center py-5 px-6 position-relative"
                            title="Account">
                            <span class="sidebar-item-icon d-inline-block w-40px text-muted">
                                <i class="fas fa-user"></i>
                            </span>
                            <span class="sidebar-item-text fs-14px fw-semibold">Tài khoản</span>
                        </a>
                    </li>
                    <li class="list-group-item px-0 py-0 sidebar-item mb-3 has-children border-0">
                        <a href="{{ route('sliders.index') }}"
                            class="text-heading text-decoration-none lh-1 d-flex sidebar-link align-items-center py-5 px-6 position-relative"
                            title="Account">
                            <span class="sidebar-item-icon d-inline-block w-40px text-muted">
                                <i class="fa-solid fa-sliders"></i>
                            </span>
                            <span class="sidebar-item-text fs-14px fw-semibold">Sliders</span>
                        </a>
                    </li>
                    <li class="list-group-item px-0 py-0 sidebar-item mb-3 has-children border-0">
                        <a href="{{ route('quanlydonhangs.index') }}"
                            class="text-heading text-decoration-none lh-1 d-flex sidebar-link align-items-center py-5 px-6 position-relative"
                            title="Account">
                            <span class="sidebar-item-icon d-inline-block w-40px text-muted">
                                <i class="fa-solid fa-sliders"></i>
                            </span>
                            <span class="sidebar-item-text fs-14px fw-semibold">Đơn Hàng</span>
                        <a href="{{ route('danhmucbaiviets.index') }}"
                            class="text-heading text-decoration-none lh-1 d-flex sidebar-link align-items-center py-5 px-6 position-relative"
                            title="Account">
                            <span class="sidebar-item-icon d-inline-block w-40px text-muted">
                                <i class="fa-solid fa-layer-group"></i>
                            </span>
                            <span class="sidebar-item-text fs-14px fw-semibold">Danh mục bài viết</span>
                        </a>
                    </li>
                    <li class="list-group-item px-0 py-0 sidebar-item mb-3 has-children border-0">
                        <a href="{{ route('baiviets.index') }}"
                            class="text-heading text-decoration-none lh-1 d-flex sidebar-link align-items-center py-5 px-6 position-relative"
                            title="Account">
                            <span class="sidebar-item-icon d-inline-block w-40px text-muted">
                                <i class="fa-solid fa-book"></i>
                            </span>
                            <span class="sidebar-item-text fs-14px fw-semibold">Bài viết</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
</div>
