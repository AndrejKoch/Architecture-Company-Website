<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallery';

    protected $fillable = [
        'name','image','project_id','service_id'
    ];

    public function getProject()
    {
        return $this->belongsTo('App\Projects', 'project_id', 'id');
    }

    public function projects()
    {
        return $this->belongsTo('App\Projects', 'project_id', "id");
    }

    public function getServices()
    {
        return $this->belongsTo('App\Services', 'service_id', 'id');
    }

    public function services()
    {
        return $this->belongsTo('App\Services', 'service_id', "id");
    }

}
