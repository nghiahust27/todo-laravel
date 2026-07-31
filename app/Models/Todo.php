<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Group;

class Todo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'title' ,
    'description','status','due_date', 'group_id'];
    protected $casts = ['due_date' => 'date' ];

    public function user():BelongsTo
    {
        return $this -> belongsTo(User::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
