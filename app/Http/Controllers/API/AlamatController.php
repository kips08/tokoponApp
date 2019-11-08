<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseResponseController as Controller;
use Illuminate\Http\Request;
use App\Alamat;
use App\User;
use Validator;

class AlamatController extends Controller
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
        $alamat = Alamat::all();
        $data = $alamat->toArray();
        return $this->responseApi(true, $data, 'Alamat retrieved Successfully..', 200);
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
            'id_user' => 'required',
            'label' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kodepos' => 'required'
        ]);

        if($validator->fails()){
            return $this->responseApi(false, 'Validation Error', $validator->errors(), 400);
        }
        $alamat = Alamat::create($input);
        $data = $alamat->toArray();

        return $this->responseApi(true, $data, 'Alamat Stored Successfully..', 200);
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
        $alamat = Alamat::find($id);
        if (is_null($alamat)) {
            return $this->responseApi(false, [], 'Alamat not found..', 404);
        }
        $data = $alamat->toArray();
        return $this->responseApi(true, $data, 'Alamat Retrieved Successfull', 200);
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
        $label = $request->label;
        $alamatnya = $request->alamat;
        $kota = $request->kota;
        $provinsi = $request->provinsi;
        $kodepos = $request->kodepos;

        $alamat = Alamat::find($id);
        if(!is_null($alamat)){
            (is_null($id_user) ? $alamat->id_user = $alamat->id_user : $alamat->id_user = $id_user);
            (is_null($label) ? $alamat->label = $alamat->label : $alamat->label = $label);
            (is_null($alamatnya) ? $alamat->alamat = $alamat->alamat : $alamat->alamat = $alamatnya);
            (is_null($kota) ? $alamat->kota = $alamat->kota : $alamat->kota = $kota);
            (is_null($provinsi) ? $alamat->provinsi = $alamat->provinsi : $alamat->provinsi = $provinsi);
            (is_null($kodepos) ? $alamat->kodepos = $alamat->kodepos : $alamat->kodepos = $kodepos);
            $alamat->save();
            $data = $alamat->toArray();
            return $this->responseApi(true, $data, 'Alamat updated sucessfully..', 200);
        } else {
            return $this->responseApi(false, [], 'Alamat not found', 400);
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
        $alamat = Alamat::find($id);
        if(!is_null($alamat)){
            $alamat->delete();
            $data = $alamat->toArray();
            return $this->responseApi(true, $data, 'Alamat deleted sucessfully..', 200);
        } else {
            return $this->responseApi(false, [], 'Alamat not found', 400);
        }
    }

    public function userAlamat($id){
        $user = User::find($id)->alamats();
    }
}
