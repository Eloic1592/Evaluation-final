<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use App\Models\v_bilan;
use App\Models\v_bilan_par_annee;
use App\Models\commission;

class PDFController extends Controller
{
    public function exportPdf($annee)
    {

        $data=v_bilan::where('annee',$annee)->get();
        $sommedetout=v_bilan::selectRaw('sum(quantite) as total_quantite,
        sum(somme_vente) as total_vente,
        sum(somme_achat) as somme_achat,
        sum(benefice_brute) as benefice_brute,
        sum(perte) as perte,
        sum(benefice) as benefice')->first();

           $html= '';
           $html.= '<h3>Total par mois par point de vente</h3>';
           $html.= '<table class="table" border="2">';
           $html.= '<thead>'  ;
             $html.= '<tr>';
               $html.='<th scope="col">annee</th>';
               $html.= '<th scope="col">nom</th>';
               $html.= '<th scope="col">quantite</th>';
               $html.= '<th scope="col">somme_vente</th>';
               $html.= '<th scope="col">somme_achat</th>';
               $html.=' <th scope="col">benefice_brute</th>';
               $html.=' <th scope="col">perte</th>';
               $html.=' <th scope="col">benefice</th>';
               $html.=' <th scope="col">commission</th>';
               $html.=' <th scope="col">benef avec comm</th>';
             $html.= '</tr>';
           foreach ($data as $listegeneral) {
               $html .= '<tr>';
               $html .= '<td>' . $listegeneral->annee. '</td>';
               $html .= '<td>' . $listegeneral->nom . '</td>';
               $html .= '<td>' . $listegeneral->quantite . '</td>';
               $html .= '<td>' . $listegeneral->somme_vente . '</td>';
               $html .= '<td>' . $listegeneral->somme_achat. '</td>';
               $html .= '<td>' . $listegeneral->benefice_brute. '</td>';
               $html .= '<td>' . $listegeneral->perte. '</td>';
               $html .= '<td>' . $listegeneral->benefice. '</td>';
               $html .= '<td>' . $listegeneral->commission. '</td>';
               $html .= '<td>' . $listegeneral->benefsanscommission. '</td>';
               $html .= '</tr>';
           }
           $html .= '<tr>';
           $html .= '<th scope="col">Total</th>';
           $html .= '<td></td>';
           $html .= '<td>' . $sommedetout->total_quantite. '</td>';
           $html .= '<td>' . $sommedetout->total_vente. '</td>';
           $html .= '<td>' . $sommedetout->somme_achat. '</td>';
           $html .= '<td>' . $sommedetout->benefice_brute. '</td>';
           $html .= '<td>' . $sommedetout->perte. '</td>';
           $html .= '<td>' . $sommedetout->benefice. '</td>';
           $html .= '</tr>';
           $html .= '</table>';

           // Générer le fichier PDF
           $dompdf = new Dompdf();
           $dompdf->loadHtml($html);
           $dompdf->render();
           $dompdf->stream('totalventeparmois.pdf');

           return redirect()->back()->with('success', 'L\'export est reussie');
     }

     public function exportbeneficePdf($annee)
     {

        $data=v_bilan_par_annee::where('annee','<=',$annee)->orderBy('annee','desc')->get();

        // Commission total
        $sumCommission=0;

        // Benefice + commission total
        $benefcommission=0;

        // Total par annee
        $sommedetout=v_bilan::selectRaw('sum(quantite) as total_quantite,
        sum(somme_vente) as total_vente,
        sum(somme_achat) as total_achat,
        sum(benefice_brute) as benefice_brute,
        sum(perte) as perte,
        sum(benefice) as benefice')->where('annee','<=',$annee)->first();

        //  Total commission
        foreach($data  as $v_bilan_par_annee) {
            $commission = commission::commission($v_bilan_par_annee->somme_vente);
            $sumCommission += $commission;
        }

        $benefcommission=$sommedetout->benefice-$sumCommission;

            $html= '';
            $html.= '<h3>Benefice par mois filtree par annee</h3>';
            $html.= '<table class="table" border="2">';
            $html.= '<thead>'  ;
              $html.= '<tr>';
                $html.= '<th scope="col">annee</th>';
                $html.= '<th scope="col">mois</th>';
                $html.= '<th scope="col">somme_vente</th>';
               $html.= '<th scope="col">somme_achat</th>';
               $html.=' <th scope="col">perte</th>';
               $html.=' <th scope="col">benefice</th>';
               $html.=' <th scope="col">commission</th>';
               $html.=' <th scope="col">benef avec comm</th>';
              $html.= '</tr>';
              $html.= '</thead>';
              $html.= '<tbody>';
            foreach ($data as $v_bilan_par_annee) {
                $html .= '<tr>';
                $html .= '<td>' . $v_bilan_par_annee->annee. '</td>';
                $html .= '<td>' . $v_bilan_par_annee->mois. '</td>';
                $html .= '<td>' . $v_bilan_par_annee->somme_vente . '</td>';
                $html .= '<td>' . $v_bilan_par_annee->somme_achat. '</td>';
                $html .= '<td>' . $v_bilan_par_annee->benefice_brute. '</td>';
                $html .= '<td>' . $v_bilan_par_annee->perte. '</td>';
                $html .= '<td>' . $v_bilan_par_annee->commission. '</td>';
                $html .= '<td>' . $v_bilan_par_annee->benefsanscommission. '</td>';

                $html .= '</tr>';
            }
              $html.= '</tbody>';
              $html .= '</table>';
              $html.= '<table class="table" border="2">';
              $html.= '<thead>'  ;
              $html.= '<tr>';
              $html.= '</tr>';
              $html.= '</thead>';
              $html.= '<tbody>';
              $html .= '<tr>';
              $html .= '<th scope="col">Total</th>';
              $html .= '<td></td>';
              $html .= '<td>' . $sommedetout->total_vente. '</td>';
              $html .= '<td>' . $sommedetout->total_achat . '</td>';
              $html .= '<td>' . $sommedetout->benefice_brute. '</td>';
              $html .= '<td>' . $sommedetout->perte. '</td>';
              $html .= '<td>' . $sommedetout->benefice. '</td>';
              $html .= '<td>' . $sumCommission. '</td>';
              $html .= '<td>' . $benefcommission. '</td>';
              $html .= '</tr>';
              $html.= '</tbody>';
              $html .= '</table>';

            // Générer le fichier PDF
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->render();
            $dompdf->stream('beneficeparmois.pdf');

            return redirect()->back()->with('success', 'L\'export est reussie');
      }
      public function exportbeneficepertePdf()
      {

         $data=vue_beneficeperte_par_mois::all();
             // Générer le contenu HTML
             $html= '';
             $html.= '<h3>Liste total des benefices par mois avec les transferts et les envois</h3>';
             $html.= '<table class="table" border="2">';
             $html.= '<thead>'  ;
               $html.= '<tr>';
                 $html.= '<th scope="col">mois</th>';
                 $html.=' <th scope="col">benefice</th>';
               $html.= '</tr>';
             foreach ($data as $listegeneral) {
                 $html .= '<tr>';
                 $html .= '<td>' . $listegeneral->mois. '</td>';
                 $html .= '<td>' . $listegeneral->benefice . '</td>';
          //        // Ajouter d'autres colonnes ici...
                 $html .= '</tr>';
             }
             $html .= '</table>';

             // Générer le fichier PDF
             $dompdf = new Dompdf();
             $dompdf->loadHtml($html);
             $dompdf->render();
             $dompdf->stream('beneficeparmoisavecperte.pdf');

             return redirect()->back()->with('success', 'L\'export est reussie');
       }
      public function exportPdfpdv()
      {

         $data=total_vente_pv_parmois::all();
             // Générer le contenu HTML
             $html= '';
             $html.= '<h3>Liste total des ventes par mois et par point de vente</h3>';
             $html.= '<table class="table" border="2">';
             $html.= '<thead>'  ;
               $html.= '<tr>';
                 $html.= '<th scope="col">totalordi</th>';
                 $html.= '<th scope="col">totalprixvente</th>';
                 $html.= '<th scope="col">recette</th>';
                 $html.=' <th scope="col">mois</th>';
                 $html.=' <th scope="col">point de vente</th>';
               $html.= '</tr>';
             foreach ($data as $listegeneral) {
                 $html .= '<tr>';
                 $html .= '<td>' . $listegeneral->totalordi. '</td>';
                 $html .= '<td>' . $listegeneral->totalprixvente . '</td>';
                 $html .= '<td>' . $listegeneral->recette . '</td>';
                 $html .= '<td>' . $listegeneral->mois. '</td>';
                 $html .= '<td>' . $listegeneral->nom. '</td>';
          //        // Ajouter d'autres colonnes ici...
                 $html .= '</tr>';
             }
             $html .= '</table>';

             // Générer le fichier PDF
             $dompdf = new Dompdf();
             $dompdf->loadHtml($html);
             $dompdf->render();
             $dompdf->stream('totalventeparmoisparpointdevente.pdf');

             return redirect()->back()->with('success', 'L\'export est reussie');
       }

}
?>
