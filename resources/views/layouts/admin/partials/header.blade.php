    <div id="kt_header" style="" class="header align-items-stretch">

        <div class="container-fluid d-flex align-items-stretch justify-content-between">

            <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                <div class="btn btn-icon btn-active-color-primary w-40px h-40px" id="kt_aside_toggle">

                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                fill="currentColor" />
                            <path opacity="0.3"
                                d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                fill="currentColor" />
                        </svg>
                    </span>

                </div>
            </div>


            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                <a href="../../demo4/dist/index.html" class="d-lg-none">
                    <img alt="Logo" src="{{ asset('admin') }}/assets/media/logos/demo4-mobile.svg" class="h-25px" />
                </a>
            </div>

            <div class="d-flex align-items-center" id="kt_header_wrapper">

                <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-20 pb-5 pb-lg-0"
                    data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_wrapper'}">

                    <h1 class="text-dark fw-bold my-1 fs-3 lh-1">Dashboard</h1>

                </div>

            </div>

            <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">

                <div class="d-flex align-items-stretch" id="kt_header_nav">

                    <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu"
                        data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                        data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                        data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                        data-kt-swapper-mode="prepend"
                        data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">

                        <div class="menu menu-rounded menu-column menu-lg-row menu-active-bg menu-state-primary menu-title-gray-600 menu-arrow-gray-400 fw-semibold fs-6 my-5 my-lg-0 px-2 px-lg-0 align-items-stretch"
                            id="#kt_header_menu" data-kt-menu="true">

                            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                data-kt-menu-placement="bottom-start"
                                class="menu-item here show menu-lg-down-accordion menu-here-bg me-0 me-lg-2">
                            </div>
                        </div>

                    </div>

                </div>


                <div class="d-flex align-items-stretch justify-self-end flex-shrink-0">

                    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">

                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                            data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                            data-kt-menu-placement="bottom-end">
                            <img src="{{ asset('admin') }}/assets/media/avatars/300-1.jpg" alt="user" />
                        </div>

                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                            data-kt-menu="true">

                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">

                                    <div class="symbol symbol-50px me-5">
                                        <img alt="Logo" src="{{ asset('admin') }}/assets/media/avatars/300-1.jpg" />
                                    </div>


                                    <div class="d-flex flex-column">
                                        <div class="fw-bold d-flex align-items-center fs-5">{{ auth()->user()->name }}

                                        </div>
                                        <a href="#"
                                            class="fw-semibold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                                    </div>

                                </div>
                            </div>
                            <div class="separator my-2"></div>
                            <div class="menu-item px-5">
                                <a href="{{ route('profile.edit') }}" class="menu-link px-5">My
                                    Profile</a>
                            </div>
                            <div class="menu-item px-5">

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" class="menu-link px-5"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">Sign
                                        Out</a>
                                </form>
                            </div>

                        </div>


                    </div>


                    <div class="d-flex align-items-center d-lg-none ms-3 me-n1" title="Show header menu">
                        <div class="btn btn-icon btn-active-color-primary w-30px h-30px w-md-40px h-md-40px"
                            id="kt_header_menu_mobile_toggle">

                            <span class="svg-icon svg-icon-1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z"
                                        fill="currentColor" />
                                </svg>
                            </span>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
