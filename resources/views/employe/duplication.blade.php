@extends('forme.forme-user')
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
                        <form class="row g-3" action="{{ url('VListeDevis/dupliquer') }}" method="POST">
                            @csrf
                            <input type="hidden" name="iddevis" class="form-control" id="floatingZip" value="{{$iddevis}}" />
                                <input type="hidden" name="nom" class="form-control" id="floatingZip"  value="{{$v_liste_evenement->nom}}+bis" />
                            <input type="hidden" name="description" class="form-control" id="floatingZip" value="{{$v_liste_evenement->description}}+bis"  />
                        <div class="col-md-12">
                            <div class="form-floating">
                            <input type="datetime-local" name="date_debut" class="form-control" id="floatingZip"  />
                                <label for="floatingZip">date de debut</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                            <input type="datetime-local" name="date_fin" class="form-control" id="floatingZip"  />
                                <label for="floatingZip">date de fin</label>
                            </div>
                        </div>
                            <input type="hidden" name="idtype_evenement" class="form-control" id="floatingZip" value="{{$v_liste_evenement->idtype_evenement}}"   />
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

