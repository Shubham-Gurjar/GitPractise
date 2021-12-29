<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use Charts;
use Illuminate\Support\Facades\Auth;
class ReportController extends Controller
{


    public function projectsChartData()
    {
      /*$rate = Product::select(DB::raw("SUM(rate) as total"))

      ->orderBy("date")

      ->groupBy(DB::raw("date(date)"))

      ->get()->toArray();

  $rate = array_column($rate, 'rate');*/



 }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id=  Auth::user()->id ;
      $rate=DB::table('orders')
      ->select(DB::raw('DATE(date) as label'),DB::raw('SUM(rate) as y'))
      ->where('user_id',$id)
      ->groupBy('label')
      ->get()
      ->toArray();

      $str=$rate;

      /*$qty=DB::table('orders')
      ->select(DB::raw('SUM(qty) as y'),'item_id')
      ->groupBy('item_id')
      ->get()
      ->toArray();*/
      $id=  Auth::user()->id ;

      $qty= DB::select(DB::raw("SELECT item_id, SUM(qty) as y, item.item_name as label from orders NATURAL JOIN item where user_id='$id.%' group by item_id "));


      $bar= DB::select(DB::raw("SELECT item_id, SUM(rate) as y, item.item_name as label from orders NATURAL JOIN item  where user_id='$id.%' group by item_id "));



  //  return view('report', ['str' => $str], ['qty' => $qty], ['bar' => $bar]);
       return view('report')->with('str',$str)->with('qty',$qty)->with('bar',$bar);
    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      /*$sales= DB::table('orders')
        ->select(DB::raw('DATE(date) as date'), DB::raw('SUM(rate) as total'))
        ->groupBy('date')
        ->get();*/
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
}
