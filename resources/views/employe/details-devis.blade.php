@extends('forme.forme-user')
@section('title') Details devis @endsection

@section('content')
<div class="pagetitle">
      <h1>Details devis</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Details devis</a></li>

        </ol>
      </nav>
    </div>
    <p><button type="button" class="btn btn-primary"><a style="color:white;" href="{{ url('VListeDevis/insererdetails') }}/{{ $iddevis }}">Ajouter des details</a></button></p>

    <p><button type="button" class="btn btn-primary"><a style="color:white;" href="{{ url('Recette/show') }}/{{ $iddevis }}">Ajouter recette</a></button></p>


    {{-- Content --}}
    {{-- INSERTION DES MODULES --}}
    <section class="section">
        {{-- <h3>Total recette provisoire: {!! $recette !!} Ariary</h3><br> --}}

        <h3>Total recette reelle: {!! $recettereelle !!} Ariary</h3><br>

        <h3>Total depense: {!! $depense !!} Ariary</h3><br>

        {{-- <h3>Benefice: {!! $benefice !!} Ariary</h3><br> --}}

        {{-- <h3>Benefice provisoire: {!! $beneficepro !!} Ariary</h3><br> --}}



        <div class="row">
            <div><h5>Total montant artiste: {!! $sommeartiste !!} Ariary</h5></div><br>
            {!! $v_liste_devisartiste !!}
            <div><h5>Total montant sonorisation: {!! $sommesono !!} Ariary</h5></div><br>
            {!! $v_liste_devissono !!}
            <div><h5>Total montant logistique: {!! $sommelog !!} Ariary</h5></div><br>
            {!! $v_liste_devislogistics !!}
            <div><h5>Total montant pour autre depense: {!! $sommedep !!} Ariary</h5></div><br>
            {!! $v_liste_devisdepense !!}
            <div><h5>Location lieu: {!! $sommelieu !!} Ariary</h5></div>
            {!! $v_liste_devislieu !!}
            <div><h5>Recette provisoire: {!! $sommeplace !!} Ariary</h5></div>
            {!! $v_liste_devisplace !!}

        </div>

    </section>

        @if(session()->has('success'))
        @section('message')
        @section('type_message')alert alert-success alert-dismissible fade show @endsection
        {{ session('success') }}
        @endsection
        @endif

@endsection

