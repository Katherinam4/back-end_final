<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'author_id');
    }

    protected $fillable = [
        'name',
        'picture',
        'description',
        'author_id',
        'is_published'
    ];

}