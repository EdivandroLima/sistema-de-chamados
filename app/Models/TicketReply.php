<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    use HasFactory;

    protected $table = 'ticket_replies';

    protected $fillable = [
        'message',
        'ticket_id',
        'user_id',
        'is_read',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
