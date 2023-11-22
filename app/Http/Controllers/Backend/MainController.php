<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $datas=Product::all();
        return view('Backend.index',compact('datas'));
    }
    public function add(){
        $category=Category::all();

        return view('Backend.add',compact('category'));
    }
    public function store(Request $request){
        $data=new Product();
        $data->name=$request->name;
        $data->desc=$request->desc;
        $data->price=$request->price;
        $data->cat_id=$request->cat_id;

        if ($request->file('image')) {
            $uploadFile = $request->file('image');
            $file_name = $uploadFile->hashName();
            $path = $uploadFile->move('product/', $file_name);
            $data['image'] = $file_name;
        }
        $data->save();
        return redirect()->route('index');
    }

    public function edit($id){
        $data=Product::find($id);
        $category=Category::all();

        return view('Backend.edit',compact('category','data'));
    }
    public function update(Request $request,$id){
        $data=Product::find($id);
        $data->name=$request->name;
        $data->desc=$request->desc;
        $data->price=$request->price;
        $data->cat_id=$request->cat_id;

        if ($request->file('image')) {
            $uploadFile = $request->file('image');
            $file_name = $uploadFile->hashName();
            $path = $uploadFile->move('product/', $file_name);
            $data['image'] = $file_name;
        }
        $data->save();
        return redirect()->route('index');
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        try {
            $product->delete();
            return response()->json(['success' => 'Product deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete product'], 500);
        }
    }
}
