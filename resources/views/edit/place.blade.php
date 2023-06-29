@extends('forme.forme')
@section('title') Modifier type de place @endsection

@section('content')
<div class="pagetitle">
      <h1>Modifier type de place</h1>
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
                        <h5 class="card-title">Modifier type de place</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('CategoriePlace/edit') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <input type="hidden" name="id" class="form-control" id="floatingZip" value="{{$categorie_place->id}}" />

                                    <div class="form-floating">
                                    <input type="text" name="categorie_place" class="form-control" id="floatingZip" value="{{$categorie_place->categorie_place}}" />
                                        <label for="floatingZip">categorie_place</label>
                                    </div>
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

