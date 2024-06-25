<?php

namespace App\Domain\News\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novelty extends Model
{
    use HasFactory;

    protected $perPage = 20;
}
