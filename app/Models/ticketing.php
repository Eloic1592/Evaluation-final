<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticketing extends Model
{
    protected $table = "ticketing";
    protected $fillable = ['id','idevenement','date_debut','date_fin','quantite','etat','prixunitaire'];
    public $timestamps = false;

    public function modifier(){
        $url = url('/Ticketing/edit/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Modifier</a></button>";
        return $details;

    }
    public function supprimer(){
        $url = url('Ticketing/destroy/' . $this->attributes['id']);
        if($this->attributes['etat'] == 0){
            return  "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Supprimer</a></button>";
        }
        return "<button type='button' class='btn btn-danger'><a style='color:white;' href='" . $url . "'>Annuler la suppression</a></button>";

    }
    public function details(){
        $url = url('Ticketing/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Details</a></button>";
        return $details;

    }
}
