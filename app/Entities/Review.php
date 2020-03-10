<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $fillable = [
       'reviewer_id',
       'reviewed_id',
       'question_id',
       'value',
       'message'
    ];

    protected $dates = [
      'created_at',
      'updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reviewed()
    {
        return $this->belongsTo(User::class, 'reviewed_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
}
