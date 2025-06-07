<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(Request::class, 'user_id');
    }

    public function artisan() {
        return $this->belongsTo(Request::class, 'artisan_id');
    }
}
