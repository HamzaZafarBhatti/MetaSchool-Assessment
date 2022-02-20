<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'user_id',
        'description',
        'deadline',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
