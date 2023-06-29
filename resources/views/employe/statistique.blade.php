@extends('forme.forme-user')
@section('title') Statistiques @endsection

@section('content')
<div class="pagetitle">
      <h1>Statistiques</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Statistiques</a></li>

        </ol>
      </nav>
    </div>

    {{-- INSERTION DES MODULES --}}
    <section class="section">
        <div class="row">
            {!! $liste !!}
            <section class="section">
                <div class="row">
                    {{-- <div class="col-lg-12">
                        <div class="col-md-12">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title">Listes des modele</h5>
                                    <!-- Default Table -->
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($stat_spectacle as $modele)
                                          <tr>
                                            <td>{{ number_format($modele->beneficenet,2,'.','') }}</td>
                                          </tr>
                                          @endforeach
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>
                    </div> --}}
            <?php
            // Supposons que $stat_spectacle est une liste Laravel
            $stat_spectacle = [
                'labels' => [ 'artiste' ,'sonorisation','logistique', 'lieu','autre depense'],
                'data' => [90,70,100,20,50],
                'backgroundColor' => ['rgb(255, 255, 0)', 'rgb(54, 162, 235)', 'rgb(0, 255, 0)','rgb(255, 0, 0)','rgb(0, 0, 255)'],
            ];

            // Convertir la liste en JSON
            $stat_spectacle_json = json_encode($stat_spectacle);
            ?>

        <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Pie Chart</h5>
                    <canvas id="pieChart" style="max-height: 400px;"></canvas>
                        <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            var stat_spectacle = {!!json_encode($stat_spectacle)!!};

                            new Chart(document.querySelector('#pieChart'), {
                                type: 'pie',
                                data: {
                                    labels: stat_spectacle.labels,
                                    datasets: [{
                                        label: 'My First Dataset',
                                        data: stat_spectacle.data,
                                        backgroundColor: stat_spectacle.backgroundColor,
                                        hoverOffset: 4
                                    }]
                                }
                            });
                        });
                        </script>
                </div>
            </div>
        </div>
    </div>
    </section>

        @if(session()->has('success'))
        @section('message')
        @section('type_message')alert alert-success alert-dismissible fade show @endsection
        {{ session('success') }}
        @endsection
        @endif

@endsection

