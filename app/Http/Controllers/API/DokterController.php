<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dokter;
use Illuminate\Support\Facades\Validator;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $dokter = dokter::all();
            return response()->json(['success' => true, 'data' => $dokter]);
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
            'nama_dokter'     => 'required',
        ]);

        try {
            $dokter = dokter::create($validator);
            return response()->json(['insert data success' => true, 'data' => $dokter]);
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
            'nama_dokter'     => 'required',
        ]);

        try {
            $dokter = dokter::find($id);
            $dokter->update($validator);
            return response()->json(['Update data success' => true, 'data' => $dokter]);
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
            $dokter=dokter::find($id);
            $dokter->delete();
            return response()->json(['Hapus data success' => true, 'data' => $dokter]);
        } catch (QueryException $e) {
            return response()->json(['Hapus data success' => false, 'message' => $e->getMessage()]);
        }
    }
}
