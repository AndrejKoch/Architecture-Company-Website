<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'name','image','slug','category_id', 'description'
    ];

    public function getCategory()
    {
        return $this->belongsTo('App\Categories', 'category_id', 'id');
    }

    public function gallery()
    {
        return $this->hasMany('App\Gallery','project_id','id');
    }
}
