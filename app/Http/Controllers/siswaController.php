<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Symfony\Component\HttpFoundation\Response; //Wajib di Import
use Illuminate\Support\Facades\Validator;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::orderBy('nik', 'DESC')->get();
        $response = [
            'message' => 'List Data Siswa',
            'data' => $siswas
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
            'nik' => ['required'],
            'nisn' => ['required'],
            'nama_lengkap' => ['required'],
            'jk' => ['required', 'in:Laki-laki,Perempuan'],
            'agama' => ['required', 'in:Islam,Kristen,Hindu,Budha,Konghuchu'],
            'tempat_lahir' => ['required'],
            'tgl_lahir' => ['required', 'date'],
            'alamat' => ['required'],
            'ayah' => ['required'],
            'ibu' => ['required'],
            'pekerjaan_ayah' => ['required'],
            'pekerjaan_ibu' => ['required'],
            'no_hp' => ['required'],
            'email' => ['required'],
            'tahun_masuk' => ['required']
        ]);
        if($validator->fails()) {
            return response()->json($validator->error(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $siswas = Siswa::create($request->all());
            $response = [
                'message' => 'Data Siswa created',
                'data' => $siswas
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
    public function show($nik)
    {
        $siswas = Siswa::findOrFail($nik);
        $response = [
            'message' => 'Detail of Siswa resource',
            'data' => $siswas
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
    public function update(Request $request, $nik)
    {
        $siswas = Siswa::findOrFail($nik);

        $validator = Validator::make($request->all(), [
            'nik' => ['required'],
            'nisn' => ['required'],
            'nama_lengkap' => ['required'],
            'jk' => ['required', 'in:Laki-laki,Perempuan'],
            'agama' => ['required', 'in:Islam,Kristen,Hindu,Budha,Konghuchu'],
            'tempat_lahir' => ['required'],
            'tgl_lahir' => ['required', 'date'],
            'alamat' => ['required'],
            'ayah' => ['required'],
            'ibu' => ['required'],
            'pekerjaan_ayah' => ['required'],
            'pekerjaan_ibu' => ['required'],
            'no_hp' => ['required'],
            'email' => ['required'],
            'tahun_masuk' => ['required']
        ]);

        if($validator->fails()) {
            return response()->json($validator->error(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $siswas->update($request->all());
            $response = [
                'message' => 'Siswa Update',
                'data' => $siswas

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
    public function destroy($nik)
    {
        $siswas = Siswa::findOrFail($nik);

        try {
            if ($siswas->delete()) {
                $response = [
                'message' => 'Siswa Deleted'
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
