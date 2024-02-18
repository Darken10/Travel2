<div class=" mx-auto justify-center max-w-lg border-t-4 border-blue-600 bg-white shadow-lg rounded-lg">
    <div class=" text-center mb-2"> 
        <span class="text-lg font-semibold capitalize">{{ $ticket->compagnie->sigle }} </span>
        <span class=" text-lg capitalize italic ">({{ $ticket->compagnie->name }})</span>
    </div>
    <div class="  my-2 flex mx-auto justify-center ">
        <img src="{{ asset('image/image.jpg') }}" alt="" class=" rounded" >
    </div>
    
    <hr >
    <div class=" text-center my-3">
        <span class=" text-2xl font-bold font-sans capitalize">{{ $ticket->numero }}</span>
    </div>

    <div class=" flex mx-auto justify-center">
        <table>
            <tr>
                <td class="flex justify-end">Depart : </td>
                <td class="pl-3"> {{ $ticket->depart()->name }}</td>
            </tr>
            <tr>
                <td class="flex justify-end">Destination : </td>
                <td class="pl-3"> {{ $ticket->destination()->name }}</td>
            </tr>
            
        </table>
    </div>



</div>
