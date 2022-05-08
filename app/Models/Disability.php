<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disability extends Model
{
    use HasFactory;
    protected $table="disabilitys";
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
