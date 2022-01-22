<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = "books";
    protected $fillable = [
        'id', 'name', 'writer_id', 'translator_id', 'publisher_id','volume','language','picture','link'
    ];
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function writer()
    {
        return $this->belongsTo('App\Models\Writer','writer_id', 'id')->first();
    }

    public function translator()
    {
        return $this->belongsTo('App\Models\Translator','translator_id', 'id')->first();
    }

    public function publisher()
    {
        return $this->belongsTo('App\Models\Publisher','publisher_id', 'id')->first();
    }
}
