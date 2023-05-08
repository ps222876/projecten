<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ["name", "subs", "views", "created_on"];

    protected $table = 'channels';
}
