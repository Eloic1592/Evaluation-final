@extends('forme.forme')
@section('title') Modifier type @endsection

@section('content')
<div class="pagetitle">
      <h1>Modifier type</h1>
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
                        <h5 class="card-title">Modifier type</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('Type/edit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" class="form-control" id="floatingZip" value="{{$type->id}}" />
                            <div class="col-md-12">
                                    <div class="form-floating">
                                    <input type="text" name="type" class="form-control" id="floatingZip" placeholder="Nom du type" value="{{$type->type}}"  />
                                        <label for="floatingZip">type</label>
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

