<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    protected $table = 'questions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'choice'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
