<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\userTransfer;
use App\Deposit;
use App\Transfer;
use App\User;
use App\Urls;
use Charts;

class HomeController extends Controller
{

    public function index(){

      $user = Auth::user();
      $id = $user->dni;

      $saldo = Deposit::where('user',$id)->sum('quantity');
      if ($saldo == 0) {
        $saldo =0;
      }
      $transferss =Transfer::user($id);
      switch ($user->rol) {
        case '1':
          $TransferChart = $this->ChartTransfer();
          $UserChart = $this->ChartUsers();

          return view('admin.index',compact('TransferChart','UserChart'));
          break;

        case 2:
          $data = 0;
          return view('home',compact('saldo','transferss','transfers','data'));
          break;

        default:
          # code...
          break;
      }

    }

    private function ChartTransfer()
    {

      $chartTransfer = Charts::database(Transfer::all(), 'line', 'highcharts')
      ->elementLabel("Transferencias")
      ->title('Transferencias mensuales')
      ->dimensions(600, 200)
      ->responsive(true)
      ->dateColumn('created_at')
      ->monthFormat('Y-n-j')
      ->groupByMonth();

      return $chartTransfer;
    }


    private function ChartUsers()
    {

      $chartUser = Charts::database(userTransfer::all(), 'pie', 'highcharts')
      ->elementLabel("Usuarios")
      ->title('Usuarios')
      ->dimensions(600, 200)
      ->responsive(true)
      ->groupBy('cantidad');

      return $chartUser;
    }



}
