@extends('layout')

@section('title', 'Home')

@section('content')
<div class="container">
    <!-- item cards -->
    <!-- first row of cards -->
    @if ($bookDetail == null)
    <h1>Data Tidak Ditemukan</h1>
    @else
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <div class="thumbnail">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="{{$bookDetail->image_path}}" alt="Book Image" class="pt-10 pb-10 pl-10" width="250px">
                        <div class="text-center">
                            <a href="#" class="btn btn-default mt-10 mb-10" role="button">Borrow</a>
                            <!-- <a href="#" class="btn btn-default" role="button">Buy</a> -->
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-8">
                        <h2><b>{{$bookDetail->title}}</b></h2>
                        <p><small>by</small> <a href="#" class="h-link">{{$bookDetail->author->name}}</a></p>
                        <div class="pt-20">
                            <p>Publisher <a href="#" class="h-link">{{$bookDetail->publisher}}</a></p>
                            <p>Category <a href="#" class="h-link">{{$bookDetail->category}}</a></p>
                            <p>Pages <b>{{$bookDetail->pages}}</b></p>
                            <p>Language <a href="#" class="h-link">{{$bookDetail->language}}</a></p>
                            <p>Publish Date <a href="#" class="h-link">{{$bookDetail->publish_date}}</a></p>
                            <p>Subjects
                                <a href="#" class="h-link">{{$bookDetail->subjects}}</a>,
                            </p>
                            <p id="synopsis">{{Str::limit($bookDetail->desc, 50, '')}}<span id="dots">...</span><span
                                    id="more">{{Str::replace(Str::limit($bookDetail->desc,50,''), '',
                                    $bookDetail->desc)}}</span></p>
                            <p class="h-link" id="read-btn" onclick="showCompleteText()">Read more</p>
                            <p>ISBN <b>{{$bookDetail->isbn}}</b></p>
                        </div>

                        <form action="/books/{{$bookDetail->id}}/delete" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div id="delete" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <div class="icon-box">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </div>
                    <h4 class="modal-title w-100">Are you sure?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Untuk Menghapus Data?</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="/books/{{$bookDetail->id}}/delete" ype="button" class="btn btn-primary">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/script.js')}}"></script>
@endsection