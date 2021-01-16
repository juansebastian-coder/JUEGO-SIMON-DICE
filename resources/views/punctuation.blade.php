@if (count($games)>0)
    <div class="container">
        <table class="table table-bordered table-hover  text-center">
    <thead class="bg-info text-white font-weight-bold">
    <tr>
        <td>Fecha</td>
        <td>Usuario</td>
        <td>Nivel</td>
        <td>Puntaje</td>
    </tr>
    </thead>
    <tbody class="bg-light">
        @foreach ($games as $item)
            <tr>
                <td>{{$item->created_at}}</td>
                <td>{{$item->user->name}}</td>
                <td>{{$item->level}}</td>
                <td>{{$item->punctuation}}</td>
            </tr>
        @endforeach
    </tbody>

</table>
    </div>

    
@endif


  