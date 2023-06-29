<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class devislogistique extends Model
{

    protected $table = "devislogistique";
    protected $fillable = ['id' , 'iddevis' , 'idlogistique' , 'jour','quantite'];
    public $timestamps = false;

    public function modifier(){
        $url = url('Devislogistique/show/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Modifier</a></button>";
        return $details;

    }
    public function supprimer(){
        $url = url('Devislogistique/destroy/' . $this->attributes['id']);
        if($this->attributes['etat'] == 0){
            return  "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Supprimer</a></button>";
        }
        return "<button type='button' class='btn btn-danger'><a style='color:white;' href='" . $url . "'>Annuler la suppression</a></button>";

    }
    public function details(){
        $url = url('Devislogistique/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Details</a></button>";
        return $details;

    }

}
