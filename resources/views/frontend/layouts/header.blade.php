<header>
    <div class="navigation-wrap start-header start-style">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" style="font-size: 2.25rem;" href="{{route("home.index")}}"><span style="color:#e24c32;">Dev</span> <span style="color:white;">IT </span> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto py-4 py-md-0">

                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="{{route("home.index")}}">Trang Chủ</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link " href="{{ route("action.listPost") }}">Việc làm</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link " href="{{ route("action.listCompany") }}">Nhà tuyển dụng</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link" href="{{ route("action.lifeIT") }}">Cuộc sống IT</a>
                                </li>

                            </ul>
                            <ul class="navbar-nav ml-auto py-4 py-md-0">
                                @if(Auth::check() && Auth::user()->user_level == 2)
                                <div class="pl-4 pl-md-0 ml-0 ml-md-4">
                                    <div class="btn dropdown-toggle" role="button" id="dropdownCandidate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                       <b class="text-white">{{ Auth::user()->fullName }}</b>
                                    </div>
                                    <div class="dropdown-menu" style="top: 74%;left: 91%;" aria-labelledby="dropdownCandidate">
                                        <a class="dropdown-item p-2" href="{{ route("profile.index",["id"=>Auth::user()->id]) }}">Trang cá nhân </a>
                                        <a class="dropdown-item p-2" href="{{ route("login.logOut") }}">Đăng xuất</a>
                                    </div>
                                </div>
                                @elseif(Auth::check() && Auth::user()->user_level == 1)
                                    <div class="pl-4 pl-md-0 ml-0 ml-md-4">
                                        <div class="btn dropdown-toggle" role="button" id="dropdownRecruiment" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                            <b class="text-white">{{ Auth::user()->fullName }}</b>
                                        </div>
                                        <div class="dropdown-menu" style="top: 74%;left: 91%;" aria-labelledby="dropdownRecruiment">
                                            <a class="dropdown-item p-2" href="{{ route("recruiment.dashboard",["id"=>Auth::user()->id]) }}">Quản lý tài khoản</a>
                                            <a class="dropdown-item p-2" href="{{ route("login.logOut") }}">Đăng xuất</a>
                                        </div>
                                    </div>
                                @else
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link changeFont" href="{{ route("login.formLogin") }}">Đăng nhập</a>
                                </li>
                                <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                    <a class="nav-link changeFont" href="{{ route("home.selectLinkRegister") }}">Đăng Ký</a>
                                </li>
                                @endif

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
