@extends('forme.forme')
@section('title') Modifier location lieu @endsection

@section('content')
<div class="pagetitle">
      <h1>Modifier location lieu</h1>
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
                        <h5 class="card-title">Modifier location lieu</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('Local/edit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" class="form-control" id="floatingZip" value="{{$local->id}}" />
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
                                <input type="text" name="nom" class="form-control" id="floatingZip" value="{{$local->nom}}"  />
                                    <label for="floatingZip">nom</label>
                                </div>
                            </div>
                              <div class="col-md-12">
                                <div class="form-floating">
                                <input type="datetime-local" name="date_debut" class="form-control" id="floatingZip" value="{{$local->date_debut}}"  />
                                    <label for="floatingZip">date de debut</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                <input type="datetime-local" name="date_fin" class="form-control" id="floatingZip" value="{{$local->date_fin}}"  />
                                    <label for="floatingZip">date de fin</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                <input type="number" name="prix" class="form-control" id="floatingZip" value="{{$local->prix}}"  />
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
        @if(session()->has('success'))
        @section('message')
        @section('type_message')alert alert-success alert-dismissible fade show @endsection
        {{ session('success') }}
        @endsection
        @endif
    </section>

@endsection

