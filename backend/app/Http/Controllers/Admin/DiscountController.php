<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    protected $discounts;
    protected $products;
    public function __construct(Discount $discount, Product $product)
    {
        $this->discounts = $discount;
        $this->products = $product;
    }
    public function index()
    {
        $discounts = $this->discounts->with(['product'])->get();
        return view('admin.discount.index', compact(['discounts']));
    }


    public function create()
    {
        $products = $this->products->all();
        return view('admin.discount.create', compact('products'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string',
            'percentage' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);
        $discount = $this->discounts->create($validatedData);
        return redirect()->route('admin.discount.index')->with('message', 'Discount Created Successfully');
    }


    public function show($id)
    {
    $discount = $this->discounts->with(['product'])->findOrFail($id);

        return view('admin.discount.show', compact(['discount']));
    }


    public function edit($id)
    {
        $discount = $this->discounts->findOrFail($id);
        $products = $this->products->all();
        return view('admin.discount.edit', compact(['products', 'discount']));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string',
            'percentage' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);
        $discount = $this->discounts->findOrFail($id);
        $discount->update($validatedData);
        return redirect()->route('admin.discount.index')->with('message', ' Discount Updated Successfully');
    }


    public function destroy($id)
    {
        $discount = $this->discounts->findOrFail($id);

        $discount->delete();
        return redirect()->route('admin.discount.index')->with('message', 'Discount Deleted successfully');
    }
}
