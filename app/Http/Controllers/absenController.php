<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use Symfony\Component\HttpFoundation\Response; //Wajib di Import
use Illuminate\Support\Facades\Validator;

class absenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absens = Absen::orderBy('id_absen', 'DESC')->get();
        $response = [
            'message' => 'List Data Absen',
            'data' => $absens
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
            'id_absen' => ['required'],
            'nik' => ['required'],
            'absensi' => ['required'],
            'id_rombel' => ['required'],
            'ket' => ['required'],
            'smst' => ['required']
        ]);
        if($validator->fails()) {
            return response()->json($validator->error(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $absens = Absen::create($request->all());
            $response = [
                'message' => 'Data Absen created',
                'data' => $absens
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
    public function show($id_absen)
    {
        $absens = Absen::findOrFail($id_absen);
        $response = [
            'message' => 'Detail of Absen resource',
            'data' => $absens
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
    public function update(Request $request, $id_absen)
    {
        $absens = Absen::findOrFail($id_absen);

        $validator = Validator::make($request->all(), [
            'id_absen' => ['required'],
            'nik' => ['required'],
            'absensi' => ['required'],
            'id_rombel' => ['required'],
            'ket' => ['required'],
            'smst' => ['required']
        ]);

        if($validator->fails()) {
            return response()->json($validator->error(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $absens->update($request->all());
            $response = [
                'message' => 'Absen Update',
                'data' => $absens

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
    public function destroy($id_absen)
    {
        $absens = Absen::findOrFail($id_absen);

        try {
            $absens->delete();
            $response = [
                'message' => 'Absen Deleted'
            ];

            return response()->json($response, Response::HTTP_OK);

        } catch(QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }
    }
}
