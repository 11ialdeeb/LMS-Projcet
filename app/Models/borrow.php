<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class borrow extends Model
{

    public function users(): BelongsTo
    {
        return $this->belongsTo(users::class, 'user_id');
    }

    public function books(): BelongsTo
    {
        return $this->belongsTo(books::class, 'book_id');
    }
}
