<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Entry extends Model
{
    use HasFactory;

    public function user() {
        //return $this->belongsTo('App\Models\User');
        return $this->belongsTo(User::class);
    }    

    //mutator
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str::slug($value);
    }

/*     public function getRouteKeyName()
    {
        return 'slug';
    } */
}
