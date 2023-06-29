@extends('forme.forme-user')
@section('title') Liste des evenements @endsection

@section('content')
<div class="pagetitle">
      <h1>Liste des evenements</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Liste des evenements</a></li>

        </ol>
      </nav>
    </div>
    {{-- <p><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal"><a style="color:white;">Rechercher evenement</a></button></p> --}}

    <p><button type="button" class="btn btn-primary"><a style="color:white;" href="{{ url('StatSpectacle/index') }}">Statistique</a></button></p>

    <div class="modal fade" id="largeModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Rechercher evenement</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" action="{{ url('Evenement/search') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                        <div class="form-floating">
                        <input type="text" name="nom" class="form-control" id="floatingZip" placeholder="Nom de l'evenement"  />
                            <label for="floatingZip">nom</label>
                        </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-floating">
                    <input type="text" name="description" class="form-control" id="floatingZip" placeholder="description"  />
                        <label for="floatingZip">description</label>
                    </div>
                    </div>
                  <div class="col-md-12">
                    <div class="form-floating">
                    <input type="datetime-local" name="date_debut" class="form-control" id="floatingZip" placeholder="date de debut"  />
                        <label for="floatingZip">date de debut</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <select class="form-select"  name="idtype_evenement"  id="idevenement" aria-label="State">
                            <option value="" disabled selected>--Selectionner un type d'evenement--</option>
                            @foreach($type_evenement as $type_evenement)
                            <option value="{{ $type_evenement->id }}" >{{ $type_evenement->type_evenement }}</option>
                         @endforeach
                        </select>
                        <label for="floatingSelect">type d'evenement</label>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                  <input type="submit" class="btn btn-primary" value="Valider">
                </div>
            </form>
          </div>
  </div>
      </div>
  </div><!-- End Large Modal-->

    {{-- Content --}}
    {{-- INSERTION DES MODULES --}}
    <section class="section">
        <div class="row">
            {!! $liste !!}
            @if(session()->has('recherche_evenement'))
            <div class="col-lg-12">
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Listes des modele recherche</h5>
                            <!-- Default Table -->
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">nom</th>
                                    <th scope="col">description</th>
                                    <th scope="col">date_debut</th>
                                    <th scope="col">date_fin</th>
                                    <th scope="col">idtype_evenement</th>
                                    <th scope="col">etat</th>
                                    <th scope="col">type_evenement</th>



                                  </tr>
                                </thead>
                                <tbody>
                                @foreach(session('recherche_evenement') as $modele)
                                  <tr>
                                    <th scope="row">{{ $modele->id }} </th>
                                    <td>{{ $modele->nom }}</td>
                                    <td>{{ $modele->description }}</td>
                                    <td>{{ $modele->date_debut }}</td>
                                    <td>{{ $modele->date_fin }}</td>
                                    <td>{{ $modele->idtype_evenement }}</td>
                                    <td>{{ $modele->etat }}</td>
                                    <td>{{ $modele->type_evenement }}</td>
                                    <td>{!! $modele->modifier !!}
                                        {!! $modele->supprimer !!}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>

                        </div>
                    </div>
            @endif


        </div>
    </section>

        @if(session()->has('success'))
        @section('message')
        @section('type_message')alert alert-success alert-dismissible fade show @endsection
        {{ session('success') }}
        @endsection
        @endif

@endsection

