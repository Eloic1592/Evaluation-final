<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class v_liste_devissono extends Model
{
    protected $table = "v_liste_devissono";
    // protected $fillable = ['id' , 'iddevis' , 'idsonorisation' , 'heuresonorisation' ,'sonorisation' , 'tarif_heure','total'];
    protected $fillable = ['id','heuresonorisation' ,'sonorisation' ,'tarif','total','quantite'];
    public $timestamps = false;

    public function modifier(){
        $url = url('Devissonorisation/show/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Modifier</a></button>";
        return $details;

    }
    public function supprimer(){
        if($this->attributes['etat'] == 0){
            $url = url('Devissonorisation/destroy/' . $this->attributes['id']);
            return  "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Supprimer</a></button>";
        }
        $url = url('Devissonorisation/canceldestroy/' . $this->attributes['id']);
        return "<button type='button' class='btn btn-danger'><a style='color:white;' href='" . $url . "'>Annuler la suppression</a></button>";
    }
    public function details(){
        $url = url('Devissonorisation/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Details</a></button>";
        return $details;

    }
    public function devis(){
        $url = url('Devissonorisation/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Devis</a></button>";
        return $details;

    }
    public function gettarifAttribute(){
        $prix =$this->attributes['tarif_heure'];
        $details = "".number_format($prix, 0, '.', ' ')." Ariary";
        return $details;

    }
    public function gettotalAttribute(){
        $heure=$this->attributes['heuresonorisation'];
        $tarif=$this->attributes['tarif_heure'];
        $quantite=$this->attributes['quantite'];
        $totalprix =$tarif*$heure*$quantite;
        return $totalprix;

    }
}
