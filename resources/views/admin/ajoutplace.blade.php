@extends('forme.forme')
@section('title') Categorie de place @endsection

@section('content')
<div class="pagetitle">
      <h1>Categorie de place</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Categorie de place</a></li>

        </ol>
      </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ajouter place</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('Lieu/ajoutplace') }}" method="POST">
                            @csrf
                            <input type="hidden" name="idlieu" class="form-control" id="floatingZip" value="{{$lieu->id}}" />
                              <div class="col-md-12">
                                <div class="form-floating">
                                <input type="number" name="nombreplace" class="form-control" id="floatingZip"   />
                                    <label for="floatingZip">nombre de place</label>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-floating">
                                    <select class="form-select"  name="idcategorie_place"  id="idcategorie_place" aria-label="State" required>
                                        <option value="" disabled selected>--Selectionner une categorie--</option>
                                        @foreach($categorieplace as $categorieplace)
                                        <option value="{{ $categorieplace->id }}" >{{ $categorieplace->categorie_place }}</option>
                                     @endforeach
                                    </select>
                                    <label for="floatingSelect">type</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                <input type="number" name="prixbase" class="form-control" id="floatingZip"  step="0.01"  />
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
            {!! $liste !!}
        @if(session()->has('success'))
        @section('message')
        @section('type_message')alert alert-success alert-dismissible fade show @endsection
        {{ session('success') }}
        @endsection
        @endif
    </section>
@endsection

