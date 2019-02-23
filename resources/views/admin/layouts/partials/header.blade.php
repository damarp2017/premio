<?php
/**
 * Created by PhpStorm.
 * User: DamarPermadany
 * Date: 2/2/2019
 * Time: 7:36 PM
 */
?>
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('premio') }}">
                <b>
                    <img src="{{ asset('material-pro/assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo"/>
                    <img src="{{ asset('material-pro/assets/images/premio-light-icon.png') }}" alt="homepage" class="light-logo"/>
                </b>
                <span>
                     <img src="{{ asset('material-pro/assets/images/logo-text.png') }}" alt="homepage" class="dark-logo"/>
                     <img src="{{ asset('material-pro/assets/images/premio-light-text.png') }}" class="light-logo" alt="homepage"/>
                </span>
            </a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto mt-md-0">
                <li class="nav-item">
                    <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)">
                        <i class="mdi mdi-menu"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)">
                        <i class="ti-menu"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('images/'.Auth::user()->image) }}" alt="user" class="profile-pic"/>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img">
                                        <img src="{{ asset('images/'.Auth::user()->image) }}" alt="user">
                                    </div>
                                    <div class="u-text">
                                        <h4><small>{{ Auth::user()->name }}</small></h4>
                                        <p class="text-muted"><small>{{ Auth::user()->email }}</small></p>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ route('admin.my-profile') }}"><i class="ti-user"></i> My Profile</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ route('admin.logout') }}"><i class="fa fa-power-off"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
