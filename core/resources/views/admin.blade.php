<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="{{asset('assets/image/favicon.png')}}" type="image/x-icon">
    <meta name="description" content="">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="">
    <meta property="twitter:site" content="">
    <meta property="twitter:creator" content="">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="">
    <meta property="og:site_name" content="">
    <meta property="og:title" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:description" content="">
    <title>{{$gnl->title}} | @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/toastr.min.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/fileInput/bootstrap-fileinput.css')}}">
    @yield('style')
</head>
<body class="app sidebar-mini rtl">
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="{{route('admin.dashboard')}}">{{$gnl->title}} </a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="{{route('admin.profile')}}"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                <li><a class="dropdown-item" href="{{route('admin.change.password')}}"><i class="fa fa-key"></i>Change password</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </ul>
        </li>
    </ul>
</header>

<!-- Sidebar menu-->
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="" >
        <div>
            <p style="margin-left: 20px;" class="app-sidebar__user-name">{{ Auth::guard('admin')->user()->name }}</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item @yield('dashboard')" href="{{route('admin.dashboard')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item @yield('branch')" href="{{route('admin.branch')}}"><i class="app-menu__icon fa fa-building"></i><span class="app-menu__label">Branch</span></a></li>
        <li><a class="app-menu__item @if(request()->route()->getName() == 'admin.other.banks') active @endif" href="{{route('admin.other.banks')}}"><i class="app-menu__icon fa fa-university"></i><span class="app-menu__label">Other banks</span></a></li>




        <li class="treeview @if(request()->route()->getName() == 'admin.gateway') is-expanded
            @elseif(request()->route()->getName() == 'admin.deposits') is-expanded
               @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Deposit</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @yield('DEPOSITS')" href="{{route('admin.deposits')}}"><i class="icon fa fa-dollar"></i>Deposits</a></li>
                <li><a class="treeview-item @yield('gateway')" href="{{route('admin.gateway')}}"><i class="icon  fa fa-credit-card"></i> Payment Gateway</a></li>

            </ul>
        </li>
        <li class="treeview  @if(request()->route()->getName() == 'admin.blog') is-expanded
          @elseif(request()->route()->getName() == 'admin.blog.add') is-expanded
            @elseif(request()->route()->getName() == 'admin.blog.edit') is-expanded


      @endif">
            <a class="app-menu__item " href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-rss"></i><span class="app-menu__label">Latest News</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @if(request()->route()->getName() == 'admin.blog.add') active @endif" href="{{route('admin.blog.add')}}"><i class="icon fa fa-plus"></i>Add new</a></li>
                <li><a class="treeview-item @if(request()->route()->getName() == 'admin.blog') active @endif" href="{{route('admin.blog')}}"><i class="icon fa fa-circle-o"></i>View all</a></li>


            </ul>
        </li>


        <li class="treeview @if(request()->route()->getName() == 'admin.transaction.request') is-expanded
            @elseif(request()->route()->getName() == 'admin.transaction.approved') is-expanded
            @elseif(request()->route()->getName() == 'admin.transaction.rejected') is-expanded
               @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Transaction</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @if(request()->route()->getName() == 'admin.transaction.request') active @endif " href="{{route('admin.transaction.request')}}"><i class="icon fa fa-spinner"></i>Bank transaction request </a></li>
                <li>  <a class="treeview-item  @if(request()->route()->getName() == 'admin.transaction.approved') active @endif" href="{{route('admin.transaction.approved')}}"><i class="icon fa fa-check"></i>Bank transaction Approved  </a></li>
                <li>  <a class="treeview-item @if(request()->route()->getName() == 'admin.transaction.rejected') active @endif" href="{{route('admin.transaction.rejected')}}"><i class="icon fa fa-times"></i> Bank transaction Rejected </a></li>


            </ul>
        </li>
        <li class="treeview @if(request()->route()->getName() == 'admin.wmethod') is-expanded
            @elseif(request()->route()->getName() == 'admin.withdraw.request') is-expanded
            @elseif(request()->route()->getName() == 'admin.withdraw.log') is-expanded
            @elseif(request()->route()->getName() == 'admin.rejected.withdraw') is-expanded
               @endif">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">withdraw</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @if(request()->route()->getName() == 'admin.withdraw.request') active @endif " href="{{route('admin.withdraw.request')}}"><i class="icon fa fa-spinner"></i>Withdraw request </a></li>
                <li>  <a class="treeview-item  @if(request()->route()->getName() == 'admin.withdraw.log') active @endif" href="{{route('admin.withdraw.log')}}"><i class="icon fa fa-check"></i> Approved Withdraw </a></li>
                <li>  <a class="treeview-item @if(request()->route()->getName() == 'admin.rejected.withdraw') active @endif" href="{{route('admin.rejected.withdraw')}}"><i class="icon fa fa-times"></i> Rejected Withdraw </a></li>
                <li> <a class="treeview-item @if(request()->route()->getName() == 'admin.wmethod') active @endif" href="{{route('admin.wmethod')}}"> <i class="icon fa fa-credit-card"></i> Withdraw Method</a></li>

            </ul>
        </li>
        <li class="treeview  @if(request()->route()->getName() == 'admin.allUser') is-expanded
            @elseif(request()->route()->getName() == 'admin.banned.user') is-expanded
            @elseif(request()->route()->getName() == 'admin.verified.user') is-expanded
            @elseif(request()->route()->getName() == 'admin.mobile.unverified') is-expanded
            @elseif(request()->route()->getName() == 'admin.email.unverified') is-expanded
            @endif  " ><a class="app-menu__item " href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">User Management </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item " href="{{route('admin.allUser')}}"><i class="icon fa fa-desktop"></i>All User</a></li>
                <li><a class="treeview-item " href="{{route('admin.verified.user')}}"><i class="icon fa fa-check-circle"></i>Verified Users</a></li>
                <li><a class="treeview-item " href="{{route('admin.banned.user')}}"><i class="icon fa fa-ban"></i>Banned Users</a></li>
                <li><a class="treeview-item " href="{{route('admin.mobile.unverified')}}"><i class="icon fa fa-mobile"></i>Mobile Unverified</a></li>
                <li><a class="treeview-item " href="{{route('admin.email.unverified')}}"><i class="icon fa fa-envelope"></i>Email Unverified</a></li>
            </ul>
        </li>
        <li class="treeview  @if(request()->route()->getName() == 'admin.settings') is-expanded
            @elseif(request()->route()->getName() == 'admin.settings.api') is-expanded
            @elseif(request()->route()->getName() == 'admin.settings.sms.api') is-expanded
            @elseif(request()->route()->getName() == 'admin.tf.charges') is-expanded
            @elseif(request()->route()->getName() == 'admin.settings.facebook.api') is-expanded
            @endif ">
            <a class="app-menu__item " href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">Settings</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item @yield('setting')" href="{{route('admin.settings')}}"><i class="icon fa fa-cog"></i> General Settings</a></li>
                <li> <a class="treeview-item @yield('charge') " href="{{route('admin.tf.charges')}}"><i class="icon fa fa-money"></i>Charge Settings </a></li>
                <li><a class="treeview-item @yield('setting-email')" href="{{route('admin.settings.api')}}"><i class="icon icon fa fa-envelope"></i> Email Settings</a></li>
                <li><a class="treeview-item @yield('setting-SmsApi')" href="{{route('admin.settings.sms.api')}}"><i class="icon icon fa fa-phone"></i> Sms api Settings</a></li>
                <li><a class="treeview-item @if(request()->route()->getName() == 'admin.settings.facebook.api') active @endif" href="{{route('admin.settings.facebook.api')}}"><i class="icon fa fa-facebook"></i> Facebook api</a></li>
            </ul>
        </li>

        <li class="treeview @if(request()->route()->getName() == 'admin.advertisement') is-expanded

             @elseif(request()->route()->getName() == 'admin.home.page') is-expanded

             @elseif(request()->route()->getName() == 'admin.social.index') is-expanded
             @elseif(request()->route()->getName() == 'admin.logo.index') is-expanded
             @elseif(request()->route()->getName() == 'admin.contacts.index') is-expanded
               @elseif(request()->route()->getName() == 'admin.breadcrumbIndex') is-expanded
             @elseif(request()->route()->getName() == 'admin.services') is-expanded
             @elseif(request()->route()->getName() == 'admin.sliders') is-expanded
             @elseif(request()->route()->getName() == 'admin.slider.add') is-expanded
             @elseif(request()->route()->getName() == 'admin.slider.edit') is-expanded
             @elseif(request()->route()->getName() == 'admin.faq') is-expanded
           @endif">
            <a class="app-menu__item " href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">Interface Control</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">

                <li><a class="treeview-item @yield('home-page')" href="{{route('admin.home.page')}}"><i class="icon fa fa-home"></i>Home Page</a></li>

                <li><a class="treeview-item @if(request()->route()->getName() == 'admin.logo.index') active @endif" href="{{route('admin.logo.index')}}"><i class="icon fa fa-picture-o"></i> Logo & Favicon </a></li>
                <li><a class="treeview-item @if(request()->route()->getName() == 'admin.social.index') active @endif" href="{{route('admin.social.index')}}"><i class="icon fa a fa-picture-o"></i>Social Icon</a></li>
                <li><a class="treeview-item @if(request()->route()->getName() == 'admin.contacts.index') active @endif" href="{{route('admin.contacts.index')}}"><i class="icon fa fa-compress"></i>Contact Information</a></li>
                <li><a class="treeview-item @if(request()->route()->getName() == 'admin.breadcrumbIndex') active @endif" href="{{route('admin.breadcrumbIndex')}}"><i class="icon fa fa-picture-o"></i>Change Breadcrumb</a></li>
                <li><a class="treeview-item @yield('faq')" href="{{route('admin.faq')}}"><i class="icon fa fa-quora"></i>Faq</a></li>
                <li><a class="treeview-item @yield('slider')" href="{{route('admin.sliders')}}"><i class="icon fa fa-image"></i>Sliders</a></li>
                <li><a class="treeview-item @if(request()->route()->getName() == 'admin.services') active @endif" href="{{route('admin.services')}}"><i class="icon fa fa-bars"></i>Services</a></li>

            </ul>
        </li>



        <li><a class="app-menu__item @yield('subscribe')" href="{{route('admin.subscribe')}}"><i class="app-menu__icon fa fa-newspaper-o"></i><span class="app-menu__label">Newsletter</span></a></li>
        <li><a class="app-menu__item @yield('ads')" href="{{route('admin.allAdds')}}"><i class="app-menu__icon app-menu__icon fa fa-picture-o"></i><span class="app-menu__label">Advertisement</span></a></li>
        <li><a class="app-menu__item @yield('Language')" href="{{route('admin.language-manage')}}"><i class="app-menu__icon fa fa-language"></i><span class="app-menu__label">Language</span></a></li>
        <li><a class="app-menu__item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                       document.getElementById('logout').submit();">
                <i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span></a>
            <form id="logout" action="{{ route('admin.logout') }}" method="POST">
                @csrf
            </form>
        </li>
    </ul>
</aside>

@yield('content')

<!-- Essential javascripts for application to work-->
<script type="text/javascript" src="{{asset('assets/admin/js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/main.js')}}"></script>
<!-- The javascript plugin to display page loading on top-->
<script type="text/javascript" src="{{asset('assets/admin/js/plugins/pace.min.js')}}"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="//gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript" src="{{asset('assets/admin/fileInput/bootstrap-fileinput.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/jscolor.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/toastr.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/admin/js/chart.js')}}"></script>
@yield('script')

<script>
    $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var title = button.data('mytitle');
        var description = button.data('mydescription');
        var cat_id = button.data('catid');
        var modal = $(this);
        modal.find('.modal-body #title').val(title);
        modal.find('.modal-body #des').val(description);
        modal.find('.modal-body #cat_id').val(cat_id);
    });

    $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var cat_id = button.data('catid');
        var modal = $(this);
        modal.find('.modal-body #cat_id').val(cat_id);
    });



</script>

@include('notification.notification')
</body>
</html>
