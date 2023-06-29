<?php

namespace App\Http\Controllers;

use App\Models\v_liste_devis;
use App\Models\html;
use App\Models\lieu;
use App\Models\artiste;
use App\Models\FormatDate;
use App\Models\evenement;
use App\Models\devis;
use App\Models\v_liste_devissono;
use App\Models\v_liste_devisartiste;
use App\Models\v_liste_devislogistics;
use App\Models\v_liste_devisdepense;
use App\Models\v_liste_devislieu;
use App\Models\v_liste_devisplace;
use App\Models\v_liste_evenement;
use App\Models\v_liste_place;
use App\Models\logistique;
use App\Models\autredepense;
use App\Models\sonorisation;
use App\Models\v_liste_recette_reelle;
use App\Models\devisartistes;
use App\Models\devissonorisation;
use App\Models\devislogistique;
use App\Models\devislieu;
use App\Models\devisplace;
use App\Models\devisdepenses;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Carbon\Carbon;

class VListeDevisController extends Controller
{

    public function details($iddevis)
    {
        $conditions=[
            'iddevis' => $iddevis,
        ];

        $recette=v_liste_devisplace::recette($iddevis);
        $v_liste_devis=v_liste_devis::where('id',$iddevis)->first();
        $v_liste_devisartiste=html::findwhere(new v_liste_devisartiste,$conditions,['modifier']);
        $v_liste_devissono=html::findwhere(new v_liste_devissono,$conditions,['modifier']);
        $v_liste_devislogistics=html::findwhere(new v_liste_devislogistics,$conditions,['modifier']);
        $v_liste_devisdepense=html::findwhere(new v_liste_devisdepense,$conditions,['modifier']);
        $v_liste_devislieu=html::findwhere(new v_liste_devislieu,$conditions,['modifier']);
        $v_liste_devisplace=html::findwhere(new v_liste_devisplace,$conditions,['modifier']);

        // Somme de chaque devis liste
        $sommeartiste=v_liste_devisartiste::where('iddevis',$iddevis)->get()->sum('total');
        $sommesono=v_liste_devissono::where('iddevis',$iddevis)->get()->sum('total');
        $sommelog=v_liste_devislogistics::where('iddevis',$iddevis)->get()->sum('total');
        $sommedep=v_liste_devisdepense::where('iddevis',$iddevis)->get()->sum('prix');
        $sommelieu=v_liste_devislieu::where('iddevis',$iddevis)->get()->sum('prix');
        $sommeplace=v_liste_devisplace::where('iddevis',$iddevis)->get()->sum('total');
        $recettereelle=v_liste_recette_reelle::where('iddevis',$iddevis)->get()->sum('total');
        $formatnumber=number_format($sommeartiste, 0, '.', ' ');
        $formatnumber2=number_format($sommesono, 0, '.', ' ');
        $formatnumber3=number_format($sommelog, 0, '.', ' ');
        $formatnumber4=number_format($sommedep, 0, '.', ' ');
        $formatnumber5=number_format($sommelieu, 0, '.', ' ');
        $formatnumber7=number_format($sommeplace, 0, '.', ' ');

        // Totalite depense
        $depense=$sommeartiste+$sommesono+$sommelog+$sommedep+$sommelieu;

        $formatnumber6=number_format( $depense, 0, '.', ' ');
        $benefice=$recettereelle-$depense;
        $beneficepro=$recette-$depense;
        // dump($benefice);
        // dump($recette);
        // dump($depense);

        return view('employe.details-devis',[
            'iddevis'=>$v_liste_devis->id,
            'v_liste_devisartiste'=>$v_liste_devisartiste,
            'v_liste_devissono'=>$v_liste_devissono,
            'v_liste_devislogistics'=>$v_liste_devislogistics,
            'v_liste_devisdepense'=>$v_liste_devisdepense,
            'v_liste_devislieu'=>$v_liste_devislieu,
            'v_liste_devisplace'=>$v_liste_devisplace,
            'sommeartiste'=>$formatnumber,
            'sommesono'=>$formatnumber2,
            'sommelog'=>$formatnumber3,
            'sommedep'=>$formatnumber4,
            'sommelieu'=>$formatnumber5,
            'sommeplace'=>$formatnumber7,
            'depense'=>$formatnumber6,
            'recette'=>number_format($recette,0, '.', ' '),
            'benefice'=>number_format($benefice, 0, '.', ' '),
            'recettereelle'=>number_format($recettereelle, 0, '.', ' '),
            'beneficepro'=>number_format($beneficepro, 0, '.', ' '),
        ]);

    }

    public function insererdetails($iddevis)
    {
        return view('employe.insererdevis',[
            'iddevis'=>$iddevis,
            'lieu'=>lieu::all(),
            'artiste'=>artiste::all(),
            'sonorisation'=>sonorisation::all(),
            'logistique'=>logistique::all(),
            'autredepense'=>autredepense::all(),
            'v_liste_place'=>v_liste_place::all(),
        ]);

    }

    public function exportPdf($iddevis)
    {
        $conditions=[
            'iddevis' => $iddevis,
        ];
        $v_liste_devis=v_liste_devis::where('id',$iddevis)->first();
        $v_liste_devisartiste=v_liste_devisartiste::where('iddevis',$iddevis)->get();
        $v_liste_devissono=v_liste_devissono::where('iddevis',$iddevis)->get();
        $v_liste_devislogistics=v_liste_devislogistics::where('iddevis',$iddevis)->get();
        $v_liste_devisdepense=v_liste_devisdepense::where('iddevis',$iddevis)->get();
        $v_liste_devislieu=v_liste_devislieu::where('iddevis',$iddevis)->first();
        $v_liste_devisplace=v_liste_devisplace::where('iddevis',$iddevis)->get();

        $date=date("Y-m-d",strtotime($v_liste_devis->date_debut));
        $heure=date("H",strtotime($v_liste_devis->date_debut));
        $html = '<style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        h3 {
            font-size: 16px;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            text-align: left;
        }
        .center {
            text-align: center;
        }
    </style>';

$html .= '<div class="center">';
$html .= '<h1>'.$v_liste_devis->nom.'</h1>';
$html .= '<h2>Le '.FormatDate::format($date).' à '.$heure.'h</h2>';
$html .= '<h3>Lieu: '.$v_liste_devislieu->lieu.'</h3>';
$html .= $v_liste_devislieu->photo;
$html .= '<br><br>';
$html .= '<h3>Artistes en guest</h3>';
$html .= '<table>';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th scope="col">Nom artiste</th>';
$html .= '<th scope="col">Photo</th>';
$html .= '</tr>';
$html .= '</thead>';
foreach ($v_liste_devisartiste as $v_liste_devisartiste) {
$html .= '<tr>';
$html .= '<td>'.$v_liste_devisartiste->artiste.'</td>';
$html .= '<td>'.$v_liste_devisartiste->photo.'</td>';
$html .= '</tr>';
}
$html .= '</table>';
$html .= '<br><br>';
$html .= '<h3>Prix des billets</h3>';
$html .= '<table>';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th scope="col">Catégorie de place</th>';
$html .= '<th scope="col">Prix</th>';
$html .= '<th scope="col">Nombre de places</th>';
$html .= '</tr>';
$html .= '</thead>';
foreach ($v_liste_devisplace as $v_liste_devisplace) {
$html .= '<tr>';
$html .= '<td>'.$v_liste_devisplace->categorie_place.'</td>';
$html .= '<td>'.$v_liste_devisplace->prix.'</td>';
$html .= '<td>'.$v_liste_devisplace->nombreplace.'</td>';
$html .= '</tr>';
}
$html .= '</table>';
$html .= '</div>';

// Générer le fichier PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream('spectacle.pdf');

return redirect()->back()->with('success', 'L\'export est reussie');
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function versajoutdupli($iddevis)
    {
        $v_liste_devis=v_liste_devis::where('id',$iddevis)->first();
        $v_liste_evenement=v_liste_evenement::where('id',$v_liste_devis->idevenement)->first();
        return view('employe.duplication',[
            'v_liste_evenement'=>$v_liste_evenement,
            'iddevis'=>$v_liste_devis->id,
        ]);


    }
    public function dupliquer(Request $request)
    {
        $evenement=evenement::create($request->all());

        $devis=devis::create([
            'devis'=>'devis1',
            'date_debut'=>'2023-06-06',
            'date_fin'=>'2023-06-06',
            'idevenement'=>$evenement->id,
        ]);


        $v_liste_devisartiste=v_liste_devisartiste::where('iddevis',$request->input('iddevis'))->get();
        foreach($v_liste_devisartiste as $v_liste_devisartiste){
            devisartistes::create(['iddevis' => $devis->id,
            'idartiste' => $v_liste_devisartiste->idartiste,
            'heureartiste' => $v_liste_devisartiste->heureartiste,
            ]);
        }
        $v_liste_devissono=v_liste_devissono::where('iddevis',$request->input('iddevis'))->get();
        foreach($v_liste_devissono as $v_liste_devissono){
            devissonorisation::create(['iddevis' => $devis->id,
            'idsonorisation' => $v_liste_devissono->idsonorisation,
            'heuresonorisation'=> $v_liste_devissono->heuresonorisation,
            'quantite' => $v_liste_devissono->quantite
            ]);
        }

        $v_liste_devislogistics=v_liste_devislogistics::where('iddevis',$request->input('iddevis'))->get();
        foreach($v_liste_devislogistics as $v_liste_devislogistics){
            devislogistique::create(['iddevis' => $v_liste_devislogistics->id,
            'iddevis' => $devis->id,
            'idlogistique'=>$v_liste_devislogistics->idlogistique,
            'jour' => $v_liste_devislogistics->jour,
            'quantite' => $v_liste_devislogistics->quantite
            ]);
        }
        $v_liste_devisdepense=v_liste_devisdepense::where('iddevis',$request->input('iddevis'))->get();
        foreach($v_liste_devisdepense as $v_liste_devisdepense){
            devisdepenses::create(['iddevis' => $devis->id,
            'iddevis' => $devis->id,
            'idautredepense' => $v_liste_devisdepense->idautredepense,
            'prix'=>$v_liste_devisdepense->prix,
            ]);
        }
        $v_liste_devislieu=v_liste_devislieu::where('iddevis',$request->input('iddevis'))->first();
            devislieu::create(['iddevis' => $devis->id,
            'iddevis' => $devis->id,
            'idlieu' => $v_liste_devislieu->idlieu,
            'prix'=>$v_liste_devislieu->prix,
            ]);

        $v_liste_devisplace=v_liste_devisplace::where('iddevis',$request->input('iddevis'))->get();
        foreach($v_liste_devisplace as $v_liste_devisplace){
            devisplace::create(['iddevis' => $devis->id,
            'idplace' => $v_liste_devisplace->idplace,
            'prix' => $v_liste_devisplace->prix,
            ]);
        }


        return redirect()->back()->with('success', 'Information enregistree');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requestt  $requestt
     * @return \Illuminate\Http\Response
     */
    public function store(Requestt $requestt)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\v_liste_devis  $v_liste_devis
     * @return \Illuminate\Http\Response
     */
    public function show(v_liste_devis $v_liste_devis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\v_liste_devis  $v_liste_devis
     * @return \Illuminate\Http\Response
     */
    public function edit(v_liste_devis $v_liste_devis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requestt  $requestt
     * @param  \App\Models\v_liste_devis  $v_liste_devis
     * @return \Illuminate\Http\Response
     */
    public function update(Requestt $requestt, v_liste_devis $v_liste_devis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\v_liste_devis  $v_liste_devis
     * @return \Illuminate\Http\Response
     */
    public function destroy(v_liste_devis $v_liste_devis)
    {
        //
    }
}
