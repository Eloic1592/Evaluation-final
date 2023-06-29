@extends('forme.forme')
@section('title') Liste des places @endsection

@section('content')
<div class="pagetitle">
      <h1>Liste des places</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Liste des places</a></li>

        </ol>
      </nav>
    </div>

    <p>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal2"><a style="color:white;">Nouvelle categorie de place</a></button>
    </p>
  {{-- Nouveu type de place --}}
  <div class="modal fade" id="largeModal2" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Nouveau type de place</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-3" action="{{ url('CategoriePlace/create') }}" method="POST">
              @csrf
              <div class="col-md-12">
                      <div class="form-floating">
                      <input type="text" name="categorie_place" class="form-control" id="floatingZip" placeholder="Nom de la categorie"  />
                          <label for="floatingZip">categorie place</label>
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

