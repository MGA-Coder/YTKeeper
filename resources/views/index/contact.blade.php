@extends('app')

@section('content')

<div class="page-master">
  <div class="container">
    <h1 class="header">{{$title}}</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
      </ol>
    </nav>

    @if ( session()->has('result') )

    <div class="alert alert-success" role="alert">
      {{session()->get('result')}}
    </div>
    @endif
    <div class="content-page">
      <p>Do you have any questions or suggestions or would you like to report an error? Just send us a message. Please, note that we will only answer contact requests written in English. Although we do not guaranty a response, we typically try to respond within 24-48 hours</p>

      <div class="row">
        <div class="col-sm-6 offset-sm-3">
          <form class="contact-form" method="post">
             @csrf
            <div class="form-group">
              <label for="">Your Name</label>
              <input type="text" name="name" class="form-control" required value="">
            </div>
            <div class="form-group">
              <label for="">Your Email</label>
              <input type="email" name="email" class="form-control" required value="">
            </div>
            <div class="form-group">
              <label for="">Subject</label>
              <input type="text" name="subject" class="form-control" required value="">
            </div>
            <div class="form-group">
              <label for="">Your Message</label>
              <textarea name="message" rows="8" cols="50" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" name="button"> <i class="fas fa-fighter-jet"></i> Send Message Now</button>
          </form>
        </div>
      </div>

    </div>

  </div>
</div>



@endsection
