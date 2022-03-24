<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $cart = Cart::where('user_id', Auth::Id())->get();
        return response()->json($cart, 200);
    }

    public function addcart(Request $request) {
        $validator = Validator::make($request->all(), [
            'user_id' => Auth::Id(),
            'barang_id' => 'required',
            'price' => 'integer'
        ]);

        if ($validator->fails()) {
            return $this->responseError('Please Fill All Fields', 422, $validator->errors());
        }

        $params = [
            'user_id' => Auth::Id(),
            'barang_id' => $request->barang_id,
            'price' => $request->price
        ];

        if($cart = Cart::create($params)) {
            $response = [
                'cart' => $cart
            ];
        return $this->responseOk($response);
        } else {
            return $this->responseError('Failed To Add Cart', 400);
        }
    }
}
