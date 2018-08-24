<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Requests\UserRequest;

use App\Paises;
use App\User;
use App\rol;
use App\Urls;

use Validator;
use Hash;
use Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      $users = User::FilterAndPginate($request->get('var'),$request->get('cod'));

        return view('users.index')->with('users', $users);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $urlactual = \Request::fullUrl();
        $urls = Urls::all();
        foreach ($urls as $url) {
          if ($url->url == $urlactual) {
              $rol = ['1','2'];
              $paises = Paises::all();
              return view('users.create',compact('paises','rol'));
          }else{
            return view('errors.503');
          }
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file( 'file' );;
// dd($file);
        \Storage::disk('local')->put($request['cedula_o_pasaporte'].'.jpg',  \File::get($file));

        $user = new User();
        $user->di    = $request['cedula_o_pasaporte'];
        $user->rif    = $request['rif'];
        $user->foto    = $request['cedula_o_pasaporte'].'jpg';
        $user->name     = $request['nombres'];
        $user->email    = $request['correo'];
        $user->username = $request['usuario'];
        $user->password = Hash::make($request['contraseña']);
        $user->rol      = 2;
        $user->phone    = $request['telefono'];
        $user->pais     = $request['pais'];
        $user->dni      = generateCode(8);
        $user->save();

        $trans=User::all();
        $data1 = $trans->last()->toArray();
        $url = new Urls();
        $url->url = url('users/create/'.$data1->dni);
        $url->status = 1;
        $url->save();

        Mail::send('emails.registro', $data1, function($msj){

          $user = Auth::user();
          $msj->subject('Pre-registros en CloudMoney');
          $msj->to($request['correo'],'laravelsoft575@gmail.com');
        });


        return view('users.Xconfir');

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
      $rol  = Rol::all();
      $data = User::find($id);
      return view('users.edit')->with('data',$data)->with('rol', $rol);
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
      $user = User::find($id);

      switch ($request['data']) {
        case 0:
          $user->name = $request['name'];
          $user->save();
          return redirect()->back();
          break;
        case 1:
          $user->email = $request['email'];
          $user->save();
          return redirect()->back();
          break;
        case 2:
          $user->phone = $request['phone'];
          $user->save();
          return redirect()->back();
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
      $user = User::find($id);
      $user->delete();
      return redirect('/users');
    }

}
