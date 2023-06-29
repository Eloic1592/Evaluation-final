<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table = "admin";
    protected $fillable = ['id','nom','prenom','email','mdp'];
    public $timestamps = false;
}
