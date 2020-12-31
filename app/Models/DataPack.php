<?php

namespace App\Models;



use Jenssegers\Mongodb\Eloquent\Model;

class DataPack extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'data_pack';
    protected $fillable=['data_pack','creator','form_id'];

    public function data(){
        return $this->hasMany(Data::class);
    }
}
