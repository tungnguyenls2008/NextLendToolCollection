<?php

namespace App\Models;



use Jenssegers\Mongodb\Eloquent\Model;

class DataPack extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'data_pack';
    protected $fillable=['data_pack','creator'];
    public function data(){
        return $this->hasMany(Data::class);
    }
}
