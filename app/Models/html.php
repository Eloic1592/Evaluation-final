<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Request;

class html extends Model
{


    // Fonction de listage generalisee
    public function list($model,$tabfunction=null,$page=10)
    {
        // Récupérer les enregistrements paginés du modèle
        $records =$model->simplePaginate($page);


        // Vérifier s'il y a des enregistrements
        if ($records->isEmpty()) {
        return '<p>Aucun enregistrement trouvé.</p>';
        }

        // Générer le tableau HTML
        $html = '<div class="col-12">';
        $html .= '<div class="card recent-sales overflow-auto">';
        $html .= '<div class="card-body">';
        $html .= '<h5 class="card-title">Liste</h5>';
        $html .= '<table class="table datatable">';
        $html .= '<thead>';
        $html .= '<tr>';

        // Ajouter les en-têtes de colonnes supplémentaires en fonction des attributs du modèle
        foreach ($model->getFillable() as $attribute) {
            $html .= '<th scope="col">' . $attribute . '</th>';
        }

        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';

        // Ajouter les lignes du tableau avec les données des enregistrements
        foreach ($records as $record) {
            $html .= '<tr>';
            foreach ($model->getFillable() as $attribute) {
                $html .= '<td>' . $record->$attribute . '</td>';
            }
            if ($tabfunction) {
                foreach ($tabfunction as $function) {
                    if (method_exists($record, $function)) {
                        $html .= '<td>';
                        $html .= call_user_func([$record, $function]);
                        $html .= '</td>';
                    }
                }
            }

            $html .= '</tr>';
        }

        $html .= '</tbody>';
        $html .= '</table>';
        // $html .= '</div>';
        $html .= '</div>';
        $html .= $records->links();
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }

    // Find by id generalisee
    public function findbyid($model, $id)
    {
        // Récupérer l'élément par son ID
        $item = $model->find($id);

        // Générer le tableau HTML
        $html = '<div class="col-lg-12">';
        $html .= '<div class="col-md-12">';
        $html .= '<div class="card">';
        $html .= '<div class="card-body">';
        $html .= '<h5 class="card-title">Liste</h5>';

        $html .= '<table class="table">';
        $html .= '<thead>';
        $html .= '<tr>';

        // Ajouter les en-têtes de colonnes supplémentaires en fonction des attributs du modèle
        foreach ($model->getFillable() as $attribute) {
            $html .= '<th scope="col">' . $attribute . '</th>';
        }

        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';

        $html .= '<tr>';
        foreach ($model->getFillable() as $attribute) {
            $html .= '<td>'. $item->$attribute . '</td>';
        }
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';


        return $html;
    }

    // Find where generalisee
    public function findwhere($model, $conditions,$tabfunction=null,$page = 10)
    {


        // Récupérer les enregistrements filtrés du modèle
        $query = $model;
        foreach ($conditions as $column => $condition) {
            if (is_array($condition)) {
                $operator = $condition['operator'];
                $value = $condition['value'];
                $query = $query->where($column, $operator, $value);
            } else {
                $query = $query->where($column, $condition);
            }
        }
        $filteredRecords = $query->simplePaginate($page);

        // Vérifier s'il y a des enregistrements filtrés
        if ($filteredRecords->isEmpty()) {
            return '<p>Aucun enregistrement trouvé.</p>';
        }

        // Générer le tableau HTML
        // Générer le tableau HTML

        $html = '<div class="col-12">';
        $html .= ' <div class="card recent-sales overflow-auto">';
        $html .= '<div class="card-body">';
        $html .= '<h5 class="card-title">Recent Sales <span>| Today</span></h5>';

        $html .= '<table class="table table-borderless datatable">';
        $html .= '<thead>';
        $html .= '<tr>';

        // Ajouter les en-têtes de colonnes supplémentaires en fonction des attributs du modèle
        foreach ($model->getFillable() as $attribute) {
            $html .= '<th>' . $attribute . '</th>';
        }

        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';

        // Ajouter les lignes du tableau avec les données des enregistrements filtrés
        foreach ($filteredRecords as $record) {
            $html .= '<tr>';

            // Ajouter les cellules de données pour les attributs du modèle
            foreach ($model->getFillable() as $attribute) {
                $html .= '<td>' . $record->$attribute . '</td>';
            }
            if ($tabfunction) {
                foreach ($tabfunction as $function) {
                    if (method_exists($record, $function)) {
                        $html .= '<td>';
                        $html .= call_user_func([$record, $function]);
                        $html .= '</td>';
                    }
                }
            }
            $html .= '</tr>';
        }
        $html .= '</tr>';
        $html .= '</tbody>';
        $html .= '</table>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= $filteredRecords->links();
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }


}
