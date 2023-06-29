@extends('forme.forme')
@section('title') Liste des lieux @endsection

@section('content')
<div class="pagetitle">
      <h1>Liste des lieux</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Liste des lieux</a></li>

        </ol>
      </nav>
    </div>

    <p><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal"><a style="color:white;">Nouveau lieu</a></button>
    </p>

  {{-- Nouveu lieu --}}
    <div class="modal fade" id="largeModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Nouveau lieu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" action="{{ url('Lieu/create') }}" method="POST">
                @csrf
                <div class="col-md-12">
                        <div class="form-floating">
                        <input type="text" name="lieu" class="form-control" id="floatingZip" placeholder="Nom du lieu"  />
                            <label for="floatingZip">lieu</label>
                        </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-floating">
                    <input type="number" name="capacite" class="form-control" id="floatingZip" placeholder="capacite"  />
                        <label for="floatingZip">capacite</label>
                    </div>
                    </div>
                  <div class="col-md-12">
                    <div class="form-floating">
                    <input type="number" name="prixbase" class="form-control" id="floatingZip" placeholder="prix de base" step="0.01"  />
                        <label for="floatingZip">prix de base</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <select class="form-select"  name="idtype_lieu"  id="idtype_lieu" aria-label="State" required>
                            <option value="" disabled selected>--Selectionner un type de lieu--</option>
                            @foreach($type_lieu as $type_lieu)
                            <option value="{{ $type_lieu->id }}" >{{ $type_lieu->type_lieu }}</option>
                         @endforeach
                        </select>
                        <label for="floatingSelect">type_lieu</label>
                    </div>
                </div>
                <div class="col-12">
                    <input type="file" name="photo" class="form-control" id="photo" onchange=encodeImageFileAsURL(this) required>
                    <input type="hidden" name="visuel" id="visuel">
                    <div class="invalid-feedback">Ajouter une photo</div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                  <input type="submit" class="btn btn-primary" value="Valider">
                </div>
            </form>
          </div>
  </div>
      </div>
  </div><!-- End Large Modal-->

    {{-- Content --}}
    {{-- INSERTION DES MODULES --}}
    <section class="section">
        <div class="row">
            {!! $liste !!}
        </div>
    </section>

        @if(session()->has('success'))
        @section('message')
        @section('type_message')alert alert-success alert-dismissible fade show @endsection
        {{ session('success') }}
        @endsection
        @endif

@endsection
<script>
    function encodeImageFileAsURL(element) {
        let file = element.files[0];
        let reader = new FileReader();
        reader.onloadend = function() {
            document.getElementById("visuel").value = reader.result;
        }
        reader.readAsDataURL(file);
    }
</script>


