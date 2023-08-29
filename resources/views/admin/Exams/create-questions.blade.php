
@extends('admin.layout')

@section('main')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Questions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('dashboard/exams') }}">Home</a></li>
              <li class="breadcrumb-item active">Add New (step 2)</li>
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
    

<form method="Post" action = "{{ url("dashboard/exams/store-questions/{$exam_id}") }}" enctype="multipart/form-data">
    @csrf

    <div class="card-body">

      @for($i=1 ;$i<=$question_no;$i++)
        <h5> Question {{$i}}</h5>

              <div class="row">
              <div class="col-6">
              <div class="form-group">
                <label> Title</label>
              <input type="text" name="titles[]" class="form-control">
             </div>
        
              </div>
              </div>

              <div class="row">
              <div class="col-6">
              <div class="form-group">
                <label> right_ans</label>
              <input type="text" name="right_ans[]" class="form-control">
             </div>
        
              </div>
              </div>

              <div class="row">
              <div class="col-6">
              <div class="form-group">
                <label> option_1</label>
              <input type="text" name="option_1s[]" class="form-control">
             </div>
        
              </div>
              </div>


              <div class="row">
              <div class="col-6">
              <div class="form-group">
                <label> option_2</label>
              <input type="text" name="option_2s[]" class="form-control">
             </div>
        
              </div>
              </div>
   

              <div class="row">
              <div class="col-6">
              <div class="form-group">
                <label> option_3</label>
              <input type="text" name="option_3s[]" class="form-control">
             </div>
        
              </div>
              </div>

              <div class="row">
              <div class="col-6">
              <div class="form-group">
                <label> option_4</label>
              <input type="text" name="option_4s[]" class="form-control">
             </div>
        
              </div>
              </div>
     <hr>
     @endfor
   
       <div>
            <button type="submit" class="btn btn-success" >Submit</button>
            <a href="{{url()->previous()}}" class="btn btn-primary" >Back</a>
       </div>
    </div>


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
