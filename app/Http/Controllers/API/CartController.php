<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseResponseController as Controller;
use Illuminate\Http\Request;
use App\Cart;
use Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cart = Cart::all();
        $data = $cart->toArray();   
        return $this->responseApi('success', $data, 'Cart retrieved Successfully', 200);
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
        $input = $request->all();
        $validator = Validator::make($input, [
            'id_user' => 'required'
        ]);

        if($validator->fails()){
            return $this->responseApi(false, $validator->errors(), 'Validation Error', 400);
        }
        $cart = Cart::create($input);
        $data = $cart;

        return $this->responseApi('success', $data, 'Cart inserted', 200);
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
        $cart = Cart::find($id);
        if(is_null($cart)){
            return $this->responseApi(false, [], 'Cart not found', 400 );
        } else {
            return $this->responseApi('success', $cart, 'Cart retrieved successfully', 200);
        }
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
        $id_user = $request->id_user;
        $cart = Cart::find($id);
        if(!is_null($cart)){
            (is_null($id_user) ? $cart->id_user = $cart->id_user : $cart->id_user = $id_user);
            $cart->save();
            $data = $cart->toArray();
            return $this->responseApi(true, $data, 'Cart updated sucessfully..', 200);
        } else {
            return $this->responseApi(false, [], 'Cart not found', 400);
        }
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
        $cart = Cart::find($id);
        if(!is_null($cart)){
            $cart->delete();
            $data = $cart->toArray();
            return $this->responseApi('success', $data, 'Cart deleted..', 200);
        } else {
            return $this->responseApi(false, [], 'Cart not found..', 400);
        }
    }
}
