@extends('Layout.AdminMaster')

@section('teacherView')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 offset-sm-5">
                        <h1>{{ $question->quiz->name }}</h1>
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
                                <h3 class="card-title">Question</h3>

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
                                <form id="quickForm" action="{{ route('admin.question.update', $question->id) }}" method="post" >
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group col-sm-6 offset-sm-1">
                                            <label for="question">Question: </label>
                                            <p id="question">{!! $question->question !!}</p>
                                        </div>
                                        @foreach ($question->options as $option)
                                            <div class="form-group col-sm-8 offset-sm-1">
                                                <h5 class="text {{ $option->is_correct ? 'text-success':'text-danger' }}">({{ $loop->index+1 }}). {{ $option->option }}</h5>
                                            </div>
                                        @endforeach


                                    </div>
                                <!-- /.card-body -->
                                {{-- <div class="card-footer offset-sm-5">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div> --}}
                            </form>
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
