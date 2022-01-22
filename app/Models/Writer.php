<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    use HasFactory;

    protected $table = "writers";
    protected $fillable = [
        'id', 'name','nationality','description','profile',
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function books()
    {
        return $this->hasMany('App\Models\Book', 'writer_id', 'id')->get();
    }
}
