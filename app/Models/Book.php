<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable=['name','description','image','category_id'];
    public function category(){
        return $this.$this->hasOne(Category::class,'category_id','id');
    }
}