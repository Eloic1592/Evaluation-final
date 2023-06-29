@extends('forme.forme')
@section('title') Liste des  autres depenses disponibles @endsection

@section('content')
<div class="pagetitle">
      <h1>Liste des  autres depenses disponibles</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Liste des  autres depenses disponibles</a></li>

        </ol>
      </nav>
    </div>

    <p><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal"><a style="color:white;">Nouvelle depense</a></button></p>

    <div class="modal fade" id="largeModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Nouvelle depense</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" action="{{ url('Autredepense/create') }}" method="POST">
                @csrf
                <div class="col-md-12">
                        <div class="form-floating">
                        <input type="text" name="nom" class="form-control" id="floatingZip" placeholder="nom"  />
                            <label for="floatingZip">nom</label>
                        </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-floating">
                    <input type="number" name="prixbase" class="form-control" id="floatingZip" placeholder="prix de base" step="0.01"  />
                        <label for="floatingZip">prix de base</label>
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
        </div>
    </section>

        @if(session()->has('success'))
        @section('message')
        @section('type_message')alert alert-success alert-dismissible fade show @endsection
        {{ session('success') }}
        @endsection
        @endif

@endsection

