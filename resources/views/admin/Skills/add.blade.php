
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
        'admin.inc.errors'
    )
    

<form method="Post" action = "{{ url('dashboard/skills/store') }}" id="add-form" enctype="multipart/form-data">
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

    <div class="col-6">
                    <div class="form-group">
                        <label> Categoty </label>
                        <select  class="custom-select from-control" id="edit-form-cat-id" name="cat_id">

                        @foreach($cats as $cat)
                         <option value="{{$cat->id}}">{{$cat->name('en')}}</option>
                        @endforeach

                        </select>
                    </div>
                    </div>
             
             <div class="col-6">

                    <div class="form-group">
                        <label> Image </label>
                        <div class="input-group">
                            <div class="custom-file">
                        <input type="file" name="img" class="custom-file-input">
                        <label class="custom-file-label"> Choose file </label>
                    </div>
                    
                    </div>
                </div>

                <div class="model-footer justify-content-between">
       
            <button type="submit" class="btn btn-primary" >Submit</button>


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
