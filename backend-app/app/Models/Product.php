<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title','image','category_id','discount','price','colors','sizes','quantity','description'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
