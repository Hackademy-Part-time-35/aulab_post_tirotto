<x-layout>
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">Bentornato,Amministratore {{Auth::user()->name}}</h1>
               </div>
            </div>
        </div>

        @if (session('message'))
        <div class="alert alert-success">
            {{session('message') }}
        </div>
        @endif

        <div class="conatiner my-5">
          <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per il ruolo di amministratore</h2>
                <x-request-table :roleRequest="$adminRequests" role="amministratore"/>
               </div>
            </div>
        </div>


        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2>Richieste per il ruolo di revisore</h2>
                    <x-requests-table :roleRequests="$revisorRequests" role="revisore"/>
                  </div>
               </div>
            </div>





           <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2>Richieste per il ruolo di redattore</h2>
                    <x-requests-table :roleRequest="$writerRequests" role="redattore"/>
                  </div>
               </div>
            </div>
