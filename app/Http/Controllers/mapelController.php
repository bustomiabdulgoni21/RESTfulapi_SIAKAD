<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use Symfony\Component\HttpFoundation\Response; //Wajib di Import
use Illuminate\Support\Facades\Validator;

class mapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapels = Mapel::orderBy('id_mapel', 'DESC')->get();
        $response = [
            'message' => 'List Data Mapel',
            'data' => $mapels
        ];

        return response()->json($response, Response::HTTP_OK);   
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
        $validator = Validator::make($request->all(), [
            'id_mapel' => ['required'],
            'nama_pel' => ['required'],
            'kkm' => ['required'],
            'jenis' => ['required', 'in:Khusus,Praktikum,Tambahan']
        ]);
        if($validator->fails()) {
            return response()->json($validator->error(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $mapels = Mapel::create($request->all());
            $response = [
                'message' => 'Data Mapel created',
                'data' => $mapels
            ];

            return response()->json($response, Response::HTTP_CREATED);

        } catch(QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_mapel)
    {
        $mapels = Mapel::findOrFail($id_mapel);
        $response = [
            'message' => 'Detail of Mapel resource',
            'data' => $mapels
        ];

        return response()->json($response, Response::HTTP_OK);
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
    public function update(Request $request, $id_mapel)
    {
        $mapels = Mapel::findOrFail($id_mapel);

        $validator = Validator::make($request->all(), [
            'id_mapel' => ['required', 'integer'],
            'nama_pel' => ['required'],
            'kkm' => ['required', 'integer'],
            'jenis' => ['required', 'in:Khusus,Praktikum,Tambahan']
        ]);

        if($validator->fails()) {
            return response()->json($validator->error(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $mapels->update($request->all());
            $response = [
                'message' => 'Mapel Update',
                'data' => $mapels

            ];

            return response()->json($response, Response::HTTP_OK);

        } catch(QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_mapel)
    {
        $mapels = Mapel::findOrFail($id_mapel);

        try {
            $mapels->delete();
            $response = [
                'message' => 'Mapel Deleted'
            ];

            return response()->json($response, Response::HTTP_OK);

        } catch(QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }
    }
}
