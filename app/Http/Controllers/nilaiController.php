<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use Symfony\Component\HttpFoundation\Response; //Wajib di Import
use Illuminate\Support\Facades\Validator;

class nilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilais = Nilai::orderBy('id_nilai', 'DESC')->get();
        $response = [
            'message' => 'List Data Nilai',
            'data' => $nilais
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
            'id_nilai' => ['required'],
            'nik' => ['required'],
            'id_jadwal' => ['required'],
            'smst' => ['required'],
            'angka' => ['required'],
            'kalimat' => ['required'],
            'id_rombel' => ['required'],
            'deskripsi' => ['required']
            
        ]);
        if($validator->fails()) {
            return response()->json($validator->error(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $nilais = Nilai::create($request->all());
            $response = [
                'message' => 'Data Nilai created',
                'data' => $nilais
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
    public function show($id_nilai)
    {
        $nilais = Nilai::findOrFail($id_nilai);
        $response = [
            'message' => 'Detail of Nilai resource',
            'data' => $nilais
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
    public function update(Request $request, $id_nilai)
    {
        $nilais = Nilai::findOrFail($id_nilai);

        $validator = Validator::make($request->all(), [
            'id_nilai' => ['required'],
            'nik' => ['required'],
            'id_jadwal' => ['required'],
            'smst' => ['required'],
            'angka' => ['required'],
            'kalimat' => ['required'],
            'id_rombel' => ['required'],
            'deskripsi' => ['required']
        ]);

        if($validator->fails()) {
            return response()->json($validator->error(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $nilais->update($request->all());
            $response = [
                'message' => 'Nilai Update',
                'data' => $nilais

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
    public function destroy($id_nilai)
    {
        $nilais = Nilai::findOrFail($id_nilai);

        try {
            $nilais->delete();
            $response = [
                'message' => 'Nilai Deleted'
            ];

            return response()->json($response, Response::HTTP_OK);

        } catch(QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }
    }
}
