<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use MediaUploadingTrait;
    protected $products;
    protected $categories;
    public function __construct(Product $product, Category $category)
    {
        $this->products = $product;
        $this->categories = $category;
    }
    public function index()
    {
        $products = $this->products->all();
        return view('admin.product.index', compact(['products']));
    }


    public function create()
    {
        $categories = $this->categories->all();
        return view('admin.product.create', compact('categories'));
    }


    public function store(StoreProductRequest $request)
    {
        // dd($request->all());
        $product = $this->products->create($request->all());


        if ($request->input('image', false)) {
            $filePath = $request->input('image');
            $product->addMedia(storage_path('tmp/uploads/' . $filePath))->toMediaCollection('image');
        } else {
            dd("File does not exist at path: " . $filePath);
        }
        return redirect()->route('admin.product.index')->with('message', 'product Created Successfully');
    }


    public function show($id)
    {
        $product = $this->products->findOrFail($id);

        return view('admin.product.show', compact(['product']));
    }


    public function edit($id)
    {
        $product = $this->products->with('media')->findOrFail($id);
        $categories = $this->categories->all();
        return view('admin.product.edit', compact(['product','categories']));
    }


    public function update(UpdateProductRequest $request, $id)
    {
        $product = $this->products->findOrFail($id);
        $product->update($request->all());
        return redirect()->route('admin.product.index')->with('message', ' product Updated Successfully');
    }


    public function destroy($id)
    {
        $product = $this->products->findOrFail($id);

        $product->delete();
        return redirect()->route('admin.product.index')->with('message', 'product Deleted successfully');
    }
}
