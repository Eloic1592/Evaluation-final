<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class v_liste_devislieu extends Model
{
    protected $table = "v_liste_devislieu";
    // protected $fillable = ['id' , 'iddevis' , 'idlieu' ,  'prix'   ,'lieu'];
    protected $fillable = ['id','lieu','tarif','photo'];
    public $timestamps = false;

    public function modifier(){
        $url = url('Devislieu/show/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Modifier</a></button>";
        return $details;

    }
    public function supprimer(){
        if($this->attributes['etat'] == 0){
            $url = url('Devislieu/destroy/' . $this->attributes['id']);
            return  "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Supprimer</a></button>";
        }
        $url = url('Devislieu/canceldestroy/' . $this->attributes['id']);
        return "<button type='button' class='btn btn-danger'><a style='color:white;' href='" . $url . "'>Annuler la suppression</a></button>";
    }
    public function details(){
        $url = url('Devislieu/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Details</a></button>";
        return $details;

    }
    public function devis(){
        $url = url('Devislieu/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Devis</a></button>";
        return $details;

    }
    public function getphotoAttribute(){
        $photo =  $this->attributes['photo'];
        $details = "<img src='".$photo."'alt='' width='200' height='150'>";
        return $details;

    }

    public function gettarifAttribute(){
        $prix =$this->attributes['prix'];
        $details = "".number_format($prix, 0, '.', ' ')." Ariary";
        return $details;

    }
}
