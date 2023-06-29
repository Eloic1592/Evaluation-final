<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lieu extends Model
{
    protected $table = "lieu";
    protected $fillable = ['id','idtype_lieu','lieu','capacite','prixbase','etat','photo'];
    public $timestamps = false;

    public function modifier(){
        $url = url('Lieu/show/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Modifier</a></button>";
        return $details;

    }
    public function supprimer(){
        if($this->attributes['etat'] == 0){
            $url = url('Lieu/destroy/' . $this->attributes['id']);
            return  "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Supprimer</a></button>";
        }
        $url = url('Lieu/canceldestroy/' . $this->attributes['id']);
        return "<button type='button' class='btn btn-danger'><a style='color:white;' href='" . $url . "'>Annuler la suppression</a></button>";

    }
    public function details(){
        $url = url('Lieu/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Details</a></button>";
        return $details;

    }
    public function ajoutplace(){
        $url = url('Lieu/versajoutplace/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Ajouter place</a></button>";
        return $details;

    }
    public function getphotoAttribute(){
        $photo =  $this->attributes['photo'];
        if($photo){
        $details = "<img src='".$photo."'alt='' width='200' height='150'>";
        }else{
        $details = "aucun photo";
        }
        return $details;

    }

}
