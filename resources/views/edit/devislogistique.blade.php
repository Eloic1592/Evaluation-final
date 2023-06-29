@extends('forme.forme-user')
@section('title') Modifier devis  logistique @endsection

@section('content')
<div class="pagetitle">
      <h1>Modifier devis  logistique</h1>
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
                        <h5 class="card-title">Modifier devis  logistique</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('Devislogistique/edit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" class="form-control" id="floatingZip" value="{{$devislogistique->id}}" />
                        <div class="col-md-12">
                            <div class="form-floating">
                            <input type="number" name="jour" class="form-control" id="floatingZip" value="{{$devislogistique->jour}}"  />
                                <label for="floatingZip">jour</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                            <input type="number" name="quantite" class="form-control" id="floatingZip" value="{{$devislogistique->quantite}}"  />
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

