<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'thumbnail', 'description', 'parent_id'];
    /**
     * Membuat Query Scope - Eloquent
     * Scope Only Parent
     */
    public function scopeOnlyParent($query)
    {
        /** kita akan mereturn dimana null itu sebagai parent_id */
        return $query->whereNull('parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function derivative()
    {
        return $this->children()->with('derivative');
    }
}
