@extends('Layout.AdminMaster')
@section('AddTeacherForm')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 offset-sm-5">
                        <h1>Create Student</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Fill The Form <small>Carefully</small></h3>
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
                            @foreach ($errors->all() as $message)
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">
                                      x
                                    </button>
                                    <strong>
                                        {!! $message !!}
                                    </strong>
                                  </div>
                            @endforeach
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="{{ route('admin.student.store') }}" method="post" >
                                @csrf
                                <div class="card-body">
                                    <p class="form-group text-center text-warning" id='warningday'></span>
                                    <div class="form-group col-sm-6 offset-sm-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" required>
                                    </div>

                                    <div class="form-group col-sm-6 offset-sm-3">
                                        <label for="roll">Roll</label>
                                        <input type="text" name="roll" class="form-control" id="roll" required>
                                    </div>
                                    <div class="form-group col-sm-6 offset-sm-3">
                                        <label for="session">Session</label>
                                        <input type="text" name="session" class="form-control" id="session" required>
                                    </div>
                                    <div class="form-group col-sm-6 offset-sm-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" required>
                                    </div>

                                    {{-- <div class="form-group col-sm-6 offset-sm-3">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" id="address">
                                    </div> --}}
                                    <div class="form-group col-sm-6 offset-sm-3">
                                        <label for="batch">Department-Batch</label>
                                        <select class="form-control selectpicker" name="batch_id" id="batch" required>
                                            <option value="" disabled selected>Select One</option>
                                            @foreach ($batches as $batch)
                                                <option value="{{ $batch->id }}">{{ $batch->department->name }}--{{ $batch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer offset-sm-5">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
