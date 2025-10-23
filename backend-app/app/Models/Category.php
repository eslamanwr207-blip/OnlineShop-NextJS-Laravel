<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['title', 'image', 'parent_id'];

    public function parents()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function children(){
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
