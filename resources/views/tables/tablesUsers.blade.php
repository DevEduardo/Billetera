
<table class="table table-striped table-hover" >
  <thead>
    <tr>
      <th>Fecha de solicitud</th>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
      <tr>
        <td>{{Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>  <a href="{{url('admin/user/'.$user->id)}}" class="waves-effect waves-light btn" >Confirmar suscripcion</a>
        </td>
    </tr>
    @endforeach
  </tbody>
  </table>
