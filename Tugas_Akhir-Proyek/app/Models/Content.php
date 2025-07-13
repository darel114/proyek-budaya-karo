<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'image_path', 'sub_category_id'];

    public function subcategory() {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
}
