@extends('forme.forme-user')
@section('title') Nouveau devis @endsection

@section('content')
<div class="pagetitle">
      <h1>Nouveau devis</h1>
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
                        <h5 class="card-title">Nouveau devis</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('Devis/create') }}" method="POST">
                            @csrf
                            <input type="hidden" name="idevenement" class="form-control" id="floatingZip" value="{{$evenement}}" />
                            <div class="col-md-12">
                                <div class="form-floating">
                                <input type="text" name="devis" class="form-control" id="floatingZip"/>
                                    <label for="floatingZip">nom du devis</label>
                                </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-floating">
                            <input type="datetime-local" name="datedebut" class="form-control" id="floatingZip" />
                                <label for="floatingZip">date de debut</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                            <input type="datetime-local" name="datefin" class="form-control" id="floatingZip"  />
                                <label for="floatingZip">date de fin</label>
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

