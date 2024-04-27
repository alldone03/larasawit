<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class tb_devicelinktouser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
    public function device()
    {
        return $this->belongsTo(tb_device::class, 'id');
    }
}
