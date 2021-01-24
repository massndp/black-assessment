<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Product::with('category')->get();
        return response()->json($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $filename = null;

       if($request->hasFile('photo')){
           $filename = Str::random(10) . ',jpg';
           $file = $request->file('photo');
           $file->move(storage_path('public/images'), $filename);
       }

       Product::create([
            'name'=> $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'qty' => $request->qty,
            'photo' => $filename
       ]);

       return response()->json('Product Successfully Created!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $item = Product::find($id);

        $filename = $item->photo;
        if($request->hasFile('photo')) {
            $filename = Str::random(10)  . '.jpg';
            $file = $request->file('photo');
            $file->move(storage_path('public/images'), $filename);
            unlink(storage_path('public/images/' . $item->photo));
        }

        $item->update([
            'name'=> $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'qty' => $request->qty,
            'photo' => $filename
        ]);

        return response()->json('Product Successfully updated!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $item = Product::find($id);
        unlink(storage_path('public/images/' . $item->photo));
        $item->delete();
        return response()->json('Product Successfully Deleted!');
    }
}
