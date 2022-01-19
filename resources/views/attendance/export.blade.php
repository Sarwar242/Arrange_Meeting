@extends('Layout.AdminMaster')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
@endsection
@section('teacherView')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 offset-sm-5">
                        <h1>Students Attendance</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"> <strong>Course:</strong>&nbsp;&nbsp;&nbsp; {{ $attd->course->name }} </li>
                                <li class="list-group-item"> <strong>Department:</strong> &nbsp;&nbsp;{{ $attd->department->name }} </li>
                                <li class="list-group-item"> <strong>Batch:</strong>&nbsp;&nbsp;&nbsp; {{ $attd->batch->name }} </li>
                                <li class="list-group-item"> <strong>Date:</strong> &nbsp;&nbsp;&nbsp;{{\Carbon\Carbon::parse($attd->day)->format('d-m-y')}} </li>
                                <input type="hidden" name="attendance_id" id="attendance_id" value="{{ $attd->id }}">
                            </ul>
                          </div>
                        <div class="card card-primary">
                            <div class="card-header ">
                                <h3 class="card-title">Students List</h3>
                            </div>
                            @if(Session::has('success'))

                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">
                                        x
                                    </button>
                                    <strong>
                                        {!! session('success') !!}
                                    </strong>
                                </div>
                            @endif
                            @if(Session::has('failed'))

                                <div class="alert alert-error alert-block">
                                    <button type="button" class="close" data-dismiss="alert">
                                        x
                                    </button>
                                    <strong>
                                        {!! session('failed') !!}
                                    </strong>
                                </div>
                            @endif
                            <!-- /.card-header -->
                            <div class="card-body">
                                {!! $html->table() !!}
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
@section('script')

	<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
   <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                dom: 'Bfrtip',
                buttons: [
                    'excel',
                    'csv',
                    'pdf'
                ],
                ajax: {
                    url: "{!! route('admin.attendance.data') !!}",
                    type: 'GET',
                    data: function (data) {
                        data.attendance_id  = $('input#attendance_id').val();
                    },
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    { data: 'name', name: 'students.name'},
                    { data: 'roll', name: 'students.roll'},
                    { data: 'session', name: 'students.session'},
                    { data: 'updated_at', name: 'student_attendance.updated_at', orderable: false, searchable: false},
                    { data: 'present', name: 'student_attendance.present', orderable: false, searchable: false}
                ],
                paging: false
            });
        });
    </script>
@endsection
