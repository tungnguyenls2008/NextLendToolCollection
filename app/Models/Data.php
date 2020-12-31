<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;


class Data extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'form_data';
    public function dataPack()
    {
        return $this->belongsTo(DataPack::class);
    }
}
