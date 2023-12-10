<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Shipping;
use Illuminate\Support\Facades\Validator;

class ShippingController extends Controller
{
    public function create(){
        $countries=Country::get();
        $data['countries']=$countries;
        $shippingcharges=Shipping::select('shipping_charges.*','countries.name')->
        leftJoin('countries','countries.id','shipping_charges.country_id')->get();
        $data['shippingcharges']=$shippingcharges;

        return view('admin.shipping.create',$data);

        }
public function store(Request $request)
{

    $validator = Validator::make($request->all(), [
        'country' => 'required',
        'amount' => 'required|numeric'
    ]);

    if ($validator->passes()) {
          $count=Shipping::where('country_id',$request->country)->count();

if($count>0){
  session()->flash('error', 'Shipping already added');
            return redirect()->route('shipping.create');
    }
        $shipping = new Shipping;
        $shipping->country_id = $request->country;
        $shipping->amount = $request->amount;
        $shipping->save();
        session()->flash('success', 'Shipping added successfully');
        return redirect()->route('shipping.create');
    } else {
        // Validation failed, so return the view with errors and countries
        return view('shipping.create')->withErrors($validator)->with('countries', Country::get());
    }
}
    public function edit($id){
        $shippingcharge=Shipping::find($id);
 $countries=Country::get();
        $data['countries']=$countries;
        $data['shippingcharge']=$shippingcharge;
        return view('admin.shipping.edit',$data);
    }
public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'country' => 'required',
        'amount' => 'required|numeric'
    ]);

    if ($validator->passes()) {
        $shipping = Shipping::find($id);
        $shipping->country_id = $request->country;
        $shipping->amount = $request->amount;
        $shipping->save();
       session()->flash('success', 'Shipping updated successfully');
        return redirect()->route('shipping.create');
    } else {
        // Validation failed, so return the view with errors and countries
        return view('shipping.edit', ['countries' => Country::get(), 'shippingcharge' => Shipping::find($id)])
            ->withErrors($validator);
    }
}
public function delete($id){
          $shippingcharge=Shipping::find($id);
          if($shippingcharge==null){
   session()->flash('error', 'Shipping not found');

        }
 $shippingcharge->delete();
    session()->flash('success', 'Shipping deleted successfully');
        return redirect()->route('shipping.create');

}

}
