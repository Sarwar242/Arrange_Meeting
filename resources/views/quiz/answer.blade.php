@extends('Layout.AdminMaster')

@section('teacherView')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 offset-sm-5">
                        <h1>Quiz Answers</h1>
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
                                            <th scope="col">Roll</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Quiz</th>
                                            <th scope="col">Score</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($answers as $answer)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $answer->name }}</td>
                                                <td>{{ $answer->roll }}</td>
                                                <td>{{ $answer->email }}</td>
                                                <td><a href="{{ route('admin.quiz.setup',$answer->quiz->id) }}">{{ $answer->quiz->name }}</a></td>
                                                <td>{{ $answer->score }}</td>
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
