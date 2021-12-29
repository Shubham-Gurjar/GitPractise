<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemList;
use Illuminate\Support\Facades\Auth;
use DB;
class AddOrderController extends Controller
{

      public function itemfunc(){
          $item=ItemList::all(); //get data from table
          return view('addorder',compact('item')); //send data from view
      }

      public function findPrice(Request $request){

		//it will get price if its id match with product id
		        $p=ItemList::select('item_rate')->where('item_id',$request->item_id)->first();

    	return response()->json($p);
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $itemid=$request->input('item_id');
        $qty=$request->input('quantity');
        $rate=$request->input('rate');
        $id=  Auth:: user() -> id ;
        $data = array('item_id'=> $itemid,'qty'=>$qty,'rate'=>$rate,'user_id'=>$id);
        DB::table('orders')->insert($data);
        return back()->with('success','order Created Successfully');
  //  $request->session()->flash('alert-success', 'User was successful added!');
  //  return redirect()->route('home');





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   }
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
        //
    }
}
