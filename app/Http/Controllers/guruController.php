<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use Symfony\Component\HttpFoundation\Response; //Wajib di Import
use Illuminate\Support\Facades\Validator;

class guruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gurus = Guru::orderBy('id_guru', 'DESC')->get();
        $response = [
            'message' => 'List Data Guru',
            'data' => $gurus
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
            'id_guru' => ['required'],
            'nama_guru' => ['required'],
            'id_jabatan' => ['required'],
            'tempat' => ['required'],
            'tgl_lahir' => ['required', 'date'],
            'jk' => ['required', 'in:Laki-laki,Perempuan'],
            'agama' => ['required', 'in:Islam,Kristen,Hindu,Budha,Konghuchu'],
            'no_telp' => ['required'],
            'alamat' => ['required'],
            'username' => ['required'],
            'password' => ['required']
        ]);
        if($validator->fails()) {
            return response()->json($validator->error(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $gurus = Guru::create($request->all());
            $response = [
                'message' => 'Data Guru created',
                'data' => $gurus
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
    public function show($id_guru)
    {
        $gurus = Guru::findOrFail($id_guru);
        $response = [
            'message' => 'Detail of Guru resource',
            'data' => $gurus
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
    public function update(Request $request, $id_guru)
    {
        $gurus = Guru::findOrFail($id_guru);

        $validator = Validator::make($request->all(), [
            'id_guru' => ['required'],
            'nama_guru' => ['required'],
            'id_jabatan' => ['required'],
            'tempat' => ['required'],
            'tgl_lahir' => ['required','date'],
            'jk' => ['required', 'in:Laki-laki,Perempuan'],
            'agama' => ['required', 'in:Islam,Kristen,Hindu,Budha,Konghuchu'],
            'no_telp' => ['required'],
            'alamat' => ['required'],
            'username' => ['required'],
            'password' => ['required']
        ]);

        if($validator->fails()) {
            return response()->json($validator->error(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $gurus->update($request->all());
            $response = [
                'message' => 'Guru Update',
                'data' => $gurus

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
    public function destroy($id_guru)
    {
        $gurus = Guru::findOrFail($id_guru);

        try {
            if ($gurus->delete()) {
                $response = [
                'message' => 'Guru Deleted'
            ];
            }
            return response()->json($response, Response::HTTP_OK);

        } catch(QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }   
    }
}
