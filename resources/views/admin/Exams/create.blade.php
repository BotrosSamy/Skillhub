
@extends('admin.layout')

@section('main')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Exams</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Exams</li>
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
    

<form method="Post" action = "{{ url('dashboard/exams/store') }}" id="add-form" enctype="multipart/form-data">
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


        <div class="form-group">
            <label> Description (en) </label>
            <textarea  name="desc_en"  rows="5" class="form-control"></textarea>
        </div>
    <div class="form-group">
            <label> Description (ar) </label>
            <textarea  name="desc_ar"  rows="5" class="form-control"></textarea>
        </div>

    <div class="col-6">
                    <div class="form-group">
                        <label> Skills </label>
                    
                        <input  class="custom-select from-control" list="browsers" name="skill_id" id="browser">
                        <datalist id="browsers">
                        @foreach($skills as $skill)
                         <option value="{{$skill->id}}"> {{ $skill->name('en') }} </option>
                        @endforeach

                        </datalist>

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
             </div>

             
      
             <div class="col-4">
                    <div class="form-group">
                        <label> Diffculty </label>
                        <input type="number"  class="form-control"  name="diffculty" >
                    </div>
            </div>

            <div class="col-4">
                    <div class="form-group">
                        <label> Question Number </label>
                        <input type="number"  class="form-control"  name="question_no" >
                    </div>
            </div>
            <div class="col-4">
                    <div class="form-group">
                        <label> Duration(mins) </label>
                        <input type="number"  class="form-control"  name="duration" >
                    </div>
            </div>
                <div class="model-footer justify-content-between">
       
            <button type="submit" class="btn btn-primary" >Submit</button>
            <a href="{{url()->previous()}}" class="btn btn-primary" >Back</a>


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
