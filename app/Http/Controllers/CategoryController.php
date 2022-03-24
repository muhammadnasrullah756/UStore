<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends BaseController
{
    public function index() {
        $category = Category::all();
        return $this->responseOk($category,200);
    }

    public function createcategory(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string'
        ]);

        if ($validator->fails()) {
            return $this->responseError('Please Fill Required Fields', 422, $validator->errors());
        }

        $params = [
            'name' => $request->name
        ];

        if($category = Category::create($params)) {
            $response = [
                'category' => $category
            ];
        return $this->responseOk($response);
        } else {
            return $this->responseError('Failed To Add Category',400);
        }
    }

}
