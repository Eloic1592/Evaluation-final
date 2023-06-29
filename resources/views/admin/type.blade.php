@extends('forme.forme')
@section('title') Liste des types @endsection

@section('content')
<div class="pagetitle">
      <h1>Liste des types</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Liste des types</a></li>

        </ol>
      </nav>
    </div>

    <p><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal"><a style="color:white;">Nouveau type</a></button></p>

    <div class="modal fade" id="largeModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Nouveau type</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form class="row g-3" action="{{ url('Type/create') }}" method="POST">
          @csrf
          <div class="col-md-12">
                  <div class="form-floating">
                  <input type="text" name="type" class="form-control" id="floatingZip" placeholder="Nom du nouveau type"  />
                      <label for="floatingZip">type</label>
                  </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <input type="submit" class="btn btn-primary" value="Valider">
          </div>
      </form>
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

