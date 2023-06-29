@extends('forme.forme-user')
@section('title') Recette @endsection

@section('content')
<div class="pagetitle">
      <h1>Recette</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Recette</a></li>

        </ol>
      </nav>
    </div>

    <p><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal"><a style="color:white;">Nouvelle recette</a></button></p>

    <div class="modal fade" id="largeModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Nouvelle recette</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" action="{{ url('Recette/create') }}" method="POST">
                @csrf
                <input type="hidden" name="iddevis" class="form-control" id="floatingZip" value="{{$iddevis}}" />

                <input type="hidden" name="idlieu" class="form-control" id="floatingZip" value="{{$v_liste_devislieu->idlieu}}" />
                  <div class="col-md-12">
                    <div class="form-floating">
                        <select class="form-select"  name="idcategorie_place"  id="idcategorie_place" aria-label="State" required>
                            <option value="" disabled selected>--Selectionner une categorie--</option>
                            @foreach($v_liste_devisplace as $v_liste_devisplace)
                            <option value="{{ $v_liste_devisplace->idcategorie_place }}" >{{ $v_liste_devisplace->categorie_place }}/ place:{{ $v_liste_devisplace->nombreplace }}</option>
                         @endforeach
                        </select>
                        <label for="floatingSelect">categorie</label>
                    </div>
                </div>
                  <div class="col-md-12">
                    <div class="form-floating">
                    <input type="number" name="nombrevendu" class="form-control" id="floatingZip" placeholder="nombrevendu"  />
                        <label for="floatingZip">nombrevendu</label>
                    </div>
                </div>
                  <div class="col-md-12">
                    <div class="form-floating">
                    <input type="datetime-local" name="daterecette" class="form-control" id="floatingZip" placeholder="daterecette" />
                        <label for="floatingZip">date vente</label>
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
            {{-- {!! $liste !!} --}}
        </div>
    </section>

        @if(session()->has('success'))
        @section('message')
        @section('type_message')alert alert-success alert-dismissible fade show @endsection
        {{ session('success') }}
        @endsection
        @endif
        @if(session()->has('failure'))
        @section('message')
        @section('type_message')alert alert-danger alert-dismissible fade show @endsection
        {{ session('failure') }}
        @endsection
        @endif

@endsection

