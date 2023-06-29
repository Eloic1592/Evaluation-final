<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class devislieu extends Model
{
    protected $table = "devislieu";
    protected $fillable = ['id' , 'iddevis' , 'idlieu' , 'prix'];
    public $timestamps = false;

    public function modifier(){
        $url = url('Devislieu/show/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Modifier</a></button>";
        return $details;

    }
    public function supprimer(){
        $url = url('Devislieu/destroy/' . $this->attributes['id']);
        if($this->attributes['etat'] == 0){
            return  "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Supprimer</a></button>";
        }
        return "<button type='button' class='btn btn-danger'><a style='color:white;' href='" . $url . "'>Annuler la suppression</a></button>";

    }
    public function details(){
        $url = url('Devislieu/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Details</a></button>";
        return $details;

    }

}
