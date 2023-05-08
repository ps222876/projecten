<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

     
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = ['id'];

    public $timestamps = false;


    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }


    public function band()
    {
        return $this->belongsTo(Band::class);
    }
}
