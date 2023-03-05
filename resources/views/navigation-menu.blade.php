<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <a class="navbar-brand" href="/">
                <span class="logo-text" style="margin-left: auto;margin-right: auto;">
                    <img src="{{asset('plugins/images/logo.png')}}" alt="homepage" class="light-logo" style="margin-left: auto;margin-right: auto;"/>
                </span>
            </a>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
            </ul>
            <ul class="navbar-nav float-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }} <img src="{{ Auth::user()->profile_photo_url }}" alt="user" class="rounded-circle" width="31"> 
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                        <a class="dropdown-item" href="{{ route('profile.show') }}"><i class="ti-user m-r-5 m-l-5"></i> {{ __('My Profile') }}</a>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf 
                            <button type="submit" class="dropdown-item"><i class="fa fa-power-off m-r-5 m-l-5"></i> {{ __('Logout') }}</button>  
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<aside class="left-sidebar" data-sidebarbg="skin5">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/dashboard" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">{{ __('Dashboard') }}</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-alert-circle"></i><span class="hide-menu">{{ __('About') }}</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="/about-description" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle-outline"></i><span class="hide-menu">{{ __('Description') }}</span></a></li>
                        <li class="sidebar-item"><a href="/about-value" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle-outline"></i><span class="hide-menu">{{ __('Our Values') }}</span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"><a class="sidebar-link" href="/people" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">{{ __('People') }}</span></a></li>

                <li class="sidebar-item"><a class="sidebar-link" href="/specializations" aria-expanded="false"><i class="mdi mdi-star"></i><span class="hide-menu">{{ __('Specializations') }}</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-wrench"></i><span class="hide-menu">{{ __('Services') }}</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="/service-description" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle-outline"></i><span class="hide-menu">{{ __('Description') }}</span></a></li>
                        <li class="sidebar-item"><a href="/service" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle-outline"></i><span class="hide-menu">{{ __('Services') }}</span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-switch"></i><span class="hide-menu">{{ __('Community') }}</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="/community-charity" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle-outline"></i><span class="hide-menu">{{ __('Charity & Industry Partnership') }}</span></a></li>
                        <li class="sidebar-item"><a href="/community-volunteering" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle-outline"></i><span class="hide-menu">{{ __('Volunteering') }}</span></a></li>
                        <li class="sidebar-item"><a href="/community-diversity" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle-outline"></i><span class="hide-menu">{{ __('Diversity & Conclusion') }}</span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-plus"></i><span class="hide-menu">{{ __('Jobs') }}</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle-outline"></i><span class="hide-menu">{{ __('Jobs') }}</span></a></li>
                        <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle-outline"></i><span class="hide-menu">{{ __('Join Abblesearch') }}</span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu">{{ __('Knowledge') }}</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="/knowledge-news" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle-outline"></i><span class="hide-menu">{{ __('News') }}</span></a></li>
                        <li class="sidebar-item"><a href="/knowledge-thought" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle-outline"></i><span class="hide-menu">{{ __('Thought Leadership') }}</span></a></li>
                        <li class="sidebar-item"><a href="/knowledge-salary" class="sidebar-link"><i class="mdi mdi-checkbox-blank-circle-outline"></i><span class="hide-menu">{{ __('Salary Surveys') }}</span></a></li>
                    </ul>
                </li>

                <li class="sidebar-item"><a class="sidebar-link" href="#" aria-expanded="false"><i class="mdi mdi-contacts"></i><span class="hide-menu">{{ __('Contact') }}</span></a></li>
            </ul>
        </nav>
    </div>
</aside>
