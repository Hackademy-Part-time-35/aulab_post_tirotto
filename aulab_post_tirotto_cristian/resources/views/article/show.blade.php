<x-layout>
    <div class="container bg-secondary-subtle mt-3 rounded rounded-2 p-0">
        <div clas="container p-5 bg-secondary-subtle">
            <div class="d-flex justify-content-center bg-secondary rounded-0 rounded-top-2">
                <div class="col-12 text-center ">
                    <h1 class="display-1">{{ $article->title }}</h1>
                </div>
            </div>
        </div>
    
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 d-flex flex-column justify-content-center">
                    <img src="{{ Storage::url($article->image) }}" class="img-fluid"
                        alt="immagine dell'articolo{{ $article->title }}">
                    <div class="text-center mt-2">
                        <h2>{{ $article->subtitle }}</h2>
                        @if ($article->category)
                            <p class="fs-5">Categoria:
    
                                <a href="{{ route('article.byCategory', $article->category) }}"
                                    class="text-capitalize text-muted">{{ $article->category->name }}</a>
                            </p>
                        @else
                            <p class="fs-5">Nessuna categoria</p>
                        @endif
    
                        <p class="small text-muted my-0">
                            @foreach ($article->tags as $tag)
                                #{{ $tag->name }}
                            @endforeach
                        </p>
    
    
                        <div class="text-muted my-3">
                            <p>Redatto il {{ $article->created_at->format('d/m/Y') }} da {{ $article->user->name }}</p>
                        </div>
                    </div>
                    <hr>
                    <p class="text-center">{{ $article->body }}</p>
    
                    @if (Auth::user() && Auth::user()->is_revisor)
                        <div class="container my-5">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-evenly">
                                    <form action="{{ route('revisor.acceptArticle', $article) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Accetta l'articolo</button>
                                    </form>
                                    <form action="{{ route('revisor.rejectArticle', $article) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Rifiuta l'articolo</button>
                                    </form>
    
                                </div>
    
                            </div>
    
                        </div>
                    @endif
                    <div class="text-center">
                        <a href="{{ route('article.index') }}" class="text-secondary">Vai alla lista degli articoli</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-layout>
