<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $category=Category::all()->toArray();
        return response()->json(array_reverse($category),200);
    }


    public function store(Request $request)
    {

        Category::create([
           'CategoryName'=>$request->input('name'),
        ]);
        return response()->json(['msg'=>'Succesfully'],200);
    }


    public function show($id)
    {
        $category=Category::where('id',$id)->first();

        return $category;

    }


    public function update( $id,Request $request)
    {
            $category=Category::where('id',$id)->first();
            $category->update([
                'CategoryName'=>$request->input('CategoryName')
            ]);
            return response()->json(['msg'=>'Update Succesfully',200]);
    }
    public function destroy($id)
    {
        if(Category::where('id',$id)->count()!=0){
            $category=Category::where('id',$id)->first();
            $category->delete();
            return response()->json(['msg'=>'Silme Başarılı'],200);
        }else{
            return response()->json(['msg'=>'Bulunamadı'],422);
        }
    }
}
