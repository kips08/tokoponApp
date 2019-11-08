<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseResponseController as Controller;
use Illuminate\Http\Request;
use App\Detailorder as Detailord;
use Validator;

class DetailorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $detailord = Detailord::all();
        $data = $detailord->toArray();
        return $this->responseApi('success', $data, 'Detail Cart retrieved successfully..', 200);
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
            'id_cart' => 'required',
            'id_product' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'sub_total' => 'required'
        ]);
        if($validator->fails()){
            return $this->responseApi(false, $validator->errors(), 'Validation Error', 400);
        }
        $detail = Detailorder::create($input);
        $data = $detail->toArray();
        return $this->responseApi('success', $data, 'Detail Order stored successfully..', 200);
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
        $detail = Detailord::find($id);
        if(is_null($detail)){
            return $this->responseApi(false, [], 'detail ord not found', 400);
        }
        $data = $detail->toArray();
        return $this->responseApi('success', $data, 'Detail Order retrieved successfully..', 200);
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
        //
    }
}
