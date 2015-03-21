<?php namespace jorenvanhocht\Blogify\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model{

    use SoftDeletes;

    /**
     * The database table used by the model
     *
     * @var string
     */
    protected $table        = 'posts';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable     = [];

    /**
     * Set or unset the timestamps for the model
     *
     * @var bool
     */
    public $timestamps      = true;

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    |
    | For more information pleas check out the official Laravel docs at
    | http://laravel.com/docs/5.0/eloquent#relationships
    |
    */

    public function user()
    {
        return $this->belongsTo('jorenvanhocht\Blogify\Models\user');
    }

    public function comment()
    {
        return $this->hasMany('jorenvanhocht\Blogify\Models\comment');
    }

    public function category()
    {
        return $this->belongsTo('jorenvanhocht\Blogify\Models\category');
    }

    public function media()
    {
        return $this->hasMany('jorenvanhocht\Blogify\Models\media');
    }

    public function alias()
    {
        return $this->hasMany('jorenvanhocht\Blogify\Models\alias');
    }

    public function tag()
    {
        return $this->belongsToMany('jorenvanhocht\Blogify\Models\tag', 'posts_have_tags', 'post_id', 'tag_id');
    }

}