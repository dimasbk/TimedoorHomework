@extends('layout')

@section('title', 'Home')

@section('content')
<!-- item cards -->
<!-- first row of cards -->
@if (session('status'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{session('status')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('deleted'))
<div class="alert alert-danger alert-dismissible" role="alert">
    {{session('deleted')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@auth
<a href="/books/create" type="button" class="btn btn-primary">Create Data</a>
@endauth
<div class="row">
    @foreach ($books as $book)
    <div class="col-sm-6 col-md-3">
        <div class="thumbnail">
            <img src="{{$book->image_path}}" alt="Book Image" width="250px" />
            <div class="caption">
                <h3>{{$book->title}}</h3>
                <p>
                    {{Str::limit($book->desc, 50)}}...
                </p>
                <div class="text-center">
                    <div class="delete-btn-container">
                        <a href="/books/{{$book->id}}" class="btn btn-default" role="button">Show Detail</a>
                        @auth
                        @can('update-delete-book', $book)
                        <a href="/books/{{$book->id}}/edit" class="btn btn-default" role="button">Edit</a>
                        <form action="/books/{{$book->id}}/delete" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                        @else
                        <a href="/books/{{$book->id}}/edit" class="btn btn-default" role="button" disabled>Edit</a>
                        <form action="/books/{{$book->id}}/delete" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" disabled>Delete</button>
                        </form>
                        @endcan
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection

@section('pagination')
<div class="text-center">
    <nav aria-label="Page navigation">
        {!!$books->links()!!}
    </nav>
</div>
@endsection