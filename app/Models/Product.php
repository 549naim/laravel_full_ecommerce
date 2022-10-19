<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'cate_id',
        'name',
        'small_desc',
        'description',
        'orginal_price',
        'selling_price',
        'image',
        'quantity',
        'p_q',
        'tax',
        'status',
        'trending',
        'meta_title',
        'meta_keywords',
        'meta_desc',
    ];

    public function category() {
        return $this->belongsTo(Category::class,'cate_id','id');
    }

}
