@extends('Layout.AdminMaster')

@section('teacherView')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 offset-sm-5">
                        <h1>DataTables</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header ">
                                <h3 class="card-title">Teachers List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Serial no</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Dept</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $value = 1;
                                    @endphp
                                    <tbody>

                                        @foreach ($Getdatas as $val)
                                            <tr>
                                                <td>{{ $value }}</td>
                                                <td>{{ $val->name }}</td>
                                                <td>{{ $val->dept }}</td>
                                                <td>{{ $val->email }}</td>
                                                <td>{{ $val->contact }}</td>
                                                <td>
                                                    <a href="editTeacher/{{ $val->id }}" class="btn btn-primary" ><i class="fa fa-edit"
                                                            style="font-size:18px; color:primary"></i></a>
                                                    <a href="teacherDelete/{{ $val->id }}" class="btn btn-primary"><i class="fa fa-trash"
                                                            style="font-size:18px;  color:red""></i></a>
                                                    </td>

                                                </tr>
                                                @php
                                                    $value += 1;
                                                @endphp
                                             @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">Serial no</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Dept</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection
