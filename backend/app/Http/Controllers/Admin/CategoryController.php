<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class CategoryController extends Controller
{
    use MediaUploadingTrait;
    protected $categories;
    public function __construct(Category $category){
        $this->categories= $category;
    }
    public function index()
    {
        $categories=$this->categories->all();
        return view('admin.category.index',compact(['categories']));
    }

    
    public function create()
    {
        return view('admin.category.create');
    }

   
    public function store(StoreCategoryRequest $request)
    {
        // dd($request->all());
        $category=$this->categories->create($request->all());
        
    
        if ($request->input('image', false)) {
            $filePath = $request->input('image');
            if ($request->input('image',false)) {
                $category->addMedia(storage_path('tmp/uploads/' .$filePath))->toMediaCollection('image');
            } else {
                dd("File does not exist at path: " . $filePath);
            }
        } else {
            dd("No image input provided");
        }
        return redirect()->route('admin.category.index')->with('message','Category Created Successfully');
    }

   
    public function show($id)
    {
        $category=$this->categories->findOrFail($id);
        
        return view('admin.category.show',compact(['category']));
    }

    
    public function edit($id)
    {
        $category=$this->categories->findOrFail($id);
        return view('admin.category.edit',compact(['products','users','category']));
    }

   
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = $this->categories->findOrFail($id);
       $category->update($request->all());
       return redirect()->route('admin.category.index')->with('message',' category Updated Successfully');
    }

    
    public function destroy($id)
    {
        $category=$this->categories->findOrFail($id);
        
        $category->delete();
        return redirect()->route('admin.category.index')->with('message','category Deleted successfully');
    }

    // public function store(Request $request)
    // {
    //     // abort_if(Gate::denies("product_measurement_create"), Response::HTTP_FORBIDDEN, "403 Forbidden");

    //     $productMeasurements= $this->productMeasurements->create($request->all());
    //     if ($request->input('photo', false)) {
    //         $productMeasurements->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
    //         // $productMeasurements->addMedia(public_path(basename($request->input('photo'))))->toMediaCollection('photo');
    //     }
        
    //     return redirect()->route('admin.product-measurements.index')->with('message', 'Product Measurement created successfully!');
    // }
}

