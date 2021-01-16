<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    protected $fillable = ['punctuation', 'level', 'user_id'];
    protected $table = 'games';

    public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
