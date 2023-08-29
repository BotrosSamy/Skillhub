@extends('web.layout')


@section('tilte')
 Verify Email
@endsection

@section('main')
 
 <div class="alert alert-success">
    A verifation Emai sent successfully , please check your inbox 
 </div>

 <form action="{{url('email/verification-notification')}}" method="post">
            @csrf
            <button type="submit" class="main-button icon-button pull-right" > Resend </button>
 </form>

@endsection