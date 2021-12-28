@extends('Layout.AdminMaster')
@section('EditTeacherForm')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 offset-sm-5">
                    <h1>Edit Teacher</h1>
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
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm"  action="{{ route('UpdateTeacher', [$findData->id]) }}" method="post" >
                            @csrf
                            <div class="card-body">
                                <div class="form-group col-sm-6 offset-sm-3">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Name" value="{{ $findData->name }}" required>
                                </div>
                                <div class="form-group col-sm-6 offset-sm-3">
                                    <label for="exampleInputPassword1">Department / Office</label>
                                    <select name="dept" class="form-control selectpicker" required>
                                        <option value="{{ $findData->dept }}">Select your Department/Office</option>
                                        <option>CSE</option>
                                        <option>Math</option>
                                        <option >Physics</option>
                                        <option >Chemistry</option>
                                        <option >Botany</option>
                                        <option >Sociology</option>
                                        <option >Economics</option>
                                        <option >Mayor's Office</option>
                                        <option >Tourism Office</option>
                                      </select>
                                </div>
                                <div class="form-group col-sm-6 offset-sm-3">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Password" value="{{ $findData->password }}" required>
                                </div>
                                <div class="form-group col-sm-6 offset-sm-3">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Email" value="{{ $findData->email }}" required>
                                </div>

                                <div class="form-group col-sm-6 offset-sm-3">
                                    <label for="exampleInputEmail1">Contact No.</label>
                                    <input type="contact" name="contact"  value="{{ $findData->contact }}" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Contact(017.....)" required>
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
