<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Tambahkan ini
use App\Models\Movie; // Tambahkan ini juga

class Category extends Model
{
    public function movie(): HasMany
    {
        return $this->hasMany(Movie::class);
    }
}
