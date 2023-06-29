<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employe extends Model
{
    protected $table = "employe";
    protected $fillable = ['id','nom','prenom','dtn','adresse','email','mdp'];
    public $timestamps = false;
}
