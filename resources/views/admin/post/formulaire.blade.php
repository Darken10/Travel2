<x-admin.layout>
    <div class="jumbotron">
        <h1 class="display-3">{{$post->exists ? 'Modifier le Pub' : 'Créer un Pub'}}</h1>
    </div>


    <form class="mb-5 " action="{{ $post->exists ? route('admin.post.update',$post) : route('admin.post.store') }}" method="post">
        @csrf
        @method($post->exists ? 'PUT' : 'POST')

        <div class="row">
            <x-admin.input label="Titre : "  name="title" placeholder="Un Titre " :value="$post->title" required />
        </div>
        <div class="row">
            <x-admin.input type="textarea" label="Contenu de l'article" name="content" placeholder="contenu de l'article " :value="$post->content"  />
        </div>


        <img src="{{ $post->image }}">
        <br>
        <x-admin.input label="Changer de photo : " name="image" type="file" placeholder="Un-slug "  />
{{--  

        <x-admin.select label="Categorie" name="category" :options="App\Models\Category::pluck('name','id')" :value="$post->category_id" />
        <x-admin.select label="Etiquettes " name="tag" :options="App\Models\Tag::pluck('name','id')" :value="$post->tags->pluck('id')" multiple />

--}}
        <div class="mt-5">
            <button type="submit" class="btn btn-primary">{{ $post->exists ? 'Modifier' : 'Créer' }}</button>
        </div>
    </form>



</x-admin.layout>
