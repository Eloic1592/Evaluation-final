<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class v_liste_devis extends Model
{
    protected $table = "v_liste_devis";
    // protected $fillable = ['id' , 'idevenement' , 'devis'  ,     'nom'      , 'description'  , 'date_debut' , 'date_fin'];
    protected $fillable = ['id','devis' ,'nom', 'description','date_debut', 'date_fin'];
    public $timestamps = false;

    public function modifier(){
        $url = url('V_liste_devis/show/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Modifier</a></button>";
        return $details;

    }
    public function supprimer(){
        if($this->attributes['etat'] == 0){
            $url = url('VListeDevis/destroy/' . $this->attributes['id']);
            return  "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Supprimer</a></button>";
        }
        $url = url('VListeDevis/canceldestroy/' . $this->attributes['id']);
        return "<button type='button' class='btn btn-danger'><a style='color:white;' href='" . $url . "'>Annuler la suppression</a></button>";
    }
    public function details(){
        $url = url('VListeDevis/details/'. $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Details</a></button>";
        return $details;

    }
    public function devis(){
        $url = url('VListeDevis/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Devis</a></button>";
        return $details;

    }
    public function genererpdf(){
        $url = url('VListeDevis/exportPdf/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>PDF</a></button>";
        return $details;

    }
    public function dupliquer(){
        $url = url('VListeDevis/versajoutdupli/' . $this->attributes['id'].'/');
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Dupliquer</a></button>";
        return $details;

    }

}
