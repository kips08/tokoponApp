<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseResponseController as Controller;
use Illuminate\Http\Request;
use App\Order;
use Validator;

class OrderController extends Controller
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
        $order = Order::all();
        $data = $order->toArray();

        return $this->responseApi('success',$data, 'Order Data Retrieved Successfully', 200);
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
            'tgl_pesan' => 'required',
            'id_cart' => 'required',
            'invoice' => 'required',
            'ekspedisi' => 'required',
            'no_resi' => 'required',
            'status_bayar' => 'required',
            'status_kirim' => 'required',
            'total' => 'required'
        ]);

        if($validator->fails()){
            return $this->responseApi(false, 'Validation Error', $validator->errors(), 400);
        }
        $order = Order::create($input);
        $data = $order->toArray();

        return $this->responseApi(true, $data, 'Order Stored Successfully..', 200);
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
        $order = Order::find($id);
        if (is_null($order)) {
            return $this->responseApi(false, [], 'Order not found..', 404);
        }
        $data = $order->toArray();
        return $this->responseApi(true, $data, 'Order Retrieved Successfull', 200);
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
        $tgl_pesan = $request->tgl_pesan;
        $id_cart = $request->id_cart;
        $invoice = $request->invoice;
        $ekspedisi = $request->ekspedisi;
        $no_resi = $request->no_resi;
        $status_bayar = $request->status_bayar;
        $status_kirim = $request->status_kirim;
        $total = $request->total;

        $order = Order::find($id);
        if(!is_null($order)){
            (is_null($tgl_pesan) ? $order->tgl_pesan = $order->tgl_pesan : $order->tgl_pesan = $tgl_pesan);
            (is_null($id_cart) ? $order->id_cart = $order->id_cart : $order->id_cart = $id_cart);
            (is_null($invoice) ? $order->invoice = $order->invoice : $order->invoice = $invoice);
            (is_null($ekspedisi) ? $order->ekspedisi = $order->ekspedisi : $order->ekspedisi = $ekspedisi);
            (is_null($no_resi) ? $order->no_resi = $order->no_resi : $order->no_resi = $no_resi);
            (is_null($status_bayar) ? $order->status_bayar = $order->status_bayar : $order->status_bayar = $status_bayar);
            (is_null($status_kirim) ? $order->status_kirim = $order->status_kirim : $order->status_kirim = $status_kirim);
            (is_null($total) ? $order->total = $order->total : $order->total = $total);
            $order->save();
            $data = $order->toArray();
            return $this->responseApi(true, $data, 'order updated sucessfully..', 200);
        } else {
            return $this->responseApi(false, [], 'order not found', 400);
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
        $order = Order::find($id);
        if(!is_null($order)){
            $order->delete();
            $data = $order->toArray();
            return $this->responseApi(true, $data, 'Order deleted sucessfully..', 200);
        } else {
            return $this->responseApi(false, [], 'Order not found', 400);
        }
    }
}
