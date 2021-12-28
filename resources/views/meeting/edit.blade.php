@extends('Layout.AdminMaster')
@section('AddTeacherForm')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 offset-sm-5">
                        <h1>Update Meeting</h1>
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
                            <form id="quickForm" action="{{ route('meeting.update.post', $meeting->id) }}" method="post" >
                                @csrf
                                <div class="card-body">
                                    <p class="form-group text-center text-warning" id='warningday'></span>
                                    <div class="form-group col-sm-6 offset-sm-3">
                                        <label for="exampleInputEmail1">Date: {{ \Carbon\Carbon::parse($meeting->day)->format('d M Y') }}</label>
                                        <input type="date" name="day" class="form-control" id="day">
                                    </div>
                                    <div class="form-group col-sm-6 offset-sm-3">
                                        <label for="exampleInputPassword1">Select Recipiants</label>
                                        <select class="form-control selectpicker" data-live-search="true" name="participants[]" multiple aria-label="multiple select" required>

                                            @foreach($teachers as $teacher)
                                                @php $check=0; @endphp
                                                @foreach($meeting->participants as $participant)
                                                    @if ($participant->teacher_id == $teacher->id)
                                                    <option value="{{$teacher->id}}" selected>{{$teacher->name}}</option>
                                                    @php $check=1; @endphp
                                                    @break
                                                    @endif
                                                @endforeach
                                                @if ($check==0)
                                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                                @endif
                                            @endforeach
                                          </select>
                                    </div>
                                    <div class="form-group col-sm-6 offset-sm-3">
                                        <label for="exampleInputEmail1">Start Time: {{ \Carbon\Carbon::parse($meeting->start)->format('h:i A') }} </label>
                                        <input type="time" name="start" class="form-control" id="starttime" >
                                    </div>
                                    <p class="form-group text-center text-warning" id='warning'></span>
                                    <div class="form-group col-sm-6 offset-sm-3">
                                        <label for="exampleInputEmail1">End Time: {{ \Carbon\Carbon::parse($meeting->end)->format('h:i A') }}</label>
                                        <input type="time" name="end" class="form-control" id="endtime" >
                                    </div>

                                </div>
                                <div class="form-group col-sm-6 offset-sm-3">
                                    <label for="exampleInputPassword1">Status</label>
                                    <select class="form-control selectpicker" data-live-search="true" name="status" aria-label="select" required>
                                        @foreach($statuses as $status)
                                            <option value="{{$status}}" {{ $meeting->status == $status ? 'selected':''}} >{{$status}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer offset-sm-5">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
