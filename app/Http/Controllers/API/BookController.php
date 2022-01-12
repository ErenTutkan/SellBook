<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books=Book::all()->toArray();
        return response()->json(array_reverse($books),200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Book::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'image'=>$request->input('image'),
            'category_id'=>$request->input('category_id')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Book::where('id',$id)->count()!=0){
            $book=Book::where('id',$id)->first();
            return $book;

        }else{
            return response()->json(['msg'=>'Error']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id,Request $request)
    {
        if(Book::where('id',$id)->count()!=0){
            $book=Book::where('id',$id)->first();
            $book->update([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'category_id'=>$request->input('category_id')
            ]);

        }else{
            return response()->json(['msg'=>'hata']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Book::where('id',$id)->count()!=0){
            $book=Book::where('id',$id)->first();
            $book->delete();
            return response()->json(['msg'=>'Succesfully']);

        }else{
            return response()->json(['msg'=>'hata']);
        }
    }
}
