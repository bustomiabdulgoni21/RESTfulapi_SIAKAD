<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rombel;
use Symfony\Component\HttpFoundation\Response; //Wajib di Import
use Illuminate\Support\Facades\Validator;


class rombelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rombels = Rombel::orderBy('id_rombel', 'DESC')->get();
        $response = [
            'message' => 'List Data Rombel',
            'data' => $rombels
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
            'id_rombel' => ['required'],
            'nik' => ['required'],
            'id_kelas' => ['required']
        ]);
        if($validator->fails()) {
            return response()->json($validator->error(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $rombels = Rombel::create($request->all());
            $response = [
                'message' => 'Data Rombel created',
                'data' => $rombels
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
    public function show($id_rombel)
    {
        $rombels = Rombel::findOrFail($id_rombel);
        $response = [
            'message' => 'Detail of Rombel resource',
            'data' => $rombels
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
    public function update(Request $request, $id_rombel)
    {
        $rombels = Rombel::findOrFail($id_rombel);

        $validator = Validator::make($request->all(), [
            'id_rombel' => ['required'],
            'nik' => ['required'],
            'id_kelas' => ['required']
        ]);

        if($validator->fails()) {
            return response()->json($validator->error(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $rombels->update($request->all());
            $response = [
                'message' => 'Rombel Update',
                'data' => $rombels

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
    public function destroy($id_rombel)
    {
        $rombels = Rombel::findOrFail($id_rombel);

        try {
            $rombels->delete();
            $response = [
                'message' => 'Rombel Deleted'
            ];

            return response()->json($response, Response::HTTP_OK);

        } catch(QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }
    }
}
