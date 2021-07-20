<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;

    protected $casts = ['itens' => 'array'];
    protected $dates = ['date'];
    protected $guarded = [];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
    public function eventsAsParticipant(){
        return $this->belongsToMany('App\Models\Event');
    }
}
