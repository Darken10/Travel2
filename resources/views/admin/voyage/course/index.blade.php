<x-admin.layout>


    <div class="d-flex justify-content-between align-items-center">
        <h1>Les courses</h1>
        <a href="{{ route('admin.voyage.course.create') }}" class="btn btn-success">Ajouter</a>
    </div>

    <div class="bd-example-snippet bd-code-snippet">
        <div class="bd-example">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Depart</th>
                    <th scope="col">Destination</th>                    
                    <th scope="col">Distance</th> 
                    <th scope="col">Heure Depart</th>
                    <th scope="col">Heure Arriver</th>                   
                    <th scope="col" class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($courses as $course)
                        <tr>
                            <th scope="row" >{{ $i }}</th>
                            <td>{{ $course->ligne->depart->name }} ({{ $course->ligne->depart->pays->name }})</td>
                            <td>{{ $course->ligne->destination->name }} ({{ $course->ligne->destination->pays->name }})</td>
                            <td> 0 km</td>
                            <td>{{ $course->heure_depart }} </td>
                            <td>{{ $course->heure_arriver }} </td>
                            
                          

                            <td class="d-flex gap-2 justify-content-end">
                                <form action="{{ route('admin.voyage.course.destroy',$course) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> Supprimer</button>
                                </form>
                                <a href="{{ route('admin.voyage.course.edit',$course)}}" class="btn btn-primary">Modifier</a>
                            </td>
                        </tr>
                        @php
                            $i = $i + 1;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $courses->links() }}
    </div>


</x-admin.layout>