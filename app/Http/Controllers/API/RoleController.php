<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Role;
use http\Env\Response;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles=Role::all()->toArray();
        return response()->json($roles,200);
    }
    public function store(Request $request){
        $role=Role::create([
            'name'=>$request->name,
        ]);
    }
    public function show($id){
        $role=Role::find($id);
        return response()->json($role);
    }
    public function update($id,Request $request){
        if(Role::where('id',$id)->count()!=0){

            $role=Role::where('id',$id)->update([
                'name'=>$request->name
            ]);
            return response()->json(['msg'=>'Succesfully',200]);
        }else{
            return response()->json(['msg'=>'Error'],412);
        }
    }
    public function destroy($id){
        if(Role::where('id',$id)->count()!=0){
            $role=Role::where('id',$id)->delete();
            return response()->json(['msg'=>'Succesfully',200]);
        }else{
            return response()->json(['msg'=>'Error'],412);
        }
    }
}
