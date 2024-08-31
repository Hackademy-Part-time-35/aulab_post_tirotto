<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;


class Category extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function articles(){
        return $this->hasMany(Article::class);
    }
}
