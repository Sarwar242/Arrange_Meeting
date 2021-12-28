@extends('Layout.AdminMaster')
@section('AddTeacherForm')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 offset-sm-5">
                        <h1>Create New Meeting</h1>
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
                            <form id="quickForm" action="{{ route('meeting.store') }}" method="post" >
                                @csrf
                                <div class="card-body">
                                    <p class="form-group text-center text-warning" id='warningday'></span>
                                    <div class="form-group col-sm-6 offset-sm-3">
                                        <label for="exampleInputEmail1">Date</label>
                                        <input type="date" name="day" class="form-control" id="day" required>
                                    </div>
                                    <div class="form-group col-sm-6 offset-sm-3">
                                        <label for="exampleInputPassword1">Select Recipiants</label>
                                        <select class="form-control selectpicker" data-live-search="true" name="participants[]" multiple aria-label="multiple select" required>
                                            @foreach($teachers as $teacher)
                                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                    <div class="form-group col-sm-6 offset-sm-3">
                                        <label for="exampleInputEmail1">Start Time </label>
                                        <input type="time" name="start" class="form-control" id="starttime" required>
                                    </div>
                                    <p class="form-group text-center text-warning" id='warning'></span>
                                    <div class="form-group col-sm-6 offset-sm-3">
                                        <label for="exampleInputEmail1">End Time</label>
                                        <input type="time" name="end" class="form-control" id="endtime" required>
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
