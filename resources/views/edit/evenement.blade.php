@extends('forme.forme')
@section('title') Modifier evenement @endsection

@section('content')
<div class="pagetitle">
      <h1>Modifier evenement</h1>
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
                        <h5 class="card-title">Modifier evenement</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('Evenement/edit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" class="form-control" id="floatingZip" value="{{$evenement->id}}" />
                            <div class="col-md-12">
                                <div class="form-floating">
                                <input type="text" name="nom" class="form-control" id="floatingZip"  value="{{$evenement->nom}}" />
                                    <label for="floatingZip">nom</label>
                                </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-floating">
                            <input type="text" name="description" class="form-control" id="floatingZip" value="{{$evenement->description}}"  />
                                <label for="floatingZip">description</label>
                            </div>
                            </div>
                          <div class="col-md-12">
                            <div class="form-floating">
                            <input type="datetime-local" name="date_debut" class="form-control" id="floatingZip" value="{{$evenement->date_debut}}" />
                                <label for="floatingZip">date de debut</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                            <input type="datetime-local" name="date_fin" class="form-control" id="floatingZip"value="{{$evenement->date_fin}}"  />
                                <label for="floatingZip">date de fin</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <select class="form-select"  name="idtype_evenement"  id="idtype_evenement" aria-label="State" required>
                                    <option value="" disabled selected>--Selectionner un type d'evenement--</option>
                                    @foreach($type_evenement as $type_evenement)
                                    <option value="{{ $type_evenement->id }}" >{{ $type_evenement->type_evenement }}</option>
                                 @endforeach
                                </select>
                                <label for="floatingSelect">type d'evenement</label>
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

