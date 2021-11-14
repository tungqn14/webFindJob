@extends("frontend.layouts.master")
@section("main")
    <div class="navHr">
    <span>
      <i class="labelIcon" class="fas fa-check"></i>
      </span>
        <input type="checkbox" id="toggleMenu">
        <div class="menu">
            <a href="{{ route("recruiment.dashboard",["id"=>Auth::user()->id]) }}" class="linkHr">Dashboard</a>
            <a href="{{ route("recruiment.managePost",["id"=>Auth::user()->id]) }}" class="linkHr">Quản lý đăng tuyển</a>
            <a href="{{ route("recruiment.manageAccount",["id"=>Auth::user()->id]) }}" class="linkHr">Quản lý tài khoản</a>
            <a href="{{ route("recruiment.listCandidate") }}" class="linkHr">Danh sách ứng viên</a>
            <a href="{{ route("recruiment.listCVSubmit") }}" class="linkHr">Hồ sơ ứng viên ứng tuyển</a>
        </div>
    </div>
@yield("contentRecruiment")
@endsection
