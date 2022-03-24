<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Barang;
use Illuminate\Support\Facades\Validator;
use App\Category;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function error() {
        return view('error');
    }

    public function users() {
        $user = User::all();
        return view('admin.users.list', [
            'users' => $user,
        ]);
    }

    public function barangs() {
        $barang = Barang::all();
        return view('admin.barang.list', [
            'barangs' => $barang,
        ]);
    }

    public function createbarang() {
        return view('admin.barang.add');
    }

    public function createbuyer() {
        return view('admin.users.buyer');
    }

    public function createseller() {
        return view('admin.users.seller');
    }

    //Users

    public function storeuser(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email:dns',
            'password' => 'required|confirmed',
            // 'no_telp' => 'string',
            // 'address' => 'string',
            'roles' => 'required'
        ]);

        $request['password'] = bcrypt($request['password']);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            // 'no_telp' => $request->no_telp,
            // 'address' => $request->address,
            'password' => $request->password,
            'roles' => $request->roles
        ]);

        return redirect('/users')->with('status', 'Berhasil Tambah User');
    }

    public function edituser($id) {
        $user = User::find($id);
        return view('admin.users.edit',[
            'user' => $user
        ]);
    }

    public function updateuser(Request $request, $id) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'roles' => 'required'
        ]);

        $request['password'] = bcrypt($request['password']);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'roles' => $request->roles
        ]);

        return redirect ('/users')->with('status', 'Berhasil Update User');
    }

    public function deleteuser($id)
    {
        User::destroy($id);
        return redirect('/users')->with('status', 'User Berhasil dihapus');
    }

    //Barang

    public function storebarang(Request $request) {
        // $request->validate([
        //     'name' => 'required|string',
        //     'description' => 'text',
        //     'price' => 'integer',
        //     'image' => 'image'
        // ]);

        Validator::make($request->all(),[
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image'
        ]);

        // $request['password'] = bcrypt($request['password']);

        Barang::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image
        ]);
        // Barang::create([$validator]);

        return redirect('/barang/list')->with('status', 'Berhasil Tambah Barang');
    }

    public function editbarang($id) {
        $barang = Barang::find($id);
        return view('admin.barang.edit',[
            'barang' => $barang
        ]);
    }

    public function updatebarang(Request $request, $id) {
        // $request->validate([
        //     'name' => 'required|string',
        //     'description' => 'text',
        //     'price' => 'require|integer',
        //     'image' => 'image'
        // ]);

        Validator::make($request->all(),[
            'name' => 'required|string',
            'description' => 'text',
            'price' => 'integer',
            'image' => 'required|image'
        ]);

        // $request['password'] = bcrypt($request['password']);

        Barang::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image
        ]);

        return redirect ('/barang/list')->with('status', 'Berhasil Update Barang');
    }

    public function deletebarang($id)
    {
        Barang::destroy($id);
        return redirect('/barang/list')->with('status', 'Barang Berhasil dihapus');
    }


    //Category

    public function category() {
        $category = Category::all();
        return view('admin.category.list', ['categories' => $category]);
    }

    public function addcategory() {
        return view('admin.category.add');
    }

    public function storecategory(Request $request) {
        Validator::make($request->all(), [
            'name' => 'required|string',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect('/category')->with('status', 'Successfully Add Category');
    }

    public function editcategory($id) {
        $category = Category::find($id);
        return view('admin.category.edit', ['category' => $category]);
    }

    public function updatecategory(Request $request, $id) {
        Validator::make($request->all(),[
            'name' => 'required|string'
        ]);

        Category::where('id', $id)->update([
            'name' => $request->name
        ]);
        return redirect('/category')->with('status', 'Successfully Update Category');
    }

    public function deletecategory($id) {
        Category::destroy($id);
        return redirect('/category')->with('status', 'Successfully');   

    }
}
