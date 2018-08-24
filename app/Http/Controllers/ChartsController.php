<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ChartsController extends Controller
{
  public function ChartTransfer()
  {

    $chartTransfer = Charts::database(Transfer::all(), 'area', 'highcharts')->elementLabel("Total")
    ->elementLabel("Transferencias")
    ->dimensions(600, 200)
    ->responsive(true)
    ->dateColumn('created_at')
    ->monthFormat('Y-n-j')
    ->groupByMonth();

    return $chartTransfer;
  }
}
