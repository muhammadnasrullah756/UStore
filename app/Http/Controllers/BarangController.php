<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BarangController extends BaseController
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image'
        ]);

        if ($validator->fails()) {
            return $this->responseError('Please Fill all required fields',422, $validator->errors());
        }

        $params = [
            // 'user_id' => Auth::Id(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image,
        ];

        if($barang = Barang::create($params)) {
            $response = [
                'barang' => $barang
            ];
        return $this->responseOk($response);
        } else {
            return $this->responseError('Adding Product Failed', 400);
        }

    }

    public function show( )
    {
        $data = Barang::all();
        return response()->json(['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'image'
        ]);

        if ($validator->fails()) {
            return $this->responseError('Please Fill all required fields',422, $validator->errors());
        }

        $barang = Barang::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image,
        ]);

        $params = [
            // 'user_id' => Auth::Id(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image,
        ];

        $response = [
            'barang' => $params
        ];
        if($barang == true) {

        return $this->responseOk($response);
        } else {
            return $this->responseError('Update Product Failed', 400);
        }
    }

    public function destroy($id)
    {
        Barang::destroy($id);
        return $this->responseOk('Delete Success', 200);
    }
}
