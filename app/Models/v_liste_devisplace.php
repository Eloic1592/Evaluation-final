<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class v_liste_devisplace extends Model
{
    protected $table = "v_liste_devisplace";
    // protected $fillable = ['id','iddevis','idplace','tarif','idlieu','lieu', 'categorie_place','nombreplace'];
    protected $fillable = ['id','iddevis','tarif','lieu','idcategorie_place','categorie_place','nombreplace','total'];
    public $timestamps = false;

    public function modifier(){
        $url = url('Devisplace/show/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Modifier</a></button>";
        return $details;

    }
    public function supprimer(){
        if($this->attributes['etat'] == 0){
            $url = url('Devisplace/destroy/' . $this->attributes['id']);
            return  "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Supprimer</a></button>";
        }
        $url = url('Devisplace/canceldestroy/' . $this->attributes['id']);
        return "<button type='button' class='btn btn-danger'><a style='color:white;' href='" . $url . "'>Annuler la suppression</a></button>";
    }
    public function details(){
        $url = url('Devisplace/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Details</a></button>";
        return $details;

    }
    public function devis(){
        $url = url('Devisplace/details/' . $this->attributes['id']);
        $details = "<button type='button' class='btn btn-primary'><a style='color:white;' href='" . $url . "'>Devis</a></button>";
        return $details;

    }
    public function gettarifAttribute(){
        $prix =$this->attributes['prix'];
        $details = "".number_format($prix, 0, '.', ' ')." Ariary";
        return $details;

    }
    public function gettotalAttribute(){
        $jour=$this->attributes['nombreplace'];
        $tarif=$this->attributes['prix'];
        $totalprix =$tarif*$jour;
        return $totalprix;

    }

    public function total(){
        $jour=$this->attributes['nombreplace'];
        $tarif=$this->attributes['prix'];
        $totalprix =$tarif*$jour;
        return $totalprix;
    }


    public function recette($iddevis){

        $v_liste_devislieu=v_liste_devislieu::where('iddevis',$iddevis)->first();
        $recette=0;
        if ($v_liste_devislieu) {
            $recette =v_liste_devisplace::selectRaw('coalesce(sum(prix*nombreplace),0) as recette')
                ->where('iddevis', $v_liste_devislieu->iddevis)
                ->where('idlieu', $v_liste_devislieu->idlieu)
                ->first();
                return $recette->recette;
        } else {
            return 0;
        }

    }
}
