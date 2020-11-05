<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthorsController extends Controller {

    public function index ()
    {
        return Author::all();
    }

    public function show($id)
    {
        $authors = Author::find($id);
        if($authors){
        return response()->json([
            'message' => 'Authors Found',
            'data' => $authors
        ], 200);
        } else{
            return response()->json([
                'message' => 'Authors Not Found.'
            ], 404);
        }
    }

    public function store (Request $request)
    {
        $this -> validate ($request, [
            'name' => 'required',
            'gender' => 'required',
            'biography' => 'required'
        ]);

        $authors = Author::create(
            $request -> only (['name', 'gender', 'biography'])
        );

        return response () -> json ([
            'created' => true,
            'message' => 'Authors Created',
            'data' => $authors
        ], 200);
    }

    public function update (Request $request, $id)
        {
            try {
                $authors = Author::findorFail($id);
            } catch (ModelNotFoundException $e) {
                return response () -> json ([
                    'message' => 'Authors Not Found'
                ], 404);
            }

            $authors -> fill(
                $request -> only (['name', 'gender', 'biography'])
            );

            $authors -> save();

            return response () -> json ([
                'update' => [
                    'message' => 'Authors Updated',
                    'data' => $authors
                    
                ]
            ], 200);
        }

    public function destroy($id)
        {
            try {
                $authors = Author::findorFail($id);
                
            } catch (ModelNotFoundException $e) {
                return response () -> json ([
                    'error' => [
                        'message' => 'Authors Not Found'
                    ]
                ], 404);
            }

            $authors -> delete();
            return response () -> json([
                'deleted' => [
                    'message' => 'Authors Deleted'
                ]
            ], 200);
        }
}