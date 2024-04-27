<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_device extends Model
{
    use HasFactory;
    // protected $table = 'tb_device';
    protected $guarded = ['id'];
    public $timestamps = false;
}
