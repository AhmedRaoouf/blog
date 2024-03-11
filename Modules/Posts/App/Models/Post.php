<?php

namespace Modules\Posts\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Comments\App\Models\Comment;
use Modules\Posts\Database\factories\PostFactory;

class Post extends Model
{
    use HasFactory , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */

    protected $fillable = [
        'author', 'content', 'image','title','date'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // protected static function newFactory(): PostFactory
    // {
    //     //return PostFactory::new();
    // }
}
