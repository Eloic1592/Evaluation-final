@extends('forme.forme')
@section('title') Modifier sonorisation @endsection

@section('content')
<div class="pagetitle">
      <h1>Modifier sonorisation</h1>
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
                        <h5 class="card-title">Modifier sonorisation</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('Sonorisation/edit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" class="form-control" id="floatingZip" value="{{$sonorisation->id}}" />
                            <div class="col-md-12">
                                <div class="form-floating">
                                <input type="text" name="sonorisation" class="form-control" id="floatingZip" value="{{$sonorisation->sonorisation}}" />
                                    <label for="floatingZip">sonorisation</label>
                                </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-floating">
                            <input type="number" name="tarif_heure" class="form-control" id="floatingZip" value="{{$sonorisation->tarif_heure}}"  />
                                <label for="floatingZip">tarif_heure</label>
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
                            <input type="number" name="prixbase" class="form-control" id="floatingZip" placeholder="prix de base" step="0.01" value="{{$sonorisation->prixbase}}" />
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

