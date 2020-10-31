<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'name','image','slug','description','link','location','price','size','bedrooms','toilets'
    ];

    public function gallery()
    {
        return $this->hasMany('App\Gallery','service_id','id');
    }
}
