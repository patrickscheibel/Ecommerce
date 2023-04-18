<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(String $supplier)
    {
        $response = Http::get('https://616d6bdb6dacbb001794ca17.mockapi.io/devnology/' . $supplier . '_provider');

        return $response;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchById(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'supplier' => 'required'
        ]);

        $response = Http::get('http://616d6bdb6dacbb001794ca17.mockapi.io/devnology/'. $request->supplier . '_provider/'. $request->id);
        
        return $response;
    }
}
