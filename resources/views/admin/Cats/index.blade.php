
@extends('admin.layout')

@section('main')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
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
            <h3 class="card-title">All Categories</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-sm btn-primary" data-toggle="model" data-target="#add-model">
                    Add new
                </button>
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
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cats as $cat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cat->name('en') }}</td>
                        <td>{{ $cat->name('ar') }}</td>
                        <td>

                            @if($cat->active)
                            <span class="badge badge-success">yes</span>
                            @else
                            <span class="badge badge-danger">no</span>
                            @endif
                        </td>
                        <td>
                          <button type="button" class="btn btn-sm btn-info edit-btn" data-id="{{ $cat->id }}" data-name-en="{{ $cat->name('en') }}"  data-name-ar="{{ $cat->name('ar') }}"  data-toggle="model" data-target="#add-model">
                            <i class="fas fa-edit"></i>
                          </button>
                          <a href="{{ url("dashboard/categories/delete/$cat->id") }}">
                          <i class="fas fa-trash"></i>
                        </a>
                          <a href="{{ url("dashboard/categories/toggle/$cat->id") }}">
                          <i class="fas fa-toggle-on"></i>
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

            <div class="model fade" id="add-model" aria-hidden="true" style="display: none;">
                <div class="model-dialog model-lg">
                    <div class="model-content">
                        <div class = "model-header">
                            <h4 class="model-title">Add New</h4>
                            <button type="button" class="close" data-dismiss="model" aria-label="Close">
                                <span aria-hidden="true">x</span>
                            </button>
                        </div>
            <div class="model-body">
            @include('admin.inc.errors')

<form method="Post" action = "{{ url('dashboard/categories/store') }}" id="add-form">
    @csrf
    <div class="row">
    <div class="col-6">
    <div class="form-group">
        <label> Name (ar) </label>
        <input type="text" name="name_ar" class="form-control">
    </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label> Name (en) </label>
            <input type="text" name="name_en" class="form-control">
        </div>
        </div>
</div>
</form>



                            <div class="model-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="model">close</button>
                            <button type="submit" class="btn btn-primary" form="edit-form">Submit</button>
                            </div>

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection

@section('script')

<script>
    $('.edit-btn').click(function(){
        let id = $(this).attr('data-id')
        let nameEn = $(this).attr('data-name-en')
        let nameAr = $(this).attr('data-name-ar')

        $('#edit-form-id').val(id)
        $('#edit-form-name-en').val(nameEn)
        $('#edit-form-name-ar').val(nameAr)
    })
    </script>

@endsection
