@extends('layout')

@section('title', 'Create')

@section('content')
<div class="container">
    <!-- item cards -->
    <!-- first row of cards -->
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <form action="{{route('books.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                    @error('title')
                    <div class="alert alert-danger">
                        @foreach ($errors->get('title') as $message)
                        {{$message}}
                        @endforeach
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" id="author" name="author" value="{{old('author')}}">
                    @error('author')
                    <div class="alert alert-danger">
                        @foreach ($errors->get('author') as $message)
                        {{$message}}
                        @endforeach
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image_path" class="form-label">Image Path</label>
                    <input type="text" class="form-control" id="image_path" name="image_path"
                        value="{{old('image_path')}}">
                    @error('image_path')
                    <div class="alert alert-danger">
                        @foreach ($errors->get('image_path') as $message)
                        {{$message}}
                        @endforeach
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="publisher" class="form-label">Publisher</label>
                    <input type="text" class="form-control" id="publisher" name="publisher"
                        value="{{old('publisher')}}">
                    @error('publisher')
                    <div class="alert alert-danger">
                        @foreach ($errors->get('publisher') as $message)
                        {{$message}}
                        @endforeach
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" id="category" name="category" value="{{old('category')}}">
                    @error('category')
                    <div class="alert alert-danger">
                        @foreach ($errors->get('category') as $message)
                        {{$message}}
                        @endforeach
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="pages" class="form-label">Pages</label>
                    <input type="number" class="form-control" id="pages" name="pages" value="{{old('pages')}}">
                    @error('pages')
                    <div class="alert alert-danger">
                        @foreach ($errors->get('pages') as $message)
                        {{$message}}
                        @endforeach
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="desc" class="form-label">Language</label>
                    <input type="text" class="form-control" id="language" name="language"
                        value="{{old('language')}}"></input>
                    @error('language')
                    <div class="alert alert-danger">
                        @foreach ($errors->get('language') as $message)
                        {{$message}}
                        @endforeach
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="publish_date" class="form-label">Publish Date</label>
                    <input type="datetime-local" class="form-control" id="publish_date" name="publish_date"
                        value="{{old('publish_date')}}">
                    @error('publish_date')
                    <div class="alert alert-danger">
                        @foreach ($errors->get('publish_date') as $message)
                        {{$message}}
                        @endforeach
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="subjects" class="form-label">Subjects</label>
                    <input type="text" class="form-control" id="subjects" name="subjects" value="{{old('subjects')}}">
                    @error('subjects')
                    <div class="alert alert-danger">
                        @foreach ($errors->get('subjects') as $message)
                        {{$message}}
                        @endforeach
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <textarea class="form-control" id="desc" name="desc">{{old('desc')}}</textarea>
                    @error('desc')
                    <div class="alert alert-danger">
                        @foreach ($errors->get('desc') as $message)
                        {{$message}}
                        @endforeach
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" value="{{old('isbn')}}">
                    @error('isbn')
                    <div class="alert alert-danger">
                        @foreach ($errors->get('isbn') as $message)
                        {{$message}}
                        @endforeach
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('js/script.js')}}"></script>
@endsection