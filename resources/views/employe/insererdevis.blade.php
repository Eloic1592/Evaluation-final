@extends('forme.forme-user')
@section('title') Inserer les details du devis @endsection

@section('content')
<div class="pagetitle">
      <h1>Inserer les details du devis</h1>
      <nav>
        <ol class="breadcrumb">
        </ol>
      </nav>
    </div>


    {{-- Content --}}
    {{-- INSERTION DES MODULES --}}
    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Inserer le lieu</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('Lieu/insertdevislieu') }}" method="POST">
                            @csrf
                            <input type="hidden" name="iddevis" class="form-control" id="floatingZip" value="{{$iddevis}}" />
                              <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select"  name="idlieu"  id="idlieu" aria-label="State" required>
                                        <option value="" disabled selected>--Selectionner un lieu--</option>
                                        @foreach($lieu as $lieu)
                                        <option value="{{ $lieu->id }}" >{{ $lieu->lieu }} / capacite:{{ $lieu->capacite }}</option>
                                     @endforeach
                                    </select>
                                    <label for="floatingSelect">lieu</label>
                                </div>
                            </div>
                              <div class="col-md-12">
                                <div class="form-floating">
                                <input type="number" name="prix" class="form-control" id="floatingZip"  />
                                    <label for="floatingZip">prix</label>
                                </div>
                              </div>
                                <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Valider</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Artiste</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('Artiste/insertdevisartiste') }}" method="POST">
                            @csrf
                            <input type="hidden" name="iddevis" class="form-control" id="floatingZip" value="{{$iddevis}}" />
                              <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select"  name="idartiste"  id="idartiste" aria-label="State" required>
                                        <option value="" disabled selected>--Selectionner un artiste--</option>
                                        @foreach($artiste as $artiste)
                                        <option value="{{ $artiste->id }}" >{!! $artiste->artiste !!} / tarif:{{ $artiste->tarif_heure }} par heure</option>
                                     @endforeach
                                    </select>
                                    <label for="floatingSelect">artiste</label>
                                </div>
                            </div>
                              <div class="col-md-12">
                                <div class="form-floating">
                                <input type="number" name="heureartiste" class="form-control" id="floatingZip"  />
                                    <label for="floatingZip">duree en heure</label>
                                </div>
                              </div>
                                <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Valider</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sonorisation</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('Sonorisation/insertdevissono') }}" method="POST">
                            @csrf
                            <input type="hidden" name="iddevis" class="form-control" id="floatingZip" value="{{$iddevis}}" />
                              <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select"  name="idsonorisation"  id="idsonorisation" aria-label="State" required>
                                        <option value="" disabled selected>--Selectionner un type de sono--</option>
                                        @foreach($sonorisation as $sonorisation)
                                        <option value="{{ $sonorisation->id }}" >{{ $sonorisation->sonorisation }} / tarif:{{ $sonorisation->tarif_heure }}</option>
                                     @endforeach
                                    </select>
                                    <label for="floatingSelect">sonorisation</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                <input type="number" name="quantite" class="form-control" id="floatingZip"  />
                                    <label for="floatingZip">quantite</label>
                                </div>
                            </div>
                              <div class="col-md-12">
                                <div class="form-floating">
                                <input type="number" name="heuresonorisation" class="form-control" id="floatingZip"  />
                                    <label for="floatingZip">duree en heure</label>
                                </div>
                              </div>
                                <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Valider</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Logistique</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('Logistique/insertdevislogistique') }}" method="POST">
                            @csrf
                            <input type="hidden" name="iddevis" class="form-control" id="floatingZip" value="{{$iddevis}}" />
                              <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select"  name="idlogistique"  id="idlogistique" aria-label="State" required>
                                        <option value="" disabled selected>--Selectionner un logistique--</option>
                                        @foreach($logistique as $logistique)
                                        <option value="{{ $logistique->id }}" >{{ $logistique->logistique }} / tarif:{{ $logistique->tarif_jour }}</option>
                                     @endforeach
                                    </select>
                                    <label for="floatingSelect">logistique</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                <input type="number" name="quantite" class="form-control" id="floatingZip"  />
                                    <label for="floatingZip">quantite</label>
                                </div>
                            </div>
                              <div class="col-md-12">
                                <div class="form-floating">
                                <input type="number" name="jour" class="form-control" id="floatingZip" />
                                    <label for="floatingZip">duree en jour</label>
                                </div>
                              </div>
                                <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Valider</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Autre depense</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('AutreDepense/insertdevisdepense') }}" method="POST">
                            @csrf
                            <input type="hidden" name="iddevis" class="form-control" id="floatingZip" value="{{$iddevis}}" />
                              <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select"  name="idautredepense"  id="idautredepense" aria-label="State" required>
                                        <option value="" disabled selected>--Selectionner une depense --</option>
                                        @foreach($autredepense as $autredepense)
                                        <option value="{{ $autredepense->id }}" >{{ $autredepense->nom }}</option>
                                     @endforeach
                                    </select>
                                    <label for="floatingSelect">autre depense</label>
                                </div>
                            </div>
                              <div class="col-md-12">
                                <div class="form-floating">
                                <input type="number" name="prix" class="form-control" id="floatingZip" />
                                    <label for="floatingZip">prix</label>
                                </div>
                              </div>
                                <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Valider</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Devis de place</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('PlaceLieu/insertdevisplace') }}" method="POST">
                            @csrf
                            <input type="hidden" name="iddevis" class="form-control" id="floatingZip" value="{{$iddevis}}" />
                              <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select"  name="idplace"  id="idplace" aria-label="State" required>
                                        <option value="" disabled selected>--Selectionner une place --</option>
                                        @foreach($v_liste_place as $v_liste_place)
                                        <option value="{{ $v_liste_place->id }}" >{{ $v_liste_place->lieu }} /{{ $v_liste_place->nombreplace }} / tarif:{{ $v_liste_place->categorie_place }}</option>
                                     @endforeach
                                    </select>
                                    <label for="floatingSelect">place</label>
                                </div>
                            </div>
                              <div class="col-md-12">
                                <div class="form-floating">
                                <input type="number" name="prix" class="form-control" id="floatingZip" />
                                    <label for="floatingZip">prix</label>
                                </div>
                              </div>
                                <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Valider</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if(session()->has('success'))
        @section('message')
        @section('type_message')alert alert-success alert-dismissible fade show @endsection
        {{ session('success') }}
        @endsection
        @endif
    </section>

@endsection

