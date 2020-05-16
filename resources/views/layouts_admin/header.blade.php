<div class="header-area header-bottom">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-9  d-none d-lg-block">
                <div class="horizontal-menu">
                    <nav>
                        <ul id="nav_menu">
                            <li>
                                <a href="javascript:void(0)"><i
                                        class="fa fa-fw fa-dashboard"></i><span>{{__('messages.a-dashboard')}}</span></a>
                            </li>
                            <li class="{{\Request::route()->getName()==('list.role') || \Request::route()->getName()==('list.user') || \Request::route()->getName()==('list.permission') ?'active':''}}">
                                <a href="javascript:void(0)"><i
                                        class="fa fa-fw fa-users"></i><span>{{__('messages.a-user')}}</span></a>
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
                            @can('category-list')
                                <li class="{{\Request::route()->getName()=='list.category'?'active':''}}">
                                    <a href="{{route('list.category')}}"><i
                                            class="fa fa-fw fa-list-alt"></i><span>{{__('messages.a-category')}}</span></a>
                                </li>
                            @endcan
                            <li class="{{\Request::route()->getName()==('list.supplier') || \Request::route()->getName()==('list.species') || \Request::route()->getName()==('list.product') ?'active':''}}">
                                <a href="javascript:void(0)"><i
                                        class="fa fa-fw fa-users"></i><span>{{__('messages.a-product')}}</span></a>
                                <ul class="submenu">
                                    @can('product-list')
                                        <li class="{{\Request::route()->getName()=='list.product'?'active':''}}"><a
                                                href="{{route('list.product')}}">{{__('messages.a-product')}}</a></li>
                                    @endcan
                                        @can('supplier-list')
                                            <li class="{{\Request::route()->getName()=='list.supplier'?'active':''}}"><a
                                                    href="{{route('list.supplier')}}">{{__('messages.a-supplier')}}</a></li>
                                        @endcan
                                    @can('species-list')
                                        <li class="{{\Request::route()->getName()=='list.species'?'active':''}}"><a
                                                href="{{route('list.species')}}">{{__('messages.a-species')}}</a></li>
                                    @endcan
                                </ul>
                            </li>
                            @can('discount-list')
                                <li class="{{\Request::route()->getName()=='list.discount'?'active':''}}">
                                    <a href="{{route('list.discount')}}"><i
                                            class="fa fa-fw fa-list-alt"></i><span>{{__('messages.a-discount')}}</span></a>
                                </li>
                            @endcan
                            @can('bill-list')
                                <li class="{{\Request::route()->getName()=='list.bill'?'active':''}}">
                                    <a href="{{route('list.bill')}}"><i
                                            class="fa fa-fw fa-shopping-cart"></i><span>{{__('messages.a-bill')}}</span></a>
                                </li>
                            @endcan
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
