<x-layout>
<div class="container-fluid p-5 bg-secondary-subtle text-center">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="display-1 text-capitalize">{{ $category->name}}</h1>
         </div>
        </div>
    <div>

    <div class="container my-5">
        <div class="row justify-content-evenly">
            @foreach ($article as $article)
            <div class="col-12" col-md-3>
                <div class="card" style="with: 18rem;">
                    <img src="{{ Storage::url($article->image)}}" class="card-img-top" alt="Immagine dell'articolo: {{$article->title}}">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title}}</h5>
                    <p>Redatto il {{$article->created_at->format('d/m/Y')}} <br>
                    da {{$article->user->name}}</p>
                    <a href="{{route()'article.shpow', $article}}" class="btn btn-outline-secondary">Leggi</a>
               </div>
            </div>
         </div>
         @endforeach
      </div>
  </div>

</x-layout>
