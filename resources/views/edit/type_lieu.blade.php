@extends('forme.forme')
@section('title') Modifier type de lieu @endsection

@section('content')
<div class="pagetitle">
      <h1>Modifier type de lieu</h1>
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
                        <h5 class="card-title">Modifier type de lieu</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('TypeLieu/edit') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <input type="hidden" name="id" class="form-control" id="floatingZip" value="{{$type_lieu->id}}" />
                                    <div class="form-floating">
                                    <input type="text" name="type_lieu" class="form-control" id="floatingZip" value="{{$type_lieu->type_lieu}}" />
                                        <label for="floatingZip">type_lieu</label>
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

