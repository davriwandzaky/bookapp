<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BooksController extends Controller {

    public function index ()
    {
        return Book::all();
    }

    public function show($id)
    {
        $books = Book::find($id);
        if($books){
        return response()->json([
            'message' => 'Book Found',
            'data' => $books
        ], 200);
        } else{
            return response()->json([
                'message' => 'Book Not Found.'
            ], 404);
        }
    }

    public function store (Request $request)
    {
        $this -> validate ($request, [
            'title' => 'required',
            'description' => 'required',
            'author' => 'required'
        ]);

        $books = Book::create(
            $request -> only (['title', 'description', 'author'])
        );

        return response () -> json ([
            'created' => true,
            'data' => $books
        ], 201);
    }

    public function update (Request $request, $id)
        {
            try {
                $books = Book::findorFail($id);
            } catch (ModelNotFoundException $e) {
                return response () -> json ([
                    'message' => 'book not found'
                ], 404);
            }

            $books -> fill(
                $request -> only (['title', 'description', 'author'])
            );

            $books -> save();

            return response () -> json ([
                'update' => true,
                'data' => $books
            ], 200);
        }

    public function destroy($id)
        {
            try {
                $books = Book::findorFail($id);
                
            } catch (ModelNotFoundException $e) {
                return response () -> json ([
                    'error' => [
                        'message' => 'book not found'
                    ]
                ], 404);
            }

            $books -> delete();
            return response () -> json([
                'deleted' => true
            ], 200);
        }
}