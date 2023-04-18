<?php

namespace App\Http\Controllers;

use App\Models\BuyItem;
use Illuminate\Http\Request;

class BuyItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return App\Models\BuyItem
     */
    public function index()
    {
        $buyItems = BuyItem::orderBy('id', 'asc')->paginate(10);
     
        return $buyItems;
    }

    /**
     * Find buyItem by id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response or App\Models\BuyItem
     */
    public function findById(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $buyItem = BuyItem::find($request->id);

        if($buyItem)
        {
            return $buyItem;
        }
        else
        {
            return response("Compra não encontrada", 400);
        }
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'    => 'required',
            'product_id' => 'required',
            'supplier'   => 'required',
            'product'    => 'required',
            'price'      => 'required',
            'payment'    => 'required'
        ]);

        BuyItem::create($request->all());

        return response("Sucesso", 200);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'user_id'    => 'required',
            'product_id' => 'required',
            'supplier'   => 'required',
            'product'    => 'required',
            'price'      => 'required',
            'payment'    => 'required'
        ]);
        
        $buyItem = BuyItem::find($request->id);

        if($buyItem) 
        {
            $buyItem->update($request->all());

            return response("Sucesso", 200);
        }

        return response("Compra de item não encontrada", 400);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $buyItem = BuyItem::find($request->id);

        if($buyItem)
        {
            $buyItem->delete();

            return response("Sucesso", 200);
        }
        else
        {
            return response("Compra de item não encontrada", 400);
        }
    }
}