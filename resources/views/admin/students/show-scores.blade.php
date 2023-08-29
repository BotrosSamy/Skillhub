
@extends('admin.layout')

@section('main')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Show Scores</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('dashboard/exams') }}">Exams</a></li>
              <li class="breadcrumb-item active">{{ $student->name }} Scores</li>
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
          <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $student->name }} Scores</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Exam</th>
                            <th>Score</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($exams as $exam)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $exam->name('en') }}</td>
                                <td>{{ $exam->pivot->score }}</td>
                                <td>{{ $exam->pivot->time_mins }}</td>
                                <td>{{ $exam->pivot->status }}</td>

                                  <td>
                                  @if($exam->pivot->status == 'closed')
                                    <a  href="{{ url("/dashboard/students/open-exam/$student->id/$exam->id") }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-lock-open"></i>
                                      </a>
                                 @endif

                                    @if($exam->pivot->status == 'opened')
                                      <a  href="{{ url("/dashboard/students/close-exam/$student->id/$exam->id") }}" class="btn btn-sm btn-danger">
                                          <i class="fas fa-lock"></i>
                                        </a>
                                   @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex my-3 justify-content-center">

                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>

                </div>
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

