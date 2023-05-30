@extends('layout')

@section('title', 'Create')

@section('content')
<div class="container">
    <!-- item cards -->
    <!-- first row of cards -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <form action="/books/{{$bookDetail->id}}/update" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$bookDetail->id}}">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$bookDetail->title}}">
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" id="author" name="author" value="{{$bookDetail->author}}">
                </div>

                <div class=" mb-3">
                    <label for="image_path" class="form-label">Image Path</label>
                    <input type="text" class="form-control" id="image_path" name="image_path"
                        value="{{$bookDetail->image_path}}">
                </div>

                <div class=" mb-3">
                    <label for="publisher" class="form-label">Publisher</label>
                    <input type="text" class="form-control" id="publisher" name="publisher"
                        value="{{$bookDetail->publisher}}">
                </div>

                <div class=" mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" id="category" name="category"
                        value="{{$bookDetail->category}}">
                </div>

                <div class=" mb-3">
                    <label for="pages" class="form-label">Pages</label>
                    <input type="number" class="form-control" id="pages" name="pages" value="{{$bookDetail->pages}}">
                </div>

                <div class=" mb-3">
                    <label for="desc" class="form-label">Language</label>
                    <input type="text" class="form-control" id="language" name="language"
                        value="{{$bookDetail->language}}">

                </div>

                <div class=" mb-3">
                    <label for="publish_date" class="form-label">Publish Date</label>
                    <input type="datetime-local" class="form-control" id="publish_date" name="publish_date"
                        value="{{$bookDetail->publish_date}}">
                </div>

                <div class=" mb-3">
                    <label for="subjects" class="form-label">Subjects</label>
                    <input type="text" class="form-control" id="subjects" name="subjects"
                        value="{{$bookDetail->subjects}}">
                </div>

                <div class=" mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <textarea class="form-control" id="desc" name="desc">{{$bookDetail->desc}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" value="{{$bookDetail->isbn}}">
                </div>

                <button type=" submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('js/script.js')}}"></script>
@endsection