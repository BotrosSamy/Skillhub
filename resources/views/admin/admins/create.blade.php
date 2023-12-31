
@extends('admin.layout')

@section('main')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Add New (Admin)</li>
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
<div class="col-12 pb-3">

    @include(
        'admin.inc.errors'
    )
    

    <form method="POST" action="{{ url("dashboard/admins/store") }}">
                            @csrf
                            <div class="raw">
                                <div class="col-6">
                                    <div class="form-group">
                                                <label>Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Name">
                                    </div></div>
                                    <div class="col-6">
                                        <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="form-control" type="email" name="email" placeholder="Email">

                                        </div></div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                        <label>Password</label>
                                                        <input class="form-control" type="password" name="password" placeholder="Password">
                                            </div></div>

                            <button type="submit" class="main-button icon-button pull-right">Submit</button>
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                      

</form>



        
    </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('script')

@endsection
