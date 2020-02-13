<div class="header-area header-bottom">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-9  d-none d-lg-block">
                <div class="horizontal-menu">
                    <nav>
                        <ul id="nav_menu">
                            <li>
                                <a href="javascript:void(0)"><i
                                        class="ti-dashboard"></i><span>{{__('messages.a-dashboard')}}</span></a>
                            </li>

                            <li class="{{\Request::route()->getName()==('list.role') || \Request::route()->getName()==('list.user') || \Request::route()->getName()==('list.permission') ?'active':''}}">
                                <a href="javascript:void(0)"><i class="fa fa-fw fa-users"></i><span>User</span></a>
                                <ul class="submenu">
                                    @can('user-list')
                                        <li class="{{\Request::route()->getName()=='list.user'?'active':''}}"><a
                                                href="{{route('list.user')}}">{{__('messages.a-user')}}</a></li>
                                    @endcan
                                    @can('role-list')
                                        <li class="{{\Request::route()->getName()=='list.role'?'active':''}}"><a
                                                href="{{route('list.role')}}">{{__('messages.a-role')}}</a></li>
                                    @endcan
                                    @can('permission-list')
                                        <li class="{{\Request::route()->getName()=='list.permission'?'active':''}}"><a
                                                href="{{route('list.permission')}}">{{__('messages.a-permission')}}</a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-12 d-block d-lg-none">
                <div id="mobile_menu"></div>
            </div>
        </div>
    </div>
</div>
