<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::latest()->get();
        return response()->json($books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Books::create(
            $request->all()
        );
        return response()->json(
            [
                'message' => 'created successfull',

            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Books::find($id);
        if (!empty($books)) {

            return response()->json(

                Books::where('id', $id)->get(),
            );
        } else {

            return response()->json(['message' => 'Content not found'], 404);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $books = Books::find($id);
        if (!empty($books)) {
            // dd($request->all());
            Books::where('id', $id)->update($request->all());
            return response()->json([
                'message' => 'update successfull',
            ]);
        } else {

            return response()->json(['message' => 'Content not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $books = Books::find($id);
        if ($books) {
            Books::where('id', $id)->delete();
            return response()->json(['message' => 'content Delete successfull'], 201);
        } else {
            return response()->json(['message' => 'content not found'], 404);
        }
    }
}
