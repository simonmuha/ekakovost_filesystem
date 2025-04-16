<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Person;

class PostView extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'person_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the person associated with this view.
     */
    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
