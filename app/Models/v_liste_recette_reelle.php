<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class v_liste_recette_reelle extends Model
{
    protected $table = "v_liste_recette_reelle";
    protected $fillable = ['id', 'idcategorie_place' , 'iddevis' , 'idlieu' ,  'prix'  , 'nombrevendu' , 'montant','total'];
    public $timestamps = false;

    public function modifier(){
        $url = url('VListeRecetteReelle/show/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Modifier</a></button>";
        return $details;

    }
    public function supprimer(){
        if($this->attributes['etat'] == 0){
            $url = url('VListeRecetteReelle/destroy/' . $this->attributes['id']);
            return  "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Supprimer</a></button>";
        }
        $url = url('VListeRecetteReelle/canceldestroy/' . $this->attributes['id']);
        return "<button type='button' class='btn btn-danger'><a style='color:white;' href='" . $url . "'>Annuler la suppression</a></button>";
    }
    public function details(){
        $url = url('VListeRecetteReelle/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Details</a></button>";
        return $details;

    }
    public function devis(){
        $url = url('Devis/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Devis</a></button>";
        return $details;

    }
    public function nouveaudevis(){
        $url = url('Devis/show/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>nouveau devis</a></button>";
        return $details;

    }
    public function gettotalAttribute()
    {
        $nombrevendu = $this->attributes['nombrevendu'];
        $prix = $this->attributes['prix'];
        $totalprix = $prix * $nombrevendu;
        return $totalprix;
    }
}
