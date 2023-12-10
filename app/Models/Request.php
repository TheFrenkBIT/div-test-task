<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = ['name', 'email', 'message', 'status', 'comment'];
    use HasFactory;
}
