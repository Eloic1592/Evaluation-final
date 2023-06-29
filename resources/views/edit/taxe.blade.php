@extends('forme.forme')
@section('title') Modifier taxe @endsection

@section('content')
<div class="pagetitle">
      <h1>Modifier taxe</h1>
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
                        <h5 class="card-title">Modifier taxe</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('Taxe/edit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" class="form-control" id="floatingZip" value="{{$taxe->id}}" />
                            <div class="col-md-12">
                                <div class="form-floating">
                                <input type="text" name="pourcentage" class="form-control" id="floatingZip" placeholder="pourcentage" value="{{$taxe->pourcentage}}" />
                                    <label for="floatingZip">pourcentage</label>
                                </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-floating">
                            <input type="datetime-local" name="date_taxe" class="form-control" id="floatingZip" placeholder="date_taxe" value="{{$taxe->date_taxe}}"  />
                                <label for="floatingZip">date_taxe</label>
                            </div>
                      </div>
                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Valider</button>
                                </div>
                            </div>
                </div>
                        </form>
                    </div>
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

