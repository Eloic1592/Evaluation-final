<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use League\Csv\Writer;
use League\Csv\Reader;
use App\Models\Produit;



class CSVController extends Controller
{


    public function export()
    {
    // Exécutez votre requête SELECT pour récupérer les données souhaitées
    $produits = Produit::all();

    // Créez une instance de Writer pour le fichier CSV
    $csv = Writer::createFromString('');

    // Ajoutez les en-têtes au fichier CSV
    $headers = ['id', 'nomproduit', 'details'];
    $csv->insertOne($headers);

    // Parcourez les résultats de la requête et ajoutez-les au fichier CSV
    foreach ($produits as $produit) {
      $rowData = [
          $produit->id,
          $produit->nomproduit,
          $produit->detail,
      ];
      $csv->insertOne($rowData);
    }

    // Enregistrez le fichier CSV dans le répertoire de stockage de votre application
    $filename = 'produit.csv';
    Storage::disk('local')->put($filename, $csv->getContent());

    // Générez une réponse de téléchargement pour le fichier CSV
     $headers = [
      'Content-Type' => 'text/csv',
      'Content-Disposition' => 'attachment; filename="' . $filename . '"',
    ];

    // Retournez la réponse de téléchargement
    response()->download(storage_path('app/' . $filename), $filename, $headers);

    return redirect()->back()->with('success', 'Le fichier CSV a été importé avec succès.');
}


    // Necessite un formulaire important un csv
    public function import(Request $request)
    {
        $file = $request->file('csv');
        $filePath = $file->store('import');

        $csv = Reader::createFromPath(storage_path('app/'.$filePath), 'r');
        $csv->setHeaderOffset(0);

        // foreach ($csv as $row) {
        //     produit::create($row);
        // }

        return redirect()->back()->with('success', 'Le fichier CSV a été importé avec succès.');
    }
}
