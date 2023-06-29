@extends('forme.forme')
@section('title') Modifier ticketing @endsection

@section('content')
<div class="pagetitle">
      <h1>Modifier ticketing</h1>
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
                        <h5 class="card-title">Modifier ticketing</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('Ticketing/edit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" class="form-control" id="floatingZip" value="{{$ticketing->id}}" />
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select"  name="idevenement"  id="idevenement" aria-label="State" required>
                                        <option value="{{ $ticketing->idevenement }}" >{{ $ticketing->nom }}</option>
                                        @foreach($evenement as $evenement)
                                        <option value="{{ $evenement->id }}" >{{ $evenement->nom }}</option>
                                     @endforeach
                                    </select>
                                    <label for="floatingSelect">Evenement</label>
                                </div>
                            </div>
                              <div class="col-md-12">
                                <div class="form-floating">
                                <input type="datetime-local" name="date_debut" class="form-control" id="floatingZip" value="{{$ticketing->date_debut}}"   />
                                    <label for="floatingZip">date de debut</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                <input type="datetime-local" name="date_fin" class="form-control" id="floatingZip" value="{{$ticketing->date_fin}}"   />
                                    <label for="floatingZip">date de fin</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                <input type="text" name="prixunitaire" class="form-control" id="floatingZip" value="{{$ticketing->prixunitaire}}"   />
                                    <label for="floatingZip">prixunitaire</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                <input type="number" name="quantite" class="form-control" id="floatingZip" value="{{$ticketing->quantite}}"  />
                                    <label for="floatingZip">quantite</label>
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
        @if(session()->has('success'))
        @section('message')
        @section('type_message')alert alert-success alert-dismissible fade show @endsection
        {{ session('success') }}
        @endsection
        @endif
    </section>

@endsection

