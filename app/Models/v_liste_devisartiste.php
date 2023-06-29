<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class v_liste_devisartiste extends Model
{
    protected $table = "v_liste_devisartiste";
    // protected $fillable = ['id' , 'iddevis' , 'idartiste' , 'heureartiste' , 'artiste' , 'tarif_heure','total'];
    protected $fillable = ['id','heureartiste','artiste', 'tarif','total','photo'];
    public $timestamps = false;

    public function modifier(){
        $url = url('Devisartistes/show/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Modifier</a></button>";
        return $details;

    }
    public function supprimer(){
        if($this->attributes['etat'] == 0){
            $url = url('Devisartistes/destroy/' . $this->attributes['id']);
            return  "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Supprimer</a></button>";
        }
        $url = url('Devisartistes/canceldestroy/' . $this->attributes['id']);
        return "<button type='button' class='btn btn-danger'><a style='color:white;' href='" . $url . "'>Annuler la suppression</a></button>";
    }
    public function details(){
        $url = url('Devisartistes/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Details</a></button>";
        return $details;

    }
    public function devis(){
        $url = url('Devisartistes/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Devis</a></button>";
        return $details;

    }
    public function getphotoAttribute(){
        $photo =  $this->attributes['photo'];
        $details = "<img src='".$photo."'alt='' width='100' height='50'>";
        return $details;

    }
    public function gettarifAttribute(){
        $prix =$this->attributes['tarif_heure'];
        $details = "".number_format($prix, 0, '.', ' ')." Ariary";
        return $details;

    }
    public function gettotalAttribute()
    {
        $heure = $this->attributes['heureartiste'];
        $tarif = $this->attributes['tarif_heure'];
        $totalprix = $tarif * $heure;
        return $totalprix;
    }

}
