@extends("layouts.app")

@section ('content')
<div class="col-sm-4">
<div class="trending-wr apper">
        <h4>result for search</h4>
        
        @foreach($users as $item)
        <div class ="searched-item">
        <div class="">
                {{$item->id}}
                <h3>{{$item->name}}</h3>
        </div>

        @endforeach
     </div>
</div>

@endsection