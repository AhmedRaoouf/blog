<?php

namespace Modules\Comments\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Comments\Database\factories\CommentFactory;
use Modules\Posts\App\Models\Post;

class Comment extends Model
{
    use HasFactory , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id','post_id' ,'comment', 'date',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // protected static function newFactory(): CommentFactory
    // {
    //     //return CommentFactory::new();
    // }
}
