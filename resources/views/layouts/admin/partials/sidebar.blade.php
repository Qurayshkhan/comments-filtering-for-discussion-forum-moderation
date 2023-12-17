    <div id="kt_aside" class="aside bg-primary" data-kt-drawer="true" data-kt-drawer-name="aside"
        data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto"
        data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">

        <div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto py-8" id="kt_aside_logo">
            <a href="../../demo4/dist/index.html">
                <img alt="Logo" src="{{ asset('admin') }}/assets/media/logos/demo4.svg" class="h-55px" />
            </a>
        </div>


        <div class="aside-nav d-flex flex-column align-lg-center flex-column-fluid w-100 pt-5 pt-lg-0"
            id="kt_aside_nav">

            <div class="hover-scroll-overlay-y my-2 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
                data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="5px">

                <div id="kt_aside_menu"
                    class="menu menu-column menu-title-gray-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-semibold fs-6"
                    data-kt-menu="true">

                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start"
                        class="menu-item here show py-2">

                        <span class="menu-link menu-center">
                            <span class="menu-icon me-0">
                                <i class="fonticon-house fs-1"></i>
                            </span>
                        </span>


                        <div class="menu-sub menu-sub-dropdown py-4 w-200px w-lg-225px">

                            <div class="menu-item">

                                <div class="menu-content">
                                    <span class="menu-section fs-5 fw-bolder ps-1 py-1">Home</span>
                                </div>

                            </div>


                            <div class="menu-item">

                                <a class="menu-link active" href="#">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Default</span>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start"
                        class="menu-item here show py-2">

                        <span class="menu-link menu-center">
                            <span class="menu-icon me-0">
                                <i class="bi bi-people fs-1"></i>
                            </span>
                        </span>


                        <div class="menu-sub menu-sub-dropdown py-4 w-200px w-lg-225px">

                            <div class="menu-item">

                                <div class="menu-content">
                                    <span class="menu-section fs-5 fw-bolder ps-1 py-1">Home</span>
                                </div>

                            </div>


                            <div class="menu-item">

                                <a class="menu-link active" href="{{ route('users') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Users</span>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>
