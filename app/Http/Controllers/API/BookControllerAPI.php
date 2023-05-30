<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookPostRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookControllerAPI extends Controller
{
    public function index(Request $request)
    {
        //dd($request->search);
        if ($request->has('search')) {
            $keyword = $request->search;
            //dd($keyword);

            $books = Book::where('isbn', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->whereHas('author', function (\Illuminate\Database\Eloquent\Builder $query) {
                    $query->where('name', 'LIKE', 'code%');
                })
                ->orWhere('publisher', 'LIKE', "%$keyword%")
                ->orWhere('category', 'LIKE', "%$keyword%")
                ->orWhere('subjects', 'LIKE', "%$keyword%")
                ->orWhere('desc', 'LIKE', "%$keyword%")->paginate(10)->withQueryString();
            ;
        } else {
            $books = Book::paginate(10);
        }
        if (!$books) {
            return response()->json([
                'status' => 'error',
                'message' => 'No data found',
                'error' => 404
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'data found',
            'data' => $books
        ], 200);
    }

    public function store(BookPostRequest $request)
    {
        //dd($request);
        $validated = $request->validated();

        $book = Book::create($validated);

        if (!$book) {
            return response()->json([
                'status' => 'error',
                'message' => 'failed to create data',
                'error' => 400
            ], 400);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'data created',
            'data' => $book
        ], 201);
    }

    public function show($id)
    {
        $bookDetail = Book::with('author')->where('id', $id)->first();

        if (!$bookDetail) {
            return response()->json([
                'status' => 'error',
                'message' => 'data not found',
                'error' => 404
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'data found',
            'data' => $bookDetail
        ], 200);
    }

    public function update(BookPostRequest $request, Book $book)
    {

        //dd($request);
        $validated = $request->validated();

        $book = Book::find($request->id)->update($validated);

        if (!$book) {
            return response()->json([
                'status' => 'error',
                'message' => 'failed to update data',
                'error' => 400
            ], 400);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'data updated',
            'data' => $book
        ], 200);
    }

    public function delete($id, Book $book)
    {


        $book = Book::find($id)->delete();

        if (!$book) {
            return response()->json([
                'status' => 'error',
                'message' => 'failed to delete data',
                'error' => 400
            ], 400);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'data deleted',
            'data' => $book
        ], 201);
    }

}