<?php

namespace App\Helper;
use Illuminate\Http\Request;


class mHelper
{
static function UploadImage(Request $request,$folder){
    $file=$request->file('image');
    $name='/'.$folder.'/'.uniqid().'.'.$file->extension();
    $file->storePubliclyAs('public',$name);
    return $name;
}
}
