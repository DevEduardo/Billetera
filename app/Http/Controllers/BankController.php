<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\CuentasBancarias;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $id = $user->dni;

        $cuentas = CuentasBancarias::Dni($id);
        $count = $cuentas->count();
        return view('bank.index',compact('cuentas','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank.createBank');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cuenta = new CuentasBancarias();

        $user = Auth::user();
        $id = $user->dni;

        $cuenta->pais   = $request['pais'];
        $cuenta->numero = $request['Ncuenta'];
        $cuenta->swift  = $request['swift'];
        $cuenta->dni    = $id;

        $cuenta->save();

        $cuentas = CuentasBancarias::Dni($id);
        $count = $cuentas->count();
        \Session::flash('flash_message', 'Cuenta registrada de manera exitosa!!');
        return view('bank.index',compact('cuentas','count'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
      $cuenta = CuentasBancarias::find($id);
      $cuenta->delete();
      return redirect('/Bank');
    }
}
