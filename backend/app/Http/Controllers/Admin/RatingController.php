<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;
use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    protected $users;
    protected $ratings;
    protected $products;
    public function __construct(User $user,Rating $rating,Product $product){
        $this->users= $user;
        $this->ratings= $rating;
        $this->products= $product;
    }
    public function index()
    {
        $ratings=$this->ratings->with(['user','product'])->get();
        return view('admin.rating.index',compact(['ratings']));
    }

    
    public function create()
    {
        $products=$this->products->all();
        $users=$this->users->all();
        return view('admin.rating.create',compact('products','users'));
    }

   
    public function store(StoreRatingRequest $request)
    {
        $rating=$this->ratings->create($request->all());
        return redirect()->route('admin.rating.index')->with('message','Rating Created Successfully');
    }

   
    public function show($id)
    {
        $rating=$this->ratings->with(['user','product'])->findOrFail($id);
        
        return view('admin.rating.show',compact(['rating']));
    }

    
    public function edit($id)
    {
        $rating=$this->ratings->findOrFail($id);
        $users=$this->users->all();
        $products=$this->products->all();
        return view('admin.rating.edit',compact(['products','users','rating']));
    }

   
    public function update(UpdateRatingRequest $request, $id)
    {
        $rating = $this->ratings->findOrFail($id);
       $rating->update($request->all());
       return redirect()->route('admin.rating.index')->with('message',' Rating Updated Successfully');
    }

    
    public function destroy($id)
    {
        $rating=$this->ratings->findOrFail($id);
        
        $rating->delete();
        return redirect()->route('admin.rating.index')->with('message','Rating Deleted successfully');
    }
}
