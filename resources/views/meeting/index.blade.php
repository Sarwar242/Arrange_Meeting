@extends('Layout.AdminMaster')

@section('teacherView')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 offset-sm-5">
                        <h1>Meetings</h1>
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
                                <h3 class="card-title">Meeting List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Serial no</th>
                                            <th scope="col">Host</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Start</th>
                                            <th scope="col">End</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($meetings as $meeting)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $meeting->host->name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($meeting->day)->format('d M Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($meeting->start)->format('h:i A') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($meeting->end)->format('h:i A') }}</td>
                                                <td>{{ $meeting->status }}</td>
                                                <td>
                                                    <a href="{{ route('meeting.update', $meeting->id) }}" class="btn btn-primary" ><i class="fa fa-edit"
                                                            style="font-size:18px; color:primary"></i></a>
                                                    <a href="{{ route('meeting.delete', $meeting->id) }}" class="btn btn-primary delete" data-confirm="Are you sure to delete this meeting?"><i class="fa fa-trash"
                                                            style="font-size:18px;  color:red""></i></a>
                                                </td>
                                            </tr>
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
