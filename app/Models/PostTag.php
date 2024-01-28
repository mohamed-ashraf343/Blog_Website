<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class PostTag extends Model implements TranslatableContract
{
    use HasFactory , Translatable;
    public $timestamps = false;
    protected $fillable = ['id', 'post_id', 'tag_id', 'created_at', 'updated_at', 'deleted_at'];
}
