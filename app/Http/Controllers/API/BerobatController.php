<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\berobat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class BerobatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data=berobat::all();
        // return response()->json($data);
        try {
            $berobat = berobat::all();
            return response()->json(['success' => true, 'data' => $berobat]);
        } catch (QueryException $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'id_pasien'     => 'required',
            'id_dokter'     => 'required',
            'keluhan'     => 'required',
            'diagnosa'     => 'required',
            'obat'     => 'required',
        ]);

        try {
            $berobat = berobat::create($validator);
            return response()->json(['insert data success' => true, 'data' => $berobat]);
        } catch (QueryException $e) {
            return response()->json(['insert data success' => false, 'message' => $e->getMessage()]);
        }
        
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
        //
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
        $validator = $request->validate([
            'id_pasien'     => 'required',
            'id_dokter'     => 'required',
            'keluhan'     => 'required',
            'diagnosa'     => 'required',
            'obat'     => 'required',
        ]);

        try {
            $berobat = berobat::find($id);
            $berobat->update($validator);
            return response()->json(['Update data success' => true, 'data' => $berobat]);
        } catch (QueryException $e) {
            return response()->json(['Update data success' => false, 'message' => $e->getMessage()]);
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
        try {
            $berobat=berobat::find($id);
            $berobat->delete();
            return response()->json(['Hapus data success' => true, 'data' => $berobat]);
        } catch (QueryException $e) {
            return response()->json(['Hapus data success' => false, 'message' => $e->getMessage()]);
        }
    }
}
