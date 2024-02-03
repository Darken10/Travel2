<x-layout>
   
    <div>
        <form method="post" class="row">
            @csrf
            <x-input name="compagnie" placeholder="Compagnie..." class="gap-2 "/>
            <x-input name="depart" placeholder="Depart..." class="ok"/>
            <x-input name="destination" placeholder="Destination..." class="ok"/>
            <x-input name="heure" type="time" placeholder="Heure..." class="ok"/>
           <x-btn-primary>Rechercher</x-btn-primary>
        </form>
    </div>
    <div>
        <table>
            <thead>
                <tr>
                    <th>Compagnie</th>
                    <th>Depart</th>
                    <th>Destination</th>
                    <th>Distance</th>
                    <th>Heure Depart</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($voyages as $voyage)
                    <tr>
                        <td><b>{{ $voyage->compagnie->sigle }}</b></td>
                        <td>{{ $voyage->depart()->name }}</td>
                        <td>{{ $voyage->destination()->name }}</td>
                        <td>{{ $voyage->distance() ?? '0' }} Km</td>
                        <td>{{ $voyage->heureDepart() }}</td>
                        <td>
                            <form action="{{ route('voyage.ticket.acheter',$voyage) }}" method="post">
                                @csrf
                                <button >acheter</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
</x-layout>