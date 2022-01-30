@extends('Layout.AdminMaster')

@section('teacherView')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 offset-sm-5">
                        <h1>Quiz</h1>
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
                                <h3 class="card-title">Quiz List</h3>
                                <h3 class="card-title float-right">
                                    <a href="{{ route('admin.quiz.create') }}" class="btn btn-sm btn-info">
                                        Add New
                                    </a>
                                </h3>
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
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Exam Link</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($quizs as $quiz)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $quiz->name }}</td>
                                                <td><a href="{{ route('quiz',$quiz->slug) }}" target="_blank">{{ url('/')}}/quiz/{{ $quiz->slug }}</a></td>
                                                <td>
                                                    <a href="{{ route('admin.quiz.setup', $quiz->id) }}" class="btn btn-primary" ><i class="fa fa-edit"
                                                            style="font-size:18px; color:primary"></i></a>
                                                    <a href="{{ route('admin.quiz.delete', $quiz->id) }}" class="btn btn-primary delete" data-confirm="Are you sure to delete this quiz exam?"><i class="fa fa-trash"
                                                            style="font-size:18px;  color:red""></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
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
