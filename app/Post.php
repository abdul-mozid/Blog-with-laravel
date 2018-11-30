<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $table = "posts";
    protected $fillable = ['user_id', 'title', 'slug', 'image', 'body'];

    public function users() {
        return $this->belongsTo('App\User');
    }

    public function categories() {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function posted_by() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
