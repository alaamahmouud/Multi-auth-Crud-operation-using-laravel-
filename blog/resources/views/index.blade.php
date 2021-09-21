@extends("layouts.app")

@section ('content')

<nav class="navbar navbar-light bg-light">
	<a class="navbar-brand">Find users</a>
	<form class="form-inline" action="{{route('search')}}">
		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
		 name="query">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	</form>
</nav>

<!-- <h5>to add new post</h5> -->
<a class="btn btn-danger" href="{{route('posts.create')}}">Crear new post</a>


<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">title</th>
      <th scope="col">description</th>
      <th scope="col">post creator</th>
      <th scope="col">actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
        <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->description}}</td>
        <td>{{$post->user ? $post->user->name :'not found'}}</td>
        <td><a href="{{route( 'posts.show' , ['post'=>$post->id])}}" class="btn btn-secondary mx-1">View</a></td>
        <td><a href="{{route( 'posts.edit' , ['post'=>$post->id])}}" class="btn btn-secondary mx-1">Edit</a></td>

        <td>
            <form method="post" action="{{route('posts.destroy' , ['post'=>$post->id])}}">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger mx-1">Delete</button>
              </form>
         </td>


        </tr> 

    @endforeach
  </tbody>
</table>

@endsection