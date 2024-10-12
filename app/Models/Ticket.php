<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'price', 'quantity', 'available', 'event_id'];
    // protected $guarded = [];
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
