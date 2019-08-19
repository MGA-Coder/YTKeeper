<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <title>{{$title}} @if (request()->segment(1) !== null) | YTKeeper @endif</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('')}}vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="{{asset('')}}vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template -->
    <link href="{{asset('')}}css/landing-page.min.css" rel="stylesheet">
    <link href="{{asset('')}}css/master.css" rel="stylesheet">
    @yield('css')
  </head>
    <body>
    <!-- Navigation -->
    <nav class="navbar navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">YTKeeper</a>
        <a class="btn btn-primary" href="{{url('contact-us')}}"> <i class="fas fa-phone"></i> Contact us</a>
      </div>
    </nav>
    @yield('content')
    <!-- Footer -->
    @include('layouts.footer')
    @include('layouts.mainJavascript')
    @yield('javascript')

  </body>
</html>
