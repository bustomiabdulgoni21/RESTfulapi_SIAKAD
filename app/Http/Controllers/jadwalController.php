<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Symfony\Component\HttpFoundation\Response; //Wajib di Import
use Illuminate\Support\Facades\Validator;

class jadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwals = Jadwal::orderBy('id_jadwal', 'DESC')->get();
        $response = [
            'message' => 'List Data Jadwal',
            'data' => $jadwals
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
            'id_jadwal' => ['required'],
            'id_kelas' => ['required'],
            'id_mapel' => ['required'],
            'hari' => ['required'],
            'jam' => ['required'],
            'id_guru' => ['required']
        ]);
        if($validator->fails()) {
            return response()->json($validator->error(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $jadwals = Jadwal::create($request->all());
            $response = [
                'message' => 'Data Jadwal created',
                'data' => $jadwals
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
    public function show($id_jadwal)
    {
        $jadwals = Jadwal::findOrFail($id_jadwal);
        $response = [
            'message' => 'Detail of Jadwal resource',
            'data' => $jadwals
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
    public function update(Request $request, $id_jadwal)
    {
        $jadwals = Jadwal::findOrFail($id_jadwal);

        $validator = Validator::make($request->all(), [
            'id_jadwal' => ['required'],
            'id_kelas' => ['required'],
            'id_mapel' => ['required'],
            'hari' => ['required'],
            'jam' => ['required'],
            'id_guru' => ['required']
        ]);

        if($validator->fails()) {
            return response()->json($validator->error(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $jadwals->update($request->all());
            $response = [
                'message' => 'Jadwal Update',
                'data' => $jadwals

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
    public function destroy($id_jadwal)
    {
        $jadwals = Jadwal::findOrFail($id_jadwal);

        try {
            $jadwals->delete();
            $response = [
                'message' => 'Jadwal Deleted'
            ];

            return response()->json($response, Response::HTTP_OK);

        } catch(QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }
    }
}
