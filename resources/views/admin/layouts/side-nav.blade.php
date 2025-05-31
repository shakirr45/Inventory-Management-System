            <div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header">
                        <a class="header-brand1" href="index.html">
                            <img src="{{ asset('admin/assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
                            <img src="{{ asset('admin/assets/images/brand/logo-1.png') }}" class="header-brand-img toggle-logo" alt="logo">
                            <img src="{{ asset('admin/assets/images/brand/logo-2.png') }}" class="header-brand-img light-logo" alt="logo">
                            <img src="{{ asset('admin/assets/images/brand/logo-3.png') }}" class="header-brand-img light-logo1" alt="logo">
                        </a><!-- LOGO -->
                    </div>
                    <div class="main-sidemenu">
                        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                            </svg>
                        </div>
                        <ul class="side-menu">
                            <li>
                                <h3>Menu</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item has-link" data-bs-toggle="slide" href="index.html">
                                    <span class="side-menu__label">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <h3>Components</h3>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                    <span class="side-menu__label">Products</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Products</a></li>
                                    <li><a href="{{ route('products.index') }}" class="slide-item">All Products</a></li>
                                    <li><a href="{{ route('category.index') }}" class="slide-item">Categories</a></li>
                                    <li><a href="{{ route('subcategory.index') }}" class="slide-item">Sub Categories</a></li>
                                    <li><a href="{{ route('subcategory.index') }}" class="slide-item">Product unit</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                    <span class="side-menu__label">Customers</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Customers</a></li>
                                    <li><a href="{{ route('products.index') }}" class="slide-item">All Customers</a></li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item" data-bs-toggle="slide" href="#">
                                    <span class="side-menu__label">Suppliers</span><i class="angle fa fa-angle-right"></i>
                                </a>
                                <ul class="slide-menu">
                                    <li class="side-menu-label1"><a href="javascript:void(0)">Suppliers</a></li>
                                    <li><a href="{{ route('products.index') }}" class="slide-item">All Suppliers</a></li>
                                </ul>
                            </li>

                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                                width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>