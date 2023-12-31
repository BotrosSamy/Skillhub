
@extends('admin.layout')

@section('main')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Skills</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Skills</li>
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
<div class="col-12">

    @include(
        'admin.inc.messages'
    )
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Exams</h3>
            <div class="card-tools">
                   <a href="{{ asset('dashboard/exams/create') }}" type="button" class="btn btn-sm btn-primary" data-toggle="model" data-target="#add-model">
                    Add new
                </a>
            </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-nowrap">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name (en)</th>
                    <th>Name (ar)</th>
                    <th>Image</th>
                    <th>Skill</th>
                    <th>Questions no.</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($exams as $exam)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $exam->name('en') }}</td>
                        <td>{{ $exam->name('ar') }}</td>
                        <td>
                           <img src=" {{ asset("uploads/$exam->img") }}" height="50px" alt="">
                        </td>
                        <td>{{ $exam->skill->name('en') }}</td>
                        <td>{{ $exam->question_no }}</td>
                        <td>

                            @if($exam->active)
                            <span class="badge badge-success">yes</span>
                            @else
                            <span class="badge badge-danger">no</span>
                            @endif
                        </td>
                        <td>
                         <a href="{{ url("dashboard/exams/edit/$exam->id") }}" class="btn btn-sm btn-info edit-btn" >
                            <i class="fas fa-edit"></i>
                         </a>
                        <a href="{{ url("dashboard/exams/show/$exam->id") }}" class="btn btn-sm btn-primary " >
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ url("dashboard/exams/show/$exam->id/questions") }}" class="btn btn-sm btn-success" >
                            <i class="fas fa-question"></i>
                         </a>
                        <a href="{{ url("dashboard/exams/delete/$exam->id") }}" class="btn btn-sm btn-primary ">
                          <i class="fas fa-trash"></i>
                        </a>
                          <a href="{{ url("dashboard/exams/toggle/$exam->id") }}" class="btn btn-sm btn-primary ">
                          <i class="fas fa-toggle-on"></i>
                        </a>

                          </td>
                          </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex my-3 justify-content-center">
                <!-- {{ $exams->links()}} -->
          </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>

         
            <div class="model-body">
            @include('admin.inc.errors')

  

    
@endsection

@section('script')


@endsection
