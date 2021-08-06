<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminRequestProduct;
use App\Product;
use App\ProductType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::whereRaw(1);
        if ($id = $request->id) {
            $products->where('id', $id);
        }
        if ($name = $request->n) {
            $products->where('name', 'like','%'.$name.'%');
        }

        $products = $products->paginate(10);
        $viewData = [
            'products' => $products,
            'query'    => $request->query()
        ];
        return view('admin.product.index', $viewData);
    }

    public function create()
    {
        $product_types = ProductType::get();
        return view('admin.product.create',compact('product_types'));
    }

    public function store(Request $requestProduct)
    {
        $this->insertOrUpdate($requestProduct);
        return redirect()->route('admin.get.product.list');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $product_types = ProductType::get();
        return view('admin.product.update', compact('product','product_types'));
    }

    

    public function insertOrUpdate($request, $id='')
    {
        $product_types = ProductType::get();
        $data = $request->except('_token','_method','image');
        try{
            if ($request->hasFile('image'))
            {
                $file = $request->image;
                $file->move('source/image/product/', $file->getClientOriginalName());
                $data['image'] = $file->getClientOriginalName();
            }

            $data['status'] = 1;
            if (!$id) {
                $product = Product::insert($data);
            }else {
                $product = Product::findOrFail($id)->update($data);
            }

            
        }catch (Exception $exception)
        {
            dd($exception);
        }
    }

    public function update(Request $requestProduct, $id)
    {
        $this->insertOrUpdate($requestProduct, $id);
        return redirect()->route('admin.get.product.list');
    }


    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('admin.get.product.list');
    }
}
