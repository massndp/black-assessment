<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use App\Product;
use App\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $items = Purchase::with('product')->get();
       return view('pages.purchase.index',[
           'items'=>$items
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('pages.purchase.create',[
            'products'=>$products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseRequest $request)
    {
        $data = $request->all();
        $data['uuid'] = 'TRX' . mt_rand(10000, 99999) . mt_rand(100, 999);

        Purchase::create($data);

        $product = Product::findOrFail($request->products_id);
        $product->qty += $request->qty;
        $product->save();

        return redirect()->route('purchase.index');
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
    public function edit($id)
    {
        // $item = Purchase::findOrFail($id);
        // $products = Product::all();

        // return view('pages.purchase.edit',[
        //     'item'=>$item,
        //     'products'=>$products
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PurchaseRequest $request, $id)
    {
        // $data = $request->all();
        
        // $item = Purchase::findOrFail($id);
        // $item->update($data);
        
        // $product = Product::findOrFail($request->products_id);
        // $product->qty = $request->qty;  
        // $product->update();  


        // return redirect()->route('purchase.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

        $item = Purchase::findOrFail( $id);
        $item->delete();

        return redirect()->route('purchase.index');
    }
}
