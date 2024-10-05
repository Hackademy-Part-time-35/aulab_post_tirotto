<div class="col-12 col-lg-auto">
    <div class="card overflow-hidden custom-card-size mx-auto shadow-sm hover-grow">
        <img src="{{ Storage::url($article->image) }}" class="card-img-top object-fit-cover max-card-img-height"
                alt="Immagine dell'articolo:{{ $article->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $article->title }}</h5>
            <p class="subtitle">{{ $article->subtitle }}</p>
            @if ($article->category)
                <p class="small text-muted">Categoria:
                    <a href="{{ route('article.byCategory', $article->category) }}"
                        class="text-capitalize text-muted">{{ $article->category->name }}</a>
                </p>
            @else
                <p class="small text-muted">Nessuna categoria</p>
            @endif

            <p class="small text-muted my-0">
                @foreach ($article->tags as $tag)
                    #{{ $tag->name }}
                @endforeach
            </p>

        </div>

        <div class="card-footer d-flex justify-content-between align-items-center">
            <p>Redatto il {{ $article->created_at->format('d/m/Y') }} <br>
                da <a class="text-muted"
                    href="{{ route('article.byUser', $article->user) }}">{{ $article->user->name }}</a>
            </p>
            <a href="{{ route('article.show', $article) }}" class="btn btn-outline-secondary">Leggi</a>
        </div>

    </div>
</div>
