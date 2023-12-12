<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount; // Fix typo in namespace
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;


class DiscountCodeController extends Controller
{


    public function create()
    {
        return view('admin.coupan.create');
    }
public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'code' => 'required',
        'name' => 'required',
        'max_uses_user' => 'required',
        'max_uses' => 'required',
        'description' => 'required',
        'min_amount' => 'required',
        'discount_amount' => 'required|numeric',
        'status' => 'required',
        'starts_at' => 'required|date',
        'expires_at' => 'required|date|after:starts_at',
    ]);

    if ($validator->fails()) {
        return redirect()->route('coupan.create')->withErrors($validator)->withInput();
    }

    $discountcode = new Discount();
    $discountcode->code = $request->input('code');
    $discountcode->name = $request->input('name');
    // $discountcode->description = $request->input('description');
    $discountcode->max_uses = $request->input('max_uses');
    $discountcode->max_uses_user = $request->input('max_uses_user');
    $discountcode->discount_amount = $request->input('discount_amount');
    $discountcode->min_amount = $request->input('min_amount');
    // $discountcode->starts_at = Carbon::parse($request->input('starts_at'));
    // $discountcode->expires_at = Carbon::parse($request->input('expires_at'));

    if (!$discountcode->save()) {
        return redirect()->route('coupan.create')->with('error', 'Failed to save the discount code.');
    }

    return redirect()->route('coupan.create')->with('success', 'Discount code created successfully!');
}

}
