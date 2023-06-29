@extends('forme.forme')
@section('title') Modifier logistique @endsection

@section('content')
<div class="pagetitle">
      <h1>Modifier logistique</h1>
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
                        <h5 class="card-title">Modifier logistique</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('Logistique/edit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" class="form-control" id="floatingZip" value="{{$logistique->id}}" />
                            <div class="col-md-12">
                                <div class="form-floating">
                                <input type="text" name="logistique" class="form-control" id="floatingZip" placeholder="Nom de logistique"value="{{$logistique->logistique}}"  />
                                    <label for="floatingZip">logistique</label>
                                </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-floating">
                            <input type="number" name="tarif_jour" class="form-control" id="floatingZip" placeholder="tarif_jour" value="{{$logistique->tarif_jour}}"  />
                                <label for="floatingZip">tarif_jour</label>
                            </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select"  name="idtype"  id="idtype" aria-label="State" required>
                                        <option value="" disabled selected>--Selectionner un type--</option>
                                        @foreach($type as $type)
                                        <option value="{{ $type->id }}" >{{ $type->type }}</option>
                                     @endforeach
                                    </select>
                                    <label for="floatingSelect">type</label>
                                </div>
                            </div>
                          <div class="col-md-12">
                            <div class="form-floating">
                            <input type="number" name="prixbase" class="form-control" id="floatingZip" placeholder="prix de base" step="0.01"  value="{{$logistique->prixbase}}"/>
                                <label for="floatingZip">prix de base</label>
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

