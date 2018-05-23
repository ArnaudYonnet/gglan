<header class="main-header">
    <a href="/admin" class="logo">
        <span class="logo-mini"><b>{{ substr(env('APP_NAME'), 0,2) }}</b></span>
        <span class="logo-lg"><b>{{ env('APP_NAME') }}</b></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                {{-- <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-envelope"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src=" {{ asset('adminlte/img/user2-160x160.jpg') }} " class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li> --}}

                {{-- <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li> --}}

                {{-- <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-flag"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li> --}}

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('adminlte/img/user3-128x128.jpg') }}" class="user-image" alt="User Image">
                        <span class="hidden-xs"> {{ Auth::guard('admin')->user()->name }} </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ asset('adminlte/img/user3-128x128.jpg') }}" class="img-circle" alt="User Image">
                            <p>
                                {{ Auth::guard('admin')->user()->name }} - CEO
                            </p>
                        </li>
                        <li class="user-body">
                            <div class="row">
                                {{-- <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div> --}}
                                {{-- <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div> --}}
                                {{-- <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div> --}}
                            </div>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat"> {{ __('Profile') }} </a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">{{ __('Settings') }}</a>
                            </div>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="{{ route('admin.logout') }}" title="Logout"> <i class="fas fa-sign-out-alt"></i> </a>
                </li>
            </ul>
        </div>
    </nav>
</header>