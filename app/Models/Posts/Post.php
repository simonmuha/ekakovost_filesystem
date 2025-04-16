<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use App\Models\Person;
use App\Models\School\SchoolOrganization;


class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_id', 'post_title', 'post_slug ', 'post_summary', 'post_content', 'post_cover_image', 'post_comments_enabled',
        'post_topic', 'post_valid_from', 'post_valid_until', 'post_category_id', 'spost_tatus', 'post_views', 'post_published_at', 'post_is_global', 'school_organization_id'
    ];

    public function projects()
{
    return $this->belongsToMany(\App\Models\Projects\Project::class, 'project_post')
        ->using(\App\Models\Projects\ProjectPost::class)
        ->withPivot('project_post_date', 'project_post_description')
        ->withTimestamps();
}


    public function viewers()
    {
        return $this->belongsToMany(Person::class, 'post_views', 'post_id', 'person_id')
                    ->withTimestamps();
    }
    public function organizationviewers()
    {
        $currentPerson = Auth::user()->person; // Trenutni uporabnik

        // Vrni gledalce, ki so v isti organizaciji kot trenutni uporabnik
        return $this->viewers()
                    ->whereHas('organizations', function ($query) use ($currentPerson) {
                        $query->where('school_organization_people.school_organization_id', $currentPerson->organization_id);
                    });
    }
    public function postViews()
    {
        return $this->hasMany(PostView::class);
    }
    public function author()
    {
        return $this->belongsTo(Person::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(PostTag::class, 'post_post_tags', 'post_id', 'post_tag_id');
    }

    public function comments()
    {
        return $this->hasMany(PostComment::class);
    }

    public function school()
    {
        return $this->belongsTo(SchoolOrganization::class, 'school_organization_id');
    }

    public function categories()
    {
        return $this->belongsToMany(PostCategory::class, 'post_categories');
    }
}
