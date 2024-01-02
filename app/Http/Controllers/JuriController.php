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
                'status' => 'plus',
                'babak' => $request->babak,
            ];
            score::create($data);
        
            return response()->json(['message' => 'Data berhasil disimpan']);

        }
            elseif($status === "terakhir"){
                $data = score::where('id_perserta',$request->id )
                ->where('babak',$request->babak)
                ->latest()
                ->first();
                $data->delete();
                return response()->json(['message' => 'Data berhasil dihapus']);
            }

            elseif($keterangan === "minus"){
                $data = Score::where('keterangan', $status)
                ->where('babak',$request->babak)
                ->first();
                $data->delete();
                return response()->json(['message' => 'Data berhasil dihapus']);

            }

            elseif($keterangan === "notif"){
                $data = [
                    'score' => '0',
                    'keterangan' => $status,
                    'id_perserta' => $id_perserta,
                    'id_juri' => $id_juri,
                    'status' => 'notif',
                    'babak' => $request->babak
                ];
                score::create($data);
            }
            elseif($keterangan === "senidewan"){
                    $data = [
                        'score' => $p,
                        'keterangan' => $status,
                        'id_perserta' => $id_perserta,
                        'id_juri' => $id_juri,
                        'status' => 'plus'
                    ];
            }
            elseif($keterangan === "pointseni"){
                $check = [
                    'id_perserta' => $id_perserta,
                    'keterangan' => $status,
                ];
                $data = [
                    'score' => $p,
                    'keterangan' => $status,
                    'id_perserta' => $id_perserta,
                    'id_juri' => $id_juri,
                    'status' => 'point_solo'
                ];
                $datas = score::where($check)->first();
                if ($datas) {
                    $datas->update($data);
                } else {
                    score::create($data);
                }
                return response()->json(['message' => 'Data berhasil disimpan']);
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

            public function data(Request $request){
                $tipe = $request->input('tipe');
                $id = $request->input('id');
                if($tipe ==="score"){
                    $plus = score::where('status','plus')->where('id_perserta',"$id")->sum('score');
                    $minus = score::where('status','minus')->where('id_perserta',"$id")->sum('score'); 
                    $score = $plus - $minus;
                    return response()->json(['data' => $score]);
                }
                elseif($tipe === "detail"){
                    $kt = $request->input('kt');
                    $data = score::where('keterangan',"$kt")->where('id_perserta',"$id")->count();
                    return response()->json(['data' => $data]);
                }

                elseif($tipe === "keterangan"){
                    $data = score::where('id_perserta',"$id")->where('status','plus')->get();
                    foreach($data as $item){
                        $data[] = $item->score ;
                    }
                    return response()->json(['data' => $data]);
                }
                elseif($tipe === "seni"){
                    $kt = $request->input('kt');
                    $data = score::where('keterangan',"$kt")->first();
                    $data = $data->score;
                    return response()->json(['data' => $data]);
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
