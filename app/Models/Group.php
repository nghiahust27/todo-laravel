<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    protected $fillable = ['name', 'created_by', 'group_code'];
    public function users(): BelongsToMany
{
    return $this->belongsToMany(
        User::class,
        'group_members',
        'group_id',
        'user_id'
    );
}
    public function creator() : BelongsTo {
        return $this->belongsTo(User::class,
        'created_by');
    }
    public function todos()
    {
        return $this ->hasMany(Todo::class);
    }
}
