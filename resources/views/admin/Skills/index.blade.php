
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
            <h3 class="card-title">All Skills</h3>
            <div class="card-tools">
                   <a href="{{ asset('dashboard/skills/add') }}" type="button" class="btn btn-sm btn-primary" data-toggle="model" data-target="#add-model">
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
                    <th>Category</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($skills as $skill)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $skill->name('en') }}</td>
                        <td>{{ $skill->name('ar') }}</td>
                        <td>
                           <img src=" {{ asset("uploads/$skill->img") }}" height="50px" alt="">
                        </td>
                        <td>{{ $skill->cat->name('en') }}</td>
                        <td>

                            @if($skill->active)
                            <span class="badge badge-success">yes</span>
                            @else
                            <span class="badge badge-danger">no</span>
                            @endif
                        </td>
                        <td>
                          <button type="button" class="btn btn-sm btn-info edit-btn" data-id="{{ $skill->id }}" data-name-en="{{ $skill->name('en') }}"  data-name-ar="{{ $skill->name('ar') }}" data-img="{{ $skill->img }}" data-cat-id="{{ $skill->cat_id }}"  data-toggle="model" data-target="#add-model">
                            <i class="fas fa-edit"></i>
                          </button>
                          <a href="{{ url("dashboard/skills/delete/$skill->id") }}">
                          <i class="fas fa-trash"></i>
                        </a>
                          <a href="{{ url("dashboard/skills/toggle/$skill->id") }}">
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

         
            <div class="model-body">
            @include('admin.inc.errors')

  

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="model fade" id="edit-model" aria-hidden="true" style="display: none;">
    <div class="model-dialog model-lg">
        <div class="model-content">
        <div class="model-header">
            <h4 class= "model-title">Edit</h4>
            <button type="button" class="close" data-dismiss="model" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
        </div>
        <div class="model-body">
            @include('admin.inc.errors')
            <form method="POSt" action="{{ url('dashboard/skills/update') }}" id="edit-form">
                @csrf
                <input type="hidden" name="id" id="edit-form-id">

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



                <div class="row">
                    <div class="col-6">
                    <div class="form-group">
                        <label> Categoty </label>
                        <select  class="custom-select from-control" id="edit-form-cat-id" name="cat_id">

                        @foreach($cats as $cat)
                         <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach

                        </select>
                    </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label> Name (en) </label>
                            <input type="text" name="name_en" class="form-control">
                        </div>
                        </div>
             <div class="col-6">

                    <div class="form-group">
                        <label> Image </label>
                        <div class="input-group">
                        <div class="custom-file">                           
                        <input type="file" name="img" class="custom-file-input" name="img">
                        <label class="custom-file-label"> Choose file </label>
                    </div>
               
                    
                    </div>
                </div>


            </form>


@endsection

@section('script')

<script>
    $('.edit-btn').click(function(){
        let id = $(this).attr('data-id')
        let nameEn = $(this).attr('data-name-en')
        let nameAr = $(this).attr('data-name-ar')
        let img = $(this).attr('data-img')
        let catId = $(this).attr('data-cat-id')

 
        $('#edit-form-id').val(id)
        $('#edit-form-name-en').val(nameEn)
        $('#edit-form-name-ar').val(nameAr)
        $('#edit-form-cat-id').val(catId)

    })
    </script>

@endsection
