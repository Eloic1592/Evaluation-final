@extends('forme.forme-user')
@section('title') Modifier devis artiste @endsection

@section('content')
<div class="pagetitle">
      <h1>Modifier devis artiste</h1>
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
                        <h5 class="card-title">Modifier devis artiste</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('Devisartistes/edit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" class="form-control" id="floatingZip" value="{{$devisartiste->id}}" />
                        <div class="col-md-12">
                            <div class="form-floating">
                            <input type="number" name="heureartiste" class="form-control" id="floatingZip" value="{{$devisartiste->heureartiste}}"  />
                                <label for="floatingZip">heureartiste</label>
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

