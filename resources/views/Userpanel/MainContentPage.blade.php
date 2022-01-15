
@extends('Layout.UserMaster')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            @foreach (App\Models\Meeting::where('host_id',auth()->id())->where('host_id',auth()->id())->get() as $meeting)
          <div class="col-lg-4">
                <div class="card">
                <div class="card-header border-0">
                    <h2 class="card-title"><b>{{ \Carbon\Carbon::parse($meeting->day)->format('l') }}</b> <span> <small>
                        [{{ \Carbon\Carbon::parse($meeting->day)->format('d-m-y') }}]</small> </span></h2>

                    <div class="card-tools">
                        <div class="btn-group">
                            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                <i class="fas fa-wrench"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <a href="#" class="dropdown-item">Finished</a>
                                <a href="#" class="dropdown-item">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
                <ul>
                    <li>Host: {{ $meeting->host->name }}</li>
                    @if (count($meeting->participants)>1)
                        <li>Other Participants: @foreach ($meeting->participants->where('teacher_id','!=', auth()->id()) as $participant)
                            <strong> {{ $participant->teacher->name }} &nbsp;</strong>
                            @endforeach
                        </li>
                    @endif
                    <li>Start: {{ \Carbon\Carbon::parse($meeting->start)->format('h:i A') }}</li>
                    <li>End: {{ \Carbon\Carbon::parse($meeting->end)->format('h:i A') }}</li>
                    <li>Status:{{ $meeting->status }}</li>
                </ul>
                </div>
            </div>
            @endforeach
            @foreach (App\Models\Participant::with('meeting')->where('teacher_id', auth()->id())->get() as $participant)
            <div class="col-lg-4">
                <div class="card">
                <div class="card-header border-0">
                    <h2 class="card-title"><b>{{ \Carbon\Carbon::parse($participant->meeting->day)->format('l') }}</b> <span> <small>
                        [{{ \Carbon\Carbon::parse($participant->meeting->day)->format('d-m-y') }}]</small> </span></h2>
                    <div class="card-tools">
                   
                    </div>
                </div>
                <ul>
                    <li>Host: {{ $participant->meeting->host->name }}</li>
                    @if (count($participant->meeting->participants)>1)
                        <li>Other Participants: @foreach ($participant->meeting->participants->where('teacher_id','!=', auth()->id()) as $participant1)
                            <strong> {{ $participant1->teacher->name }} &nbsp;</strong>
                            @endforeach
                        </li>
                    @endif
                    <li>Start: {{ \Carbon\Carbon::parse($participant->meeting->start)->format('h:i A') }}</li>
                    <li>End: {{ \Carbon\Carbon::parse($participant->meeting->end)->format('h:i A') }}</li>
                    <li>Status:{{ $participant->meeting->status }}</li>
                </ul>
                </div>
            <!-- /.card -->
          </div>
          @endforeach
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
@endsection()

