<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <style media="screen">
      body{background-color: #D2D7D3}
      .content{
        width: 40%;
        background-color: #fff;
        color: gray;
        margin: auto;
        border-radius: 5px;
        padding: 10px;
      }
      .content img{width: 50%;margin: 0 25%}
    </style>
  </head>
  <body>
    <div class="content">
      <img src="../../../assets/img/cloudlogo.png" alt="">
      <b><h3 class="h4">Trasnferencia de Fondos</h3></b>
      <table>
        <tr>
          <th>Fecha</th>
          <th>Hora</th>
          <th>Nro de Control</th>
        </tr>
        <tr>
          <td>{{$nombresB}}</td>
          <td>{{$nombresB}}</td>
          <td>{{$codigoTrans}}</td>
        </tr>
      </table>
      <p>Se transferiran: <span>{{$cantidadB}}</span></p>
      <p>A la cuenta: <span>{{$cuenta}}</span></p>
      <p>Beneficiario: <span>{{$nombresB}} {{$apellidosB}}</span></p>
    </div>
  </body>
</html>
