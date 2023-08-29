
@extends('admin.layout')

@section('main')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admins</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('dashboard/exams') }}">Exams</a></li>
              <li class="breadcrumb-item active">Admins</li>
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
                    <h3 class="card-title">Admins</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-nowrap">
                        <thead>
                            <tr>
                                <a  href="{{ url("dashboard/admins/create") }}" class="btn btn-sm btn-primary">
                                    Add Admin
                                  </a>
                            </tr>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Verified</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->role->name }}</td>
                                <td>
                                @if($admin->email_verified_at)
                                <span class="badge badge-success">yes</span>
                                @else
                                <span class="badge badge-danger">no</span>
                                @endif
                               </td>


                                <td>

                                    <a  href="#" class="btn btn-sm btn-primary">
                                        <i class="fas fa-percent"></i>
                                      </a>

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

