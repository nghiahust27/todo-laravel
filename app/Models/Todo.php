<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'title' ,
    'description','status','due_date'];
    protected $casts = ['due_date' => 'date' ];

    public function users():BelongsTo
    {
        return $this -> belongsTo(User::class);
    }
}
