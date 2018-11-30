<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = "categories";
    protected $fillable = ['name', 'slug','image'];

    public function created_by_info() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updated_by_info() {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
    public function posts(){
        return $this->belongsToMany('App\Post')->withTimestamps();
    }

}
