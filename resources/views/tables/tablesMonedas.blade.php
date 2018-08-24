<table class="table table-striped table-hover" >

    <thead>
      <tr>
        <th>#</th>
        <th>Signo</th>
        <th>Pais</th>
        <th>Abreviatura</th>
        <th>Accion</th>
      </tr>
    </thead>
    <tbody>

      @foreach($monedas as $moneda)
        <tr>
          <td>{{$n++}}</td>
          <td>{{$moneda->signo}}</td>
          <td>
            @foreach($paises as $pais)
              @if($pais->id == $moneda->pais)
                {{$pais->nombre}}
              @endif
            @endforeach
          </td>
          <td>{{$moneda->abreviatura}}</td>
          <td>edit</td>
        </tr>
      @endforeach

    </tbody>
</table>
