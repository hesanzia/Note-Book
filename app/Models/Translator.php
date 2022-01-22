<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translator extends Model
{
    use HasFactory;

    protected $table = "translators";
    protected $fillable = [
        'id', 'name','profile'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function books()
    {
        return $this->hasMany('App\Models\Book', 'translator_id', 'id')->get();
    }
}
