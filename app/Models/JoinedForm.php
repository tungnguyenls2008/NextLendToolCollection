<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JoinedForm extends Model
{
    use HasFactory;
    protected $fillable=['json_form_info','json_data','form_title','creator','version','created_at'];

}