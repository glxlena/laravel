<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'priority', 'is_completed'];
    protected $casts = [
        'is_completed' => 'boolean'];
}
