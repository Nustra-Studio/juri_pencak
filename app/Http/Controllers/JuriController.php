<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\score;

class JuriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penilaian.juri');
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
        $keterangan = $request->keterangan;
        $p = $request->p;
        $status = $request->status;
        $id_perserta = $request->id;
        $id_juri = $request->juri;
        
        if($keterangan === "plus"){
            $data = [
                'score' => $p,
                'keterangan' => $status,
                'id_perserta' => $id_perserta,
                'id_juri' => $id_juri,
                'status' => 'plus'
            ];
            score::create($data);
        
            return response()->json(['message' => 'Data berhasil disimpan']);

        }
            elseif($keterangan === "minus"){
                $data = Score::where('keterangan', $status)->first();
                $data->delete();
                return response()->json(['message' => 'Data berhasil dihapus']);

            }
    }

        public function stream()
            {
                header('Content-Type: text/event-stream');
                header('Cache-Control: no-cache');

                while (true) {
                    $last = score::latest('created_at')->first();
                    $last = $last->created_at;
                    $last = $last->subSeconds(10);
                    $newData = score::where('created_at', '>', $last)->exists(); // Fungsi untuk memeriksa data baru

                    if ($newData) {
                        echo "data: newData\n\n";
                        ob_flush();
                        flush();
                    }

                    sleep(10); // Polling setiap 5 detik (sesuaikan sesuai kebutuhan)
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
        //
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
    }
}
