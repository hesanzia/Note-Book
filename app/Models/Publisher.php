<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $table = "publishers";
    protected $fillable = [
        'id', 'name'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function books()
    {
        return $this->hasMany('App\Models\Book', 'publisher_id', 'id')->get();
    }
}
