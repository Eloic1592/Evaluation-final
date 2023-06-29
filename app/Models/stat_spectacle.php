<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\taxe;

class stat_spectacle extends Model
{
    protected $table = "stat_spectacle";
    protected $fillable = ['iddevis' ,'nom','date_debut','date_fin', 'recette'  , 'total_depense','beneficebrute','taxe','beneficenet'];
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
    public function getbeneficebruteAttribute(){
        $recette = $this->attributes['recette'];
        $depense = $this->attributes['total_depense'];
        $benefice = $recette - $depense;
        return $benefice;

    }
    public function gettaxeAttribute(){

        $taxe=taxe::all()->first();
        return $taxe->pourcentage;

    }

    public function getbeneficenetAttribute(){

        $taxe=$this->gettaxeAttribute();
        $benefice=$this->getbeneficebruteAttribute();
        $get_montant_taxe=($benefice*$taxe)/100;
        $beneficenet=$benefice-$get_montant_taxe;
        return number_format($beneficenet,2,'.','');

    }

    public function gettotalAttribute()
    {
        $heure = $this->attributes['heureartiste'];
        $tarif = $this->attributes['tarif_heure'];
        $totalprix = $tarif * $heure;
        return $totalprix;
    }

}
