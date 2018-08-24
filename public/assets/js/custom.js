$(document).ready(function () {

  $('#cb').on('click', function () {$(this).addClass('active');$('#i').removeClass('active');$('#t').removeClass('active');$('#a').removeClass('active');});
  $('#i').on('click', function () {$(this).addClass('active');$('#cb').removeClass('active');$('#t').removeClass('active');$('#a').removeClass('active');});

    $('#t').on('click', function () {
        $(this).addClass('active');
        $('#i').removeClass('active');
        $('#cb').removeClass('active');
        $('#a').removeClass('active');
    });

    $('#a').on('click', function () {
        $(this).addClass('active');
        $('#i').removeClass('active');
        $('#t').removeClass('active');
        $('#cb').removeClass('active');
    });

    $('#banco').on('click', function () {
        $(this).addClass('active');
        $('#tarjetas').removeClass('active');
        $('#otros').removeClass('active');
    });

    $('#name').click(function(){
      $('#idName').hide();
      $('#editName').show();
      $('#idEmail').hide();
      $('#idPhone').hide();
      $('#clear-2').show();
      $('#title-2').text('Editar nombre');
    });

    $('#email').click(function(){
      $('#idName').hide();
      $('#editEmail').show();
      $('#idEmail').hide();
      $('#idPhone').hide();
      $('#clear-2').show();
      $('#title-2').text('Editar correo');
    });

    $('#phone').click(function(){
      $('#idName').hide();
      $('#idEmail').hide();
      $('#idPhone').hide();
      $('#editPhone').show();
      $('#clear-2').show();
      $('#title-2').text('Editar telefono');
    });

    $('#pasw').click(function(){
      $('#idCon').hide();
      $('#idRefe').hide();
      $('#idPais').hide();
      $('#editCon').show();
      $('#clear-1').show();
      $('#title').text('Cambibo de contraseña');
    });

    $('#pais').click(function(){
      $('#idCon').hide();
      $('#idRefe').hide();
      $('#idPais').hide();
      $('#editPais').show();
      $('#clear-1').show();
      $('#title').text('Cambio de pais');
    });

    $('#idioma').click(function(){
      $('#idIdioma').hide();
      $('#editIdioma').show();
    });

    $('#refe').click(function(){
      $('#idRefe').hide();
      $('#idPais').hide();
      $('#idCon').hide();
      $('#editRefe').show();
      $('#clear-1').show();
      $('#title').text('Link para suscripcion');
    });

    $('#clear-1').click(function(){
      $('#idRefe').show();
      $('#idPais').show();
      $('#idCon').show();
      $('#editRefe').hide();
      $('#editPais').hide();
      $('#editCon').hide();
      $('#regMoneda').hide();
      $('.btn-floating').hide();
      $('#title').text('Ajustes de cuenta');
    });

    $('#clear-2').click(function(){
      $('#idName').show();
      $('#idEmail').show();
      $('#idPhone').show();
      $('#idTasas').show();
      $('#editName').hide();
      $('#editEmail').hide();
      $('#editPhone').hide();
      $('#regMoneda').hide();
      $('#clear-2').hide();
      $('#showTasas').hide();
      $('#title-2').text('Informacion personal');

    });

    $('.close').click(function(){
      $('.alert').hide();
    });

    $('.datepicker').pickadate({
    format: 'd-m-yyyy',
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,

    monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Novienbre', 'Diciembre'],
    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    weekdaysFull: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'],
    weekdaysShort: ['Lun', 'Mar', 'Mie', 'Jev', 'Vie', 'Sab', 'Dom'],

    labelMonthNext: 'Siguiente mes',
    labelMonthPrev: 'Mes anterior',
    labelMonthSelect: 'Seleccionar mes',
    labelYearSelect: 'Seleccionar año',

    today: 'Hoy',
    clear: 'Limpiar',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
  });

  $('#moneda').change(function(){
    var moneda = $(this).val();
    var moneda2 = $('#moneda1').val();

    $.ajax({
      url: '/tasa/moneda/'+moneda+'/'+moneda2,
      method: 'get',
      success:function(data){
        $('#tasa').empty().html(data[0].tasa+' '+moneda);
        $('#tasas').val(data[0].tasa);

      }
    });



  });

  $('#recibe').click(function(){
    var envia  = $('#envia').val();
    var moneda = $('#tasas').val();
    if (moneda < 1.0) {
      var monto = envia / moneda;
    }else{
      var monto = envia * moneda;
    }

    var mont =  new Intl.NumberFormat(['en-US'], {
    currencyDisplay: "symbol",
    maximumFractionDigit: 1
    });

    $(this).val(mont.format(monto));
  });
//  MONEDAS

function obtenerDatos(){
  $.ajax({
    url: '/monedas',
    method: 'get',
    success:function(data){
      $('#tblMoneda').empty().html(data);
    }
  });
}

  $('#moneda').click(function(){
    $('#tblMoneda').empty().html('Cargando informacion.......');
    obtenerDatos();
    $('#idName').hide();
    $('#idTasas').hide();
    $('#editName').show();
    $('#idEmail').hide();
    $('#idPhone').hide();
    $('#clear-3').show();

  });

  $('#closeA').click(function(){
    $('#regMoneda').show();
  });
  $('#agreMoneda').click(function(){
    $('#regMoneda').show();
    $('#tblMoneda').hide();
  });


  $('#monedaForm').on('submit', function(e) {
       e.preventDefault();
       var pais = $('#pais').val();
       var signo = $('input[name="signo"]').val();
       var codigo = $('input[name="codigo_iso"]').val();
       var _token = $('input[name="_token"]').val();
       var host = '/Monedas';
       // console.log(codigo);
       $.ajax({
           type: "POST",
           url: host,
           data: {pais:pais, signo:signo, codigo:codigo ,_token:_token},
           success: function(msj,data2) {
             Materialize.toast(msj,4000);
               $('#regMoneda').hide();
               obtenerDatos();
               $('#tblMoneda').show();
               $(this).reset();
           }
       });
   });

// TASAS DE CAMBIO

  function obtenerData(url, tbl){
    $.ajax({
      url: '/'+url,
      method: 'get',
      success:function(data){
        $('#'+tbl).empty().html(data);
      }
    });
  }

  $('#clear-3').click(function(){
    $('#tblTasas').hide();
    $('#tblMoneda').hide();
    $('#agreMoneda').hide();
    $('#createTasa').hide();
    $('#newTasa').hide();
    $('#idTasas').show();
    $('#idName').show();
    $(this).hide();
  });

   $('#tasaForm').on('submit', function(e) {
        e.preventDefault();
        var tasa = $('input[name="tasa_de_cambio"]').val();
        var moneda1 = $('#moneda1').val();
        var moneda2 = $('#moneda2').val();
        var _token = $('input[name="_token"]').val();
        var host = '/settings/tasas';
        // console.log(codigo);
        $.ajax({
            type: "POST",
            url: host,
            data: {tasa:tasa, moneda1:moneda1, moneda2:moneda2 ,_token:_token},
            success: function(msj,data2) {
              Materialize.toast(msj,4000);
                $('#createTasa').hide();
                obtenerData('tasas','tblTasas');
                $('#tblTasas').show();
            }
        });
    });

    $('#tasas').click(function(e){
      e.preventDefault();
      obtenerData('tasas','tblTasas');
      $('#showTasas').show();
      $('#clear-3').show();
      $('#idTasas').hide();
      $('#idName').hide();
      $('#createTasa').hide();
    });

    $('#newTasa').click(function(e){
      e.preventDefault();
      $('#tblTasas').hide();
      $('#createTasa').show();
    });

    $('#closeTasa').click(function(e){
      e.preventDefault();
      $('#createTasa').show();
      $(this).hide();
    });

// USUARIOS
      obtenerData('admin/usersAll','tblUsers');


//

    $('#showCorreos').click(function(){
      $('#correos').show();
      $(this).hide();
      $('#X').show()
    });

    $('.li').click(function(){
      var data = $(this).text();
      $('#inputEmail').val(data);
      $('#correos').hide();
      $('#inputEmail').focus();
    });


    $('#envia').number( true, 2 );

});
