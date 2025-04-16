<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Person;
use App\Models\School\SchoolOrganization;

class PostComment extends Model
{
    use HasFactory;
    protected $fillable = ['post_id', 'user_id', 'post_comment_content', 'post_comment_approved', 'post_comment_is_global', 'school_organization_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(Person::class, 'user_id');
    }

    public function school()
    {
        return $this->belongsTo(SchoolOrganization::class, 'school_organization_id' );
    }
}
