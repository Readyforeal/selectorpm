<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selection extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

    public function locations() {
        return $this->belongsToMany(Location::class);
    }

    public function estimates() {
        return $this->belongsToMany(Estimate::class);
    }
}
