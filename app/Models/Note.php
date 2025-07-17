<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'content'];

    /**
     * Get the content attribute.
     *
     * @var \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function content(): Attribute
    {
        return Attribute::make(
            get: fn($value) => decrypt($value),
            set: fn($value) => encrypt($value)
        );
    }

    /**
     * Get the user that owns the note.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
