@extends('Layout.AdminMaster')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
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
                <div class="row" id="row">
                    <div class="col-12">
                        <div class="card">
                            {{-- <ul class="list-group list-group-flush">
                                <li class="list-group-item"> <strong>Course:</strong>&nbsp;&nbsp;&nbsp; {{ $attd->course->name }} </li>
                                <li class="list-group-item"> <strong>Department:</strong> &nbsp;&nbsp;{{ $attd->department->name }} </li>
                                <li class="list-group-item"> <strong>Batch:</strong>&nbsp;&nbsp;&nbsp; {{ $attd->batch->name }} </li>
                                <li class="list-group-item"> <strong>Date:</strong> &nbsp;&nbsp;&nbsp;{{\Carbon\Carbon::parse($attd->day)->format('d-m-y')}} </li>
                                <input type="hidden" name="attendance_id" id="attendance_id" value="{{ $attd->id }}">
                            </ul> --}}
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
                                {!! $dataTable->table() !!}
                                {{-- <table id="dataTable" class="table">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Roll</th>
                                        <th scope="col">Session</th>
                                        <th scope="col">Date-Time</th>
                                        <th scope="col">Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table> --}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <h4 class="text-center btn btn-info btn-block btn-sm" onclick="printDiv('row')"> Print </h4>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection
@section('script')

	<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>

    <script src="/vendor/datatables/buttons.server-side.js"></script>

        {!! $dataTable->scripts() !!}
    <script>
        function printDiv(elementId) {
            let printElement = document.getElementById(elementId);
            var printWindow = window.open('', 'PRINT');
            printWindow.document.write(document.documentElement.innerHTML);
            setTimeout(() => { // Needed for large documents
            printWindow.document.body.style.margin = '0 0';
            printWindow.document.body.innerHTML = printElement.outerHTML;
            printWindow.document.close(); // necessary for IE >= 10
            printWindow.focus(); // necessary for IE >= 10*/
            printWindow.print();
            printWindow.close();
            }, 1000)
        }
    </script>
@endsection
