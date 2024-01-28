<x-admin.layout>
    <div class="jumbotron">
        <h1 class="display-3">{{$course->exists ? 'Modifier Une Course' : 'Créer Une Course'}}</h1>
    </div>


    <form class="mb-8 " action="{{ $course->exists ? route('admin.voyage.course.update',$course) : route('admin.voyage.course.store') }}" method="post">
        @csrf
        @method($course->exists ? 'PUT' : 'POST')

        <div class="row">
            <div class="col-sm-6">
                <x-admin.select label="Ville de Depart" name="depart_id" :options="App\Models\Root\Ville::pluck('name','id')" :value="$course->exists ? $course->ligne->depart_id : null " />
            </div>
            <div class="col-sm-6">
                <x-admin.select label="Destination " name="destination_id" :options="App\Models\Root\Ville::pluck('name','id')" :value="$course->exists ? $course->ligne->destination_id : null" />
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-6">
                <x-admin.input label="Heure Depart " type='time' name="heure_depart"  :value="$course->heure_depart" />
            </div>
            <div class="col-sm-6">
                <x-admin.input label="Heure Arriver " type='time' name="heure_arriver" :value="$course->heure_arriver" />
            </div>
            
        </div>
        
        
        {{--
            <div class="row">
            <x-admin.input type="textarea" label="Contenu de l'article" name="content" placeholder="contenu de l'article " :value="$post->content"  />
        </div>
        --}}


{{--  

        <x-admin.select label="Etiquettes " name="tag" :options="App\Models\Tag::pluck('name','id')" :value="$post->tags->pluck('id')" multiple />

--}}
        <div class="mt-5">
            <button type="submit" class="btn btn-primary">{{ $course->exists ? 'Modifier Une Course' : 'Créer Une Course' }}</button>
        </div>
    </form>



</x-admin.layout>
