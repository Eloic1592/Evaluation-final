<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artiste extends Model
{
    protected $table = "artiste";
    protected $fillable = ['id','artiste','tarif_heure','prixbase','etat','photo'];
    public $timestamps = false;

    public function modifier(){
        $url = url('Artiste/show/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Modifier</a></button>";
        return $details;

    }
    public function supprimer(){
        if($this->attributes['etat'] == 0){
            $url = url('Artiste/destroy/' . $this->attributes['id']);
            return  "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Supprimer</a></button>";
        }
        $url = url('Artiste/canceldestroy/' . $this->attributes['id']);
        return "<button type='button' class='btn btn-danger'><a style='color:white;' href='" . $url . "'>Annuler la suppression</a></button>";

    }
    public function details(){
        $url = url('Artiste/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Details</a></button>";
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
    public function getartisteAttribute(){
        $artiste =  $this->attributes['artiste'];
            $details = "<div style='color:red;'>".$artiste."</div>";
            return $details;

    }

}
