<?php

namespace App\Http\Controllers\API;

use App\Helper\mHelper;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books=Book::with('category')->get()->toArray();
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
        $data=$request->validate([
           'name'=>['required','string'],
            'image'=>['image'],
            'description'=>['required','string'],
            'category_id'=>['required']
        ]);
        $name=mHelper::UploadImage($request,'book');
        $data['image']=$name;
        Book::create($data);
        return response()->json(['msg'=>'Successfully']);
    }


    public function show($id)
    {
        if(Book::where('id',$id)->count()!=0){
            $book=Book::where('id',$id)->first();
            return response()->json($book);

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
            $data=$request->validate([
                'name'=>['required','string'],
                'description'=>['required','string'],
                'category_id'=>['required']
            ]);
            if($request->file('image')!=null){
                $name=mHelper::UploadImage($request,'book');
                $data['image']=$name;
            }else{
                $data['image']=$book[0]['image'];
            }
            $book->update($data);
            return response()->json(['msg'=>'Update Succesfully']);

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
