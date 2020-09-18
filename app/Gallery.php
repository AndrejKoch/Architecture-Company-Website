<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';

    protected $fillable = [
        'name','image','project_id'
    ];

    public function getProject()
    {
        return $this->belongsTo('App\Projects', 'project_id', 'id');
    }

    public function projects()
    {
        return $this->belongsTo('App\Projects', 'project_id', "id");
    }

}
