<x-layout title="{{$category->name}}">
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">{{$category->name}}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row gap-4 justify-content-center">
            @foreach ($articles as $article)
                <x-article-card :$article />
            @endforeach
        </div>
    </div>
</x-layout>