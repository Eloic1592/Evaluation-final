@extends('forme.forme')
@section('title') Modifier artiste @endsection

@section('content')
<div class="pagetitle">
      <h1>Modifier artiste</h1>
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
                        <h5 class="card-title">Modifier artiste</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('Artiste/edit') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" class="form-control" id="floatingZip" value="{{$artiste->id}}" />
                            <div class="col-md-12">
                                    <div class="form-floating">
                                    <input type="text" name="artiste" class="form-control" id="floatingZip" placeholder="Nom de l'artiste" value="{{$artiste->artiste}}"  />
                                        <label for="floatingZip">artiste</label>
                                    </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-floating">
                                <input type="number" name="tarif_heure" class="form-control" id="floatingZip" value="{{$artiste->tarif_heure}}"  />
                                    <label for="floatingZip">tarif_heure</label>
                                </div>
                                </div>
                              <div class="col-md-12">
                                <div class="form-floating">
                                <input type="number" name="prixbase" class="form-control" id="floatingZip" value="{{$artiste->prixbase}}"  />
                                    <label for="floatingZip">prix de base</label>
                                </div>
                              </div>
                              <div class="col-12">
                                <input type="file" name="photo" class="form-control" id="photo" onchange=encodeImageFileAsURL(this) required>
                                <input type="hidden" name="visuel" id="visuel" value="{{$artiste->photo}}">
                                <div class="invalid-feedback">Modifier la photo</div>
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

