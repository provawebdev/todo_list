<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo_list extends Model
{
    use HasFactory;
    
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
