<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class v_liste_devisdepense extends Model
{
    protected $table = "v_liste_devisdepense";
    // protected $fillable = ['id' , 'iddevis' , 'idautredepense' ,  'prix'   ,      'nom'      , 'prixbase'];
    protected $fillable = ['id' ,'tarif','nom'];
    public $timestamps = false;

    public function modifier(){
        $url = url('Devisdepenses/show/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Modifier</a></button>";
        return $details;

    }
    public function supprimer(){
        if($this->attributes['etat'] == 0){
            $url = url('Devisdepenses/destroy/' . $this->attributes['id']);
            return  "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Supprimer</a></button>";
        }
        $url = url('Devisdepenses/canceldestroy/' . $this->attributes['id']);
        return "<button type='button' class='btn btn-danger'><a style='color:white;' href='" . $url . "'>Annuler la suppression</a></button>";
    }
    public function details(){
        $url = url('Devisdepenses/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Details</a></button>";
        return $details;

    }
    public function devis(){
        $url = url('Devisdepenses/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Devis</a></button>";
        return $details;

    }
    public function gettarifAttribute(){
        $prix =$this->attributes['prix'];
        $details = "".number_format($prix, 0, '.', ' ')." Ariary";
        return $details;

    }
}
