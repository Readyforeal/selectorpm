<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function locations() {
        return $this->hasMany(Location::class);
    }

    public function selections() {
        return $this->hasMany(Selection::class);
    }

    public function estimates() {
        return $this->hasMany(Estimate::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
