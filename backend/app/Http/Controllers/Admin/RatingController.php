<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        
    }

   
    public function store(Request $request)
    {
        //
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

   
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
