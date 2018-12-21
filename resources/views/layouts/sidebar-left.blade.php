<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="nav-active">
                        <a href="index.html">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-parent">
                        @php
                        $requestSm3 = Request::segment(3)
                        @endphp
                        <a>
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span>{{ __('header_title.platform_administration') }}</span>
                        </a>
                        <ul class="nav nav-children" style="">
                            <li><a href="{{ route('adusers.index') }}">{{ __('header_title.user_management') }} </a></li>
                            <li class="hidden"><a href="{{ route('adusers.create') }}">{{ __('header_title.user_management') }}</a></li>
                            @isset ($requestSm3)
                            <li class="hidden"><a href="{{ route('adusers.edit', Request::segment(3)) }}">{{ __('header_title.user_management') }}</a></li>
                            @endisset

                            <li> <a href="{{ route('adroles.index') }}"> {{ __('header_title.role_management') }} </a> </li>
                            <li class="hidden"><a href="{{ route('adroles.create') }}">{{ __('header_title.user_management') }}</a></li>
                            @isset ($requestSm3)
                            <li class="hidden"><a href="{{ route('adroles.edit', Request::segment(3)) }}">{{ __('header_title.user_management') }}</a></li>
                            @endisset

                            <li> <a href="{{ route('adpermissions.index') }}"> {{ __('header_title.permission_management') }} </a> </li>
                            <li class="hidden"><a href="{{ route('adpermissions.create') }}">{{ __('header_title.user_management') }}</a></li>
                            @isset ($requestSm3)
                            <li class="hidden"><a href="{{ route('adpermissions.edit', Request::segment(3)) }}">{{ __('header_title.user_management') }}</a></li>
                            @endisset
                        </ul>
                    </li>
                    <!--
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-align-left" aria-hidden="true"></i>
                            <span>Menu Levels</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a>First Level</a>
                            </li>
                            <li class="nav-parent">
                                <a>Second Level</a>
                                <ul class="nav nav-children">
                                    <li class="nav-parent">
                                        <a>Third Level</a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a>Third Level Link #1</a>
                                            </li>
                                            <li>
                                                <a>Third Level Link #2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a>Second Level Link #1</a>
                                    </li>
                                    <li>
                                        <a>Second Level Link #2</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    -->
                </ul>
            </nav>
        </div>

    </div>

</aside>
<!-- end: sidebar -->