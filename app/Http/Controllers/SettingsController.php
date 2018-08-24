<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Moneda;
use App\Paises;
use App\User;
use App\Tasas;
use App\ViewMonedas;
use Validator;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $paises = Paises::all();
        return view('users.settings',compact('paises','settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
      $n = 1;
      $paises  = Paises::all();
      $monedas = ViewMonedas::all();
      $tasas   = Tasas::all();
      $count   = $monedas->count();
      $count2  = $tasas->count();
      return view('admin.settings',compact('monedas','paises','pais','n','count','count2'));
    }


    public function getMonedas()
    {
      $n=1;
      $paises  = Paises::all();
      $monedas = Moneda::all();
      $count   = $monedas->count();
      return view('tables.tablesMonedas',compact('monedas','n','paises'));
    }

    public function showTasas()
    {
      $n=1;
      $tasas = Tasas::all();
      $count   = $tasas->count();
      return view('tables.tablesTasas',compact('tasas','n'));
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTasas(Request $request)
    {
      $tasa = new Tasas();
      $tasa->moneda1 = $request['moneda1'];
      $tasa->moneda2 = $request['moneda2'];
      $tasa->tasa = $request['tasa'];
      $tasa->save();

      $msj = 'Tasa ingresada correctamente';
      return response()->json($msj);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showMonedas($id)
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

        $user = Auth::user();
        $id = $user->dni;
        $settings = User::id($id);
        switch ($request['data']) {
          case '1':
            $settings->pais = $request['pais'];
            $settings->save();
            \Session::flash('flash_message', 'Pais modificado de manera exitosa!!');
            return redirect()->to('user/settings');
            break;
            case '2':
              if ($request['nueva_contrseña'] == $request['confirmar_contraseña']) {
                $settings->password = \Hash::make($request['nueva_contrseña']);
                $settings->save();
                \Session::flash('flash_message', 'Contraseña modificado de manera exitosa!!');
                return redirect()->to('user/settings');
              }else{
                \Session::flash('flash_message', 'Las contraseñas no coinciden');
                return redirect()->to('user/settings');
              }

              break;
              case '3':
                $settings->name = $request['nombres'];
                $settings->save();
                \Session::flash('flash_message', 'Nombre modificado de manera exitosa!!');
                return redirect()->to('user/settings');
                break;
                case '4':
                  $settings->email = $request['correo'];
                  $settings->save();
                  \Session::flash('flash_message', 'Correo modificado de manera exitosa!!');
                  return redirect()->to('user/settings');
                  break;
                  case '5':
                    $settings->phone = $request['telefono'];
                    $settings->save();
                    \Session::flash('flash_message', 'Telefono modificado de manera exitosa!!');
                    return redirect()->to('user/settings');
                    break;

          default:
            # code...
            break;
        }

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
}
