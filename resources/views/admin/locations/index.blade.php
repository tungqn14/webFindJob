@extends("admin.main")
@section("content-main")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Chào mừng bạn đến với trang quản trị web</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="mt-5">
                    <h4 class="bg-dark text-white p-2">Danh sách địa chỉ </h4>
                </div>
                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">Tên địa chỉ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $location)
                                <tr>
                                    <td>{{ $location['id'] }}</td>
                                    <td class="text-center">{{ $location['name'] }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-right">
                        {{ $data->links() }}
                    </div>
                </div>


    </div>

        </section>
        <!-- /.content -->

    </div>



@endsection



