<x-layout>
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                @if (session('message'))
                    <div class="alert alert-success">
                    </div>
                @endif
                <h1 class="display-1">Tutti gli articoli per </h1>
            </div>
        </div>
    </div>

    <div class="container my-5 ">
        <div class="row gap-4 justify-content-center">
            @foreach ($articles as $article)
                <x-article-card :$article />
            @endforeach
        </div>
    </div>

</x-layout>
