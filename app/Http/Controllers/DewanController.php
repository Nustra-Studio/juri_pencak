<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\score;

class DewanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penilaian.dewan');
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
        //  'score', 'keterangan', 'id_perserta','id_juri','status',
        // "juri:{{$id_juri}} id:2 status:tendangan p:3 keterangan:pluss"
        $keterangan = $request->keterangan;
        $p = $request->p;
        $status = $request->status;
        $id_perserta = $request->id;
        $id_juri = $request->juri;
        $babak = $request->babak;
        $arena = $request->arena;
    
        if ($keterangan === "plus") {
            if($status ==="binaan"){
                $data = [
                    'score' => $p,
                    'keterangan' => $status,
                    'id_perserta' => $id_perserta,
                    'id_juri' => $id_juri,
                    'status' => 'minus',
                    'babak'=>$babak
                ];
            }
            elseif($status ==="teguran"){
                $data = [
                    'score' => $p,
                    'keterangan' => $status,
                    'id_perserta' => $id_perserta,
                    'id_juri' => $id_juri,
                    'status' => 'minus',
                    'babak'=>$babak

                ];

            }
          // Initialize $data array with common elements
            $data = [
                'score' => $p,
                'keterangan' => $status,
                'id_perserta' => $id_perserta,
                'id_juri' => $id_juri,
                'babak' => $babak,
            ];

            if ($status === "peringatan") {
                $datan = score::where('keterangan', $status)
                    ->where('id_juri', $id_juri)
                    ->where('babak', $babak)
                    ->where('id_perserta', $id_perserta)
                    ->first();

                $datas = score::where('keterangan', $status)
                    ->where('id_juri', $id_juri)
                    ->where('babak', $babak)
                    ->where('id_perserta', $id_perserta)
                    ->latest('created_at')
                    ->first();

                if (empty($datan)) {
                    // Adjust the 'status' value based on the condition
                    $data['status'] = 'minus';

                    // Adjust the 'score' value based on the condition
                    if ($datas->score == 5) {
                        $data['score'] *= 2;
                    } elseif ($datas->score == 10) {
                        $data['score'] *= 3;
                    }

                    // Simpan data ke dalam tabel 'score'
                    score::create($data);

                    return response()->json(['message' => 'Data berhasil disimpan']);
                } else {
                    // Adjust the 'status' value based on the condition
                    $data['status'] = 'plus';
                }
            } elseif ($keterangan === "senidewans") {
                // Adjust the 'status' value based on the condition
                $data['status'] = 'min_point_solo';

                // Simpan data ke dalam tabel 'score'
                score::create($data);

                return response()->json(['message' => 'Data berhasil disimpan']);
            }

            // Simpan data ke dalam tabel 'score' for the other cases
            score::create($data);

            return response()->json(['message' => 'Data berhasil disimpan']);

        elseif($keterangan === "senidewansc"){
            $data = score::where('keterangan',$status)
            ->where('id_perserta',$id_perserta)
            ->first();
            $data->delete();
            return response()->json(['message' => 'Data berhasil dihapus']);
        }
        elseif($keterangan === "senidewan"){
            $data = [
                'score' => $p,
                'keterangan' => $status,
                'id_perserta' => $id_perserta,
                'id_juri' => $id_juri,
                'status' => 'min_point_tunggal'
            ];
            score::create($data);
    
            return response()->json(['message' => 'Data berhasil disimpan']);
        }
        elseif($keterangan === "senidewanc"){
            $data = score::where('keterangan',$status)
            ->where('id_perserta',$id_perserta)
            ->first();
            $data->delete();
            return response()->json(['message' => 'Data berhasil dihapus']);
        }
        elseif($keterangan === "minus"){
            $data = Score::where('keterangan', $status)->first();
            $data->delete();
            return response()->json(['message' => 'Data berhasil dihapus']);

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
