@extends("layouts.app")

@section ('content')

<!-- <h1>Create Post</h1> -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class ="container">
<form action="{{route('posts.store')}}" method="post">
 @csrf

  <div class="form-group">
    <label for="formGroupExampleInput">title</label>
    <input name="title" type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">description</label>
    <input name ="description" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
  </div>

  <h5>post creator</h5>
  <select class="form-control" name="post_creator">
    @foreach ($users as $users)
  <option value="   {{$users->id}}">{{$users->name}}</option>

  @endforeach
</select><br><br>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection