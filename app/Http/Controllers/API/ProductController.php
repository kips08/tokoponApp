<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseResponseController as Controller;
use Illuminate\Http\Request;
use App\Product;    
use Validator;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //GET method dan hasilnya data HP
        $phone = Product::all();
        $data = $phone->toArray();
        return $this->responseApi(true, $data, 'Phone retrieved Successfully..', 200);
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
            'merk' => 'required',
            'tipe' => 'required',
            'soc_nama' => 'required',
            'soc_tipe' => 'required',
            'ram' => 'required',
            'rom' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->responseApi(false, 'Validation Error.', $validator->errors(), 401);
        }

        $phone = Product::create($input);
        $data = $phone->toArray();

        return $this->responseApi(true, $data, 'Product Stored Successfully..', 200);
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
        $phone = Product::find($id);
        if (is_null($phone)) {
            return $this->responseApi(false, [], 'Product not found..', 404);
        }
        $data = $phone->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Product retrieved successfully.'
        ];

        return response()->json($response, 200);
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
        $input = $request->all();
        $validator = Validator::make($input, [
            'merk' => 'required',
            'tipe' => 'required',
            'soc_nama' => 'required',
            'soc_tipe' => 'required',
            'ram' => 'required',
            'rom' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'stok' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->responseApi(false, 'Validation Error.', $validator->errors(), 401);
        }

        $merk = $request->merk;
        $tipe = $request->tipe;
        $soc_nama = $request->soc_nama;
        $soc_tipe = $request->soc_tipe;
        $ram = $request->ram;
        $rom = $request->rom;
        $deskripsi = $request->deskripsi;
        $harga = $request->harga;
        $stok = $request->stok;

        $product = Product::find($id);
        if(!is_null($product)){
            (is_null($merk) ? $product->merk = $product->merk : $product->merk = $merk);
            (is_null($tipe) ? $product->tipe = $product->tipe : $product->tipe = $tipe);
            (is_null($soc_nama) ? $product->soc_nama = $product->soc_nama : $product->soc_nama = $soc_nama);
            (is_null($soc_tipe) ? $product->soc_tipe = $product->soc_tipe : $product->soc_tipe = $soc_tipe);
            (is_null($ram) ? $product->ram = $product->ram : $product->ram = $ram);
            (is_null($rom) ? $product->rom = $product->rom : $product->rom = $rom);
            (is_null($deskripsi) ? $product->deskripsi = $product->deskripsi : $product->deskripsi = $deskripsi);
            (is_null($harga) ? $product->harga = $product->harga : $product->harga = $harga);
            (is_null($stok) ? $product->stok = $product->stok : $product->stok = $stok);
            $product->save();
            $data = $product->toArray();
            return $this->responseApi(true, $data, 'Product updated sucessfully..', 200);
        } else {
            return $this->responseApi(false, [], 'Product not found', 400);
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
        $phone = Product::find($id);
        if(!is_null($phone)){
            $phone->delete();
            $data = $phone->toArray();

            $response = [
                'success' => true,
                'data' => $data,
                'message' => 'Product deleted successfully.'
            ];

            return $this->responseApi(true, $data, 'Product deleted sucessfully..', 200);
        } else {
            return $this->responseApi(false, [], 'Product not found', 400);
        }
    }
}
