<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="fa fa-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('client') }}'><i class='nav-icon fa fa-users'></i> {{ trans('sidebar.clients') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('employee') }}'><i class='nav-icon fa fa-user-tie'></i> {{ trans('sidebar.employees') }} </a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('maintenance-request') }}'><i class='nav-icon fa fa-cogs'></i>{{ trans('sidebar.maintenance_requests') }} </a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('client-asset') }}'><i class='nav-icon  fa fa-wrench'></i> {{ trans('sidebar.client_assets') }} </a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('setting') }}'><i class='nav-icon fa fa-cogs'></i> {{ trans('sidebar.settings') }}</a></li>
