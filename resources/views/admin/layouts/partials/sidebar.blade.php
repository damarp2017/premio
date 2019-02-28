<?php
/**
 * Created by PhpStorm.
 * User: DamarPermadany
 * Date: 2/2/2019
 * Time: 7:40 PM
 */
?>
<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <div class="user-profile"
             style="background: url({{ asset('material-pro/assets/images/background/user-info.jpg') }}) no-repeat;">
            <div class="profile-img">
                <img src="{{ asset('images/'.Auth::user()->image) }}" alt="user"/>
            </div>
            <div class="profile-text">
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button"
                   aria-haspopup="true" aria-expanded="true">{{ Auth::user()->name }}</a>
                <div class="dropdown-menu animated flipInY">
                    <a href="{{ route('admin.my-profile') }}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('admin.logout') }}" class="dropdown-item">
                        <i class="fa fa-power-off"></i> Logout
                    </a>
                </div>
            </div>
        </div>
        <nav class="sidebar-nav active">
            <ul id="sidebarnav">
                <li class="{{ Request::is('admin') ? 'active' : '' }}">
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Home </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.home') }}">Home </a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span class="hide-menu">Users </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.user-student') }}">Student</a></li>
                        <li><a href="{{ route('admin.user-lecturer') }}">Lecturer</a></li>
                        <li><a href="{{ route('admin.user-admin') }}">Administrator</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-account-outline"></i>
                        <span class="hide-menu">Student </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.student') }}">Student</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-thumb-up-outline"></i>
                        <span class="hide-menu">Achievement </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.achievement') }}">Achievement</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
