<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all()->toArray();
        return response()->json(array_reverse($users),200);
    }

    public function show($id)
    {
        $user=User::where('id',$id)->first();
        return $user;

    }
    public function update( $id,Request $request)
    {
        $user=User::where('id',$id)->first();
        $user->update([
           'name'=>$request->name,
            'email'=>$request->email
        ]);
        return response()->json(['msg'=>'Update Succesfully',200]);
    }
    public function updateRole($id,Request $request){
        $user=User::where('id',$id)->first();
        $user->update([
            'role_id'=>$request->role_id,
        ]);
        return response()->json(['msg'=>'Update Succesfully',200]);
    }
    public function updatePassword($id,Request $request){
        $user=User::where('id',$id)->first();
        $user->update([
            'password'=>Hash::make($request->password)
        ]);
        return response()->json(['msg'=>'Update Succesfully',200]);
    }
    public function destroy($id)
    {
        if(User::where('id',$id)->count()!=0){
            $user=User::where('id',$id)->first();
            $user->delete();
            return response()->json(['msg'=>'Silme Başarılı'],200);
        }else{
            return response()->json(['msg'=>'Bulunamadı'],422);
        }
    }
}
