@extends('forme.forme')
@section('title') Ticketing @endsection

@section('content')
<div class="pagetitle">
      <h1>Ticketing</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Ticketing</a></li>

        </ol>
      </nav>
    </div>
    <p><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal"><a style="color:white;">Ticketing</a></button></p>

    <div class="modal fade" id="largeModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Placement de ticket</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" action="{{ url('Ticketing/create') }}" method="POST">
                @csrf
                  <div class="col-md-12">
                    <div class="form-floating">
                        <select class="form-select"  name="idevenement"  id="idevenement" aria-label="State" required>
                            <option value="" disabled selected>--Selectionner un evenement--</option>
                            @foreach($evenement as $evenement)
                            <option value="{{ $evenement->id }}" >{{ $evenement->nom }}</option>
                         @endforeach
                        </select>
                        <label for="floatingSelect">Evenement</label>
                    </div>
                </div>
                  <div class="col-md-12">
                    <div class="form-floating">
                    <input type="date" name="date_debut" class="form-control" id="floatingZip" placeholder="date de debut"  />
                        <label for="floatingZip">date de debut</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                    <input type="date" name="date_fin" class="form-control" id="floatingZip" placeholder="date de fin"  />
                        <label for="floatingZip">date de fin</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                    <input type="number" name="prixunitaire" class="form-control" id="floatingZip" placeholder="prixunitaire"  />
                        <label for="floatingZip">prixunitaire</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                    <input type="number" name="quantite" class="form-control" id="floatingZip" placeholder="quantite"  />
                        <label for="floatingZip">quantite</label>
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

