@include('layouts.layouts')

<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-minimize="on" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true"
    data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            @include('nav.header')
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                @include('nav.sidebar')
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                    <!--begin::Title-->
                                    <h1
                                        class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                        POS System</h1>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                            <a href="../../demo1/dist/index.html"
                                                class="text-muted text-hover-primary">Home</a>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">Dashboards</li>
                                        <!--end::Item-->
                                    </ul>
                                    <!--end::Breadcrumb-->
                                </div>
                                <!--end::Page title-->
                                <!--begin::Actions-->
                                <div class="d-flex align-items-center gap-2 gap-lg-3">
                                    <!--begin::Secondary button-->
                                    <a href="../../demo1/dist/apps/ecommerce/sales/listing.html"
                                        class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary">Recent
                                        Orders</a>
                                    <!--end::Secondary button-->
                                    <!--begin::Primary button-->
                                    <a href="{{ route('menu.create') }}" class="btn btn-sm fw-bold btn-primary">New
                                        Product</a>
                                    <!--end::Primary button-->
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Toolbar container-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-xxl">
                                <!--begin::Layout-->
                                <div class="d-flex flex-column flex-xl-row">
                                    <!--begin::Content-->
                                    <div class="d-flex flex-row-fluid me-xl-9 mb-10 mb-xl-0">
                                        <!--begin::Pos food-->
                                        <div class="card card-flush card-p-0 bg-transparent border-0">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <!--begin::Nav-->
                                                <ul class="nav nav-pills d-flex nav-pills-custom gap-3 mb-6">
                                                    @foreach ($categories as $category)
                                                        <li class="nav-item mb-3 me-0">
                                                            <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg
                                                                @if ($category->id === 1) show active @endif"
                                                                data-bs-toggle="pill"
                                                                href="#kt_pos_food_content_{{ $category->id }}"
                                                                style="width: 138px;height: 180px">

                                                                <div class="nav-icon mb-3">
                                                                    <img src="assets/media/svg/food-icons/{{ $category->icon }}"
                                                                        class="w-50px" alt="{{ $category->nama }}" />
                                                                </div>
                                                                <div>
                                                                    <span
                                                                        class="text-gray-800 fw-bold fs-2 d-block">{{ $category->nama }}</span>
                                                                    <span
                                                                        class="text-gray-400 fw-semibold fs-7">{{ $category->menuCount() }}
                                                                        Menu</span>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <!--end::Nav-->
                                                <!--begin::Tab Content-->
                                                <div class="tab-content">
                                                    @foreach ($categories as $category)
                                                        <!--begin::Tab pane-->
                                                        <div class="tab-pane fade show @if ($category->id === 1) active @endif"
                                                            id="kt_pos_food_content_{{ $category->id }}">
                                                            <!--begin::Wrapper-->
                                                            <div class="d-flex flex-wrap d-grid gap-5 gap-xxl-9">

                                                                <!--begin::Card-->
                                                                @foreach ($menus as $menu)
                                                                    @if ($menu->category_id == $category->id)
                                                                        <div
                                                                            class="card card-flush flex-row-fluid p-6 pb-5 mw-100">
                                                                            <!--begin::Body-->
                                                                            <div class="card-body text-center">
                                                                                <!--begin::Food img-->
                                                                                <img src="{{ asset('storage/foto_produk/' . $menu->foto_produk) }}"
                                                                                    alt="{{ $menu->nama }}"
                                                                                    class="rounded-3 mb-4 w-150px h-150px w-xxl-200px h-xxl-200px"
                                                                                    alt="" />

                                                                                <!--end::Food img-->
                                                                                <!--begin::Info-->
                                                                                <div class="mb-2">
                                                                                    <!--begin::Title-->
                                                                                    <div class="text-center">
                                                                                        <span
                                                                                            class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-3 fs-xl-1">{{ $menu->nama }}</span>
                                                                                        <span
                                                                                            class="text-gray-400 fw-semibold d-block fs-6 mt-n1">{{ $menu->deskripsi }}</span>
                                                                                    </div>
                                                                                    <!--end::Title-->
                                                                                </div>
                                                                                <!--end::Info-->
                                                                                <!--begin::Total-->
                                                                                <span
                                                                                    class="text-success text-end fw-bold fs-1">{{ 'Rp ' . number_format($menu->harga, 0, ',', '.') }}</span>
                                                                                <!--end::Total-->
                                                                            </div>
                                                                            {{-- <button>Tambah</button> --}}
                                                                            <!--end::Body-->
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                                <!--end::Card-->

                                                            </div>
                                                            <!--end::Wrapper-->
                                                        </div>
                                                        <!--end::Tab pane-->
                                                    @endforeach
                                                </div>

                                                <!--end::Tab Content-->
                                            </div>
                                            <!--end: Card Body-->
                                        </div>
                                        <!--end::Pos food-->
                                    </div>
                                    <!--end::Content-->
                                    <!--begin::Cart-->
                                    @include('menu.cart')
                                    <!--end::Cart-->
                                </div>
                                <!--end::Layout-->
                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Content wrapper-->
                    <!--begin::Footer-->
                    <div id="kt_app_footer" class="app-footer">
                        <!--begin::Footer container-->
                        <div
                            class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                            <!--begin::Copyright-->
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-muted fw-semibold me-1">2023&copy;</span>
                                <a href="https://keenthemes.com" target="_blank"
                                    class="text-gray-800 text-hover-primary">Keenthemes</a>
                            </div>
                            <!--end::Copyright-->
                            <!--begin::Menu-->
                            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                                <li class="menu-item">
                                    <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                                </li>
                                <li class="menu-item">
                                    <a href="https://devs.keenthemes.com" target="_blank"
                                        class="menu-link px-2">Support</a>
                                </li>
                                <li class="menu-item">
                                    <a href="https://1.envato.market/EA4JP" target="_blank"
                                        class="menu-link px-2">Purchase</a>
                                </li>
                            </ul>
                            <!--end::Menu-->
                        </div>
                        <!--end::Footer container-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->

</body>
<!--end::Body-->

</html>
