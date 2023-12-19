<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiscountCoupan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class DiscountCodeController extends Controller
{
    // VIEW
  public function index(Request $request)
{
    $discount = DiscountCoupan::latest();

    if (!empty($request->get('keyword'))) {
        $discount = $discount->where('name', 'like', '%' . $request->get('keyword') . '%');
    }

    // Pass the $discounts variable to the view
    return view('admin.coupan.list', compact('discount'));
}
    // CREATE

    public function create(){
    return view('admin.coupan.create');
    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
        'code'=>'required',
        'name'=>'required',
        'description'=>'required',
        'max_uses'=>'required',
        'max_uses_user'=>'required',
        'discount_amount'=>'required|numeric',
        'min_amount'=>'required|numeric',
        ]);
        //starting date must be greater than current date
        if ($validator->passes()) {
        // Starting date must be greater than the current date
        if (!empty($request->starts_at)) {
            $now = Carbon::now();
            $startsAt = Carbon::createFromFormat('Y-m-d H:i:s', $request->starts_at);
            if ($startsAt->gt($now) == false) {
                return response()->json([
                    'status' => false,
                    'errors' => ['starts_at' => 'Start date can not be less than the current time']
                ]);
            }
        }
        // Expiration date must be greater than the current date
        $expiresAt = Carbon::createFromFormat('Y-m-d H:i:s', $request->expires_at);
        if ($expiresAt->gt(Carbon::now()) == false) {
        return response()->json([
        'status' => false,
        'errors' => ['expires_at' => 'Expiration date must be greater than the current time']
            ]);
        }
        $discountCode=new DiscountCoupan();
        $discountCode->code=$request->code;
        $discountCode->name=$request->name;
        $discountCode->description=$request->description;
        $discountCode->max_uses=$request->max_uses;
        $discountCode->max_uses_user=$request->max_uses_user;
        $discountCode->type=$request->type;
        $discountCode->discount_amount=$request->discount_amount;
        $discountCode->min_amount=$request->min_amount;
        $discountCode->status=$request->status;
        $discountCode->starts_at=$request->starts_at;
        $discountCode->expires_at=$request->expires_at;
        $discountCode->save();
        $message='Discount Coupan Added Successfully';
        session()->flash('success',$message);
        return view('admin.coupan.list');
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }
    // EDIT
    public function edit($id,Request $request){
    $discount=DiscountCoupan::find($id);
    if(empty($discount)){
    return redirect()->route('coupan.list');
}
    return view('admin.coupan.edit',compact('discount'));
    }
    public function update(Request $request, $id)
    {
    $validator = Validator::make($request->all(), [
    'code'=>'required',
    'name'=>'required',
    'description'=>'required',
    'max_uses'=>'required',
    'max_uses_user'=>'required',
    'discount_amount'=>'required|numeric',
    'min_amount'=>'required|numeric',
]);

     if ($validator->fails()) {
    return redirect()->back()->withErrors($validator)->withInput();
}
    $discount = DiscountCoupan::find($id);
    if (empty($discount)) {
        return redirect()->route('coupan.list');
    }
    $discount->code = $request->code;
    $discount->name = $request->name;
    $discount->description = $request->description;
    $discount->max_uses = $request->max_uses;
    $discount->max_uses_user = $request->max_uses_user;
    $discount->type = $request->type;
    $discount->discount_amount = $request->discount_amount;
    $discount->min_amount = $request->min_amount;
    $discount->status = $request->status;
    $discount->starts_at = $request->starts_at;
    $discount->expires_at = $request->expires_at;
    $discount->save();

    return redirect()->route('coupan.list')->with('success','Coupan Updated Successfully!');
}
    public function delete($id)
    {
    $discount = DiscountCoupan::find($id);
    if (empty($discount)) {
        return redirect()->route('coupan.list');
    }
    $discount->delete();
    return redirect()->route('coupan.list')->with('danger', 'Coupon Deleted Successfully');
}

}
