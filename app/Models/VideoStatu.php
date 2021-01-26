<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoStatu extends Model
{
    use HasFactory;
    protected $table = 'video_status';
    // protected $fillable = ['user_id','video_id','isComplate']
    // protected $visible = array('user_id','isComplate','video_id');
}
