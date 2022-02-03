<?php

namespace App\Models;

use Database\Seeders\Categories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $guarded = [];
    public function options()
    {
        return $this->hasMany(Option::class);
    }
   public function category(){
       return $this->belongsTo(Category::class);
   }
}
