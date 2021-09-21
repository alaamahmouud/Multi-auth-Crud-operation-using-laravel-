@extends("layouts.app")

@section ('content')


<div class="card">
  <h5 class="card-header">post info</h5>

  <div class="card-body">
    <h5 class="card-title">title:</h5>{{$posts->title}}
    <h5 class="card-title">discreption:</h5>{{$posts->description}}
  </div>

  
</div><br><br>

<div class="card">
  <h5 class="card-header">post creator</h5>

  <div class="card-body">

    <h5 class="card-title">name:</h5> {{$posts->user->name}}
    <h5 class="card-title">email:</h5>  {{$posts->user->email}}
    <h5 class="card-title">created at:</h5> {{$posts->user->created_at}}
  </div>

</div>

@endsection