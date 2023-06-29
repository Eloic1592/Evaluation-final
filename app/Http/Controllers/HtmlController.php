
<?php

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Request;

class HmtlController extends Controller
{
public function generateModelTable($model)
{

    // Récupérer tous les enregistrements du modèle paginés
    $perPage = 10; // Nombre d'enregistrements par page
    $page = Request::get('page', 1); // Numéro de la page à afficher
    $records = $model::paginate($perPage, ['*'], 'page', $page);

    // Vérifier s'il y a des enregistrements
    if ($records->isEmpty()) {
        return '<p>Aucun enregistrement trouvé.</p>';
    }

    // Générer le tableau HTML
    $html = '<table>';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>ID</th>';

    // Ajouter les en-têtes de colonnes supplémentaires en fonction des attributs du modèle
    foreach ($model->getFillable() as $attribute) {
        $html .= '<th>' . $attribute . '</th>';
    }

    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody>';

    // Ajouter les lignes du tableau avec les données des enregistrements
    foreach ($records as $record) {
        $html .= '<tr>';
        $html .= '<td>' . $record->id . '</td>';

        // Ajouter les cellules de données pour les attributs du modèle
        foreach ($model->getFillable() as $attribute) {
            $html .= '<td>' . $record->$attribute . '</td>';
        }
        $html .= '</tr>';
    }

    $html .= '</tbody>';
    $html .= '<tfoot>';
    $html .= '<tr>';
    $html .= '<td colspan="' . (count($model->getFillable()) + 1) . '">';
    $html .= $records->links();
    $html .= '</td>';
    $html .= '</tr>';
    $html .= '</tfoot>';

    $html .= '</table>';

    return $html;
}

}
