<x-admin-layout>


    <div class="d-flex justify-content-between align-items-center">
        <h1>Les Publiciter</h1>
        <a href="{{ route('admin.post.create') }}" class="btn btn-success">Ajouter</a>
    </div>

    <div class="bd-example-snippet bd-code-snippet">
        <div class="bd-example">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Categorie</th>
                    <th scope="col" class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ Str::limit($post->title, 50, '...') }}</td>
                            <td>{{ ($post->category == null) ? '-' : $post->category->name }}</td>
                            <td class="d-flex gap-2 justify-content-end">
                                <form action="{{ route('admin.post.destroy',$post) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> Supprimer</button>
                                </form>
                                <a href="{{ route('admin.post.edit',$post)}}" class="btn btn-primary">Modifier</a>
                            </td>
                        </tr>
                        @php
                            $i = $i + 1;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $posts->links() }}
    </div>


</x-admin-layout>