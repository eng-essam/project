<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class operations extends Pivot
{
    use HasFactory;

    /**
     * @var string
    */

    protected $table = 'user_user';
    
}
