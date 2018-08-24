<table class="table table-striped table-hover" >

    <thead>
      <tr>
        <th>#</th>
        <th>De</th>
        <th>A</th>
        <th>Tasa de cambio</th>
      </tr>
    </thead>
    <tbody>

      @foreach($tasas as $tasa)
        <tr>
          <td>{{$n++}}</td>
          <td>{{$tasa->moneda1}}</td>
          <td>{{$tasa->moneda2}}</td>
          <td>{{$tasa->tasa}}</td>
        </tr>
      @endforeach

    </tbody>
</table>
