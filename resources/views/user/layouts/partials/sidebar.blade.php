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
                <img src="{{ asset('material-pro/assets/images/users/profile.png') }}" alt="user"/>
            </div>
            <div class="profile-text">
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button"
                   aria-haspopup="true" aria-expanded="true">Markarn Doe</a>
                <div class="dropdown-menu animated flipInY">
                    <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('users.logout') }}" class="dropdown-item">
                        <i class="fa fa-power-off"></i> Logout
                    </a>
                </div>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                        <i class="mdi mdi-thumb-up-outline"></i>
                        <span class="hide-menu">My Achievement </span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">My Achievement</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
