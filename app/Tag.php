<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Tag extends Model {

    protected $table = "tags";
    protected $fillable = ['name', 'slug'];

    public function created_by_info() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updated_by_info() {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function posts() {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }

}
