<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promot_users extends Model
{
    use HasFactory;
    protected $table = 'promot_user';
    protected $fillable = ['user_id','isComplate', 'name', 'email', 'phone', 'password', 'channel_name','watch_time','promot_id','video_id','done_status','permission'];
}
