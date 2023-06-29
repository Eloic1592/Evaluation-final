<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class v_liste_devislogistics extends Model
{
    protected $table = "v_liste_devislogistics";
    // protected $fillable = ['id' , 'iddevis' , 'idlogistique' , 'jour' ,'logistique' , 'tarif_jour','total'];
    protected $fillable = ['id' ,'jour' ,'logistique' , 'tarif','total','quantite'];
    public $timestamps = false;

    public function modifier(){
        $url = url('Devislogistique/show/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Modifier</a></button>";
        return $details;

    }
    public function supprimer(){
        if($this->attributes['etat'] == 0){
            $url = url('Devislogistique/destroy/' . $this->attributes['id']);
            return  "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Supprimer</a></button>";
        }
        $url = url('Devislogistique/canceldestroy/' . $this->attributes['id']);
        return "<button type='button' class='btn btn-danger'><a style='color:white;' href='" . $url . "'>Annuler la suppression</a></button>";
    }
    public function details(){
        $url = url('Devislogistique/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Details</a></button>";
        return $details;

    }
    public function devis(){
        $url = url('Devislogistique/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Devis</a></button>";
        return $details;

    }
    public function gettarifAttribute(){
        $prix =$this->attributes['tarif_jour'];
        $details = "".number_format($prix, 0, '.', ' ')." Ariary";
        return $details;

    }
    public function gettotalAttribute(){
        $jour=$this->attributes['jour'];
        $tarif=$this->attributes['tarif_jour'];
        $quantite=$this->attributes['quantite'];
        $totalprix =$tarif*$jour*$quantite;
        return $totalprix;

    }
}
