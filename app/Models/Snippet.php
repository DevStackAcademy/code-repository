<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['title', 'code'];

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Snippet::class, 'parent_id');
    }

    public function forks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Snippet::class, 'parent_id');
    }

    public static function createFork(Snippet $snippet): Snippet
    {
        $fork = $snippet->replicate();
        $fork->parent_id = $snippet->id;
        $fork->save();

        return $fork;
    }
}
