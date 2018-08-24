<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\TasasUser;
use App\Transfer;
use App\Deposit;
use App\Moneda;
use App\Paises;
use App\Tasas;
use App\ViewMonedas;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transfer.index');
    }

    public function direct(){

      $user = Auth::user();
      $id = $user->dni;
      $monedas = ViewMonedas::all();
      $tasas = TasasUser::User($id);
      // dd($tasas);
        return view('transfer.direct',compact('monedas','tasas'));
    }

    public function email(){
        $user = Auth::user();
        $id = $user->dni;
        $monedas = Moneda::all();
        $saldo = Deposit::Saldo($id);
        $emails = Transfer::Email();
        $paises = Paises::all();
        if ($saldo->count()==0) {
          $saldo =0;
        }
        return view('transfer.email',compact('saldo','monedas','emails','paises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = Auth::user();
      $id = $user->dni;

      $saldo = Deposit::Saldo($id);

      $transfer = new Transfer();

      $transfer->user = $id;
      $transfer->cantidadB = $request['cantidad'];
      $transfer->nombresB=$request['nombres'];
      $transfer->apellidosB=$request['apellidos'];
      $transfer->emailB=$request['email'];
      $transfer->cuenta=$request['cuenta'];
      $transfer->banco=$request['banco'];
      $transfer->codigoTrans=$request['codigo'];

      $transfer->save();
      $trans=Transfer::all();
      $data1 = $trans->last()->toArray();

      Mail::send('emails.transfer', $data1, function($msj){

        $user = Auth::user();
        $msj->subject('Comprobante de transferencia');
        $msj->to($user->email,'laravelsoft575@gmail.com');
      });
      $transferss=$trans;
      $data = 0;
      return view('home',compact('saldo','transferss','data'));
    }

    public function postEmail(Request $request)
    {
      $user = Auth::user();
      $id = $user->dni;

      $saldo = Deposit::Saldo($id);

      $transfer = new Transfer();

      $transfer->user = $id;
      $transfer->cantidadB = $request['envia'];
      $transfer->emailB=$request['email'];
      $transfer->save();

      $saldo = $saldo - $request['envia'];
      $trans=Transfer::all();
      $data = $trans->last()->toArray();

      Mail::send('emails.transfer', $data, function($msj){

        $user = Auth::user();
        $msj->subject('Comprobante de transferencia');
        $msj->to($user->email,'laravelsoft575@gmail.com');
      });
      $data =0;
      $transferss = $trans;
      return view('home',compact('saldo','data','transferss'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transfers=Transfer::UserAll($id);
        $data = 1;
        return view('home',compact('transfers','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cant(Request $request){

      $envia = $request['envia'];
      $moneda = $request['moneda'];
      $recibe = $envia * 12000;
      return view('transfer.dataBen',compact('envia','recibe'));
    }
}
