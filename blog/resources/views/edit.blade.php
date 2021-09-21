@extends('layouts.app')


@section('content')

<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->

<form class="mt-5" action="{{route ('posts.update' , ['post'=>$posts->id]  ) }}" method="post">
@csrf
@method('PUT')


  <div  class="form-group">
  <label for="formGroupExampleInput">title</label>
    <input type="text" name="title" value="{{$posts->title}}" placeholder="" class="form-control">

  </div>

 

  <label for="formGroupExampleInput2">description</label>
  <textarea class="form-control" value="{{$posts->description}}" name="description" placeholder="" style=" resize:none;">{{$posts->description}}</textarea>

  <button type="submit" href=""  class="btn btn-danger mt-3">Update</button>

@endsection