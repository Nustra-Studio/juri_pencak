<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\score;
use App\pending_tanding;
use App\Setting;
use Carbon\Carbon;

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
        $nomor_juri = $request->nj;
        $arena = $request->arena;
        
        if($keterangan === "plus"){
            $currentTimestamp = Carbon::now();
            $threeSecondsAgo = $currentTimestamp->subSeconds(3);
            $datas = pending_tanding::where('id_perserta',$id_perserta)
                ->where('keterangan', $status)
                ->first(); 
            $data = [
                'score' => $p,
                'keterangan' => $status,
                'id_perserta' => $id_perserta,
                "juri$nomor_juri" => $id_juri,
                'status' => 'plus',
                'babak' => $request->babak,
                'arena' => $arena
            ];

            if ($datas !== null) {
                $updateData = [
                    "juri$nomor_juri" => $id_juri,
                ];
                $datas->update($updateData);
            }
            else{
                pending_tanding::create($data);
            }
        
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
                    'score' => $p,
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
                elseif($tipe === "checkbabak"){
                        $data = Setting::where('arena',$id)->first();
                        $data = $data->babak;
                        return response()->json(['data' => $data]);
                }
                // primary function
                elseif($tipe === "tanding"){
                    $arena = $request->input('arena');
                    $setting = Setting::where('arena',$arena)->first();
                    if(!empty($setting)){
                        $data = score::where('id_perserta',$setting->biru)
                                    ->orWhere('id_perserta',$setting->merah)
                                    ->get();
                        if (!empty($data)) {
                            $response = [
                                'jatuh1' => 0,
                                'binaan1' => 0,
                                'teguran1' => 0,
                                'peringatan1' => 0, 
                                'score1'=> 0,
                                'jatuh2' => 0,
                                'binaan2' => 0,
                                'teguran2' => 0,
                                'peringatan2' => 0,
                                'score2'=> 0,
                            ];
                            foreach ($data as $item) {
                                    if($item->id_perserta === $setting->biru){
                                        $response['jatuh1'] += ($item->keterangan === "jatuh") ? $item->score / 3 : 0;
                                        $response['binaan1'] += ($item->keterangan === "binaan") ? $item->score + 1 : 0;
                                        $response['teguran1'] += ($item->keterangan === "teguran") ? $item->score : 0;
                                        $response['peringatan1'] += ($item->keterangan === "peringatan") ? $item->score / 5 : 0;
                                        $plus = score::where('status','plus')->where('id_perserta',$item->id_perserta)->sum('score');
                                        $minus = score::where('status','minus')->where('id_perserta',$item->id_perserta)->sum('score'); 
                                        $score = $plus - $minus;
                                        $response['score1'] = $score;
                                    }
                                    elseif($item->id_perserta === $setting->merah){
                                        $response['jatuh2'] += ($item->keterangan === "jatuh") ? $item->score / 3 : 0;
                                        $response['binaan2'] += ($item->keterangan === "binaan") ? $item->score + 1 : 0;
                                        $response['teguran2'] += ($item->keterangan === "teguran") ? $item->score : 0;
                                        $response['peringatan2'] += ($item->keterangan === "peringatan") ? $item->score / 5 : 0;
                                        $plus = score::where('status','plus')->where('id_perserta',$item->id_perserta)->sum('score');
                                        $minus = score::where('status','minus')->where('id_perserta',$item->id_perserta)->sum('score'); 
                                        $score = $plus - $minus;
                                        $response['score2'] = $score;
                                    }
                                
                            }
                            return response()->json($response,200);
                        }
                    
                }
            }
                elseif($tipe === "detail"){
                    $kt = $request->input('kt');
                    $data = score::where('id_perserta',"$id")->get();
                    return response()->json(['data' => $data]);
                }
                elseif($tipe === "checkjatuhan"){
                    $arena = $request->input('arena');
                    $id_juri = $request->juri('juri');
                    $data = score::where('id_juri',$id_juri)->where('arena',$arena)->where('status','notif')->where('keterangan','hukuman')->first();
                    $data = $data->score;
                    return response()->json(['data' => $data]);
                }
                elseif($tipe === "checkhukuman"){
                    $arena = $request->input('arena');
                    $id_juri = $request->juri('juri');
                        $data = score::where('id_juri',$id_juri)->where('arena',$arena)->where('status','notif')->where('keterangan','hukuman')->first();
                        $data = $data->score;
                    return response()->json(['data' => $data]);
                }
                elseif($tipe === "checkhukuman"){
                    $arena = $request->input('arena');
                    $id_juri = $request->input('juri');
                        $data = score::where('id_juri',$id_juri)->where('arena',$arena)->where('status','notif')->where('keterangan','jatuhan')->first();
                    
                        $data = $data->score;
                    return response()->json(['data' => $data]);
                }
                
                elseif($tipe === "check"){
                    $pending = pending_tanding::where('id_perserta',"$id")->first();
                    $arena = $request->input('arena');
                    $variable1 = $pending->juri1;
                    $variable2 = $pending->juri2;
                    $variable3 = $pending->juri3;
                    $threshold = Carbon::now()->subSeconds(3);
                    $five = Carbon::now()->subSeconds(5);
                    $hapus_dewan = score::where('status','notif')->where('arena',$arena)->get();
                    $hapus_data = pending_tanding::where('created_at', '<', $threshold)->delete();
                    if (($variable1 !== null) + ($variable2 !== null) + ($variable3 !== null) >= 2) {
                        $data = pending_tanding::where('id',$pending->id)->first();
                        $datas = [
                            'score' => $data->score,
                            'keterangan' => $data->keterangan,
                            'id_perserta' => $data->id_perserta,
                            "id_juri" => $data->juri1,
                            'status' => 'plus',
                            'babak' => $data->babak,
                            'arena' => $data->arena
                        ];
                        score::create($datas);
                        $data->delete();
                    }
                    elseif($hapus_dewan->count() > 0) {
                            $hapus_dewan->each->delete();

                        } 
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
                    $id = $request->input('id');
                    $id_juri = $request->input('juri');
                    if($kt == "ganda"){
                        $data =score::where('id_perserta',$id)->get();
                        $setting = Setting::where('arena',$request->input('arena'))->first();
                        if (!empty($data)) {
                            $response = [
                                'attack1' => 0,
                                'attack2' => 0,
                                'attack3' => 0,
                                'soulfullness1' => 0,
                                'soulfullness2' => 0,
                                'soulfullness3' => 0,
                                'firmness1' => 0,
                                'firmness2' => 0,
                                'firmness3' => 0,
                                'dewan'=> 0,
                            ];
                            
                            foreach ($data as $item) {
                                if ($item->id_juri === $setting->juri_1) {
                                    if ($item->keterangan === "attack") {
                                        $response['attack1'] = $item->score;
                                    } elseif ($item->keterangan === "firmness") {
                                        $response['firmness1'] = $item->score;
                                    } elseif ($item->keterangan === "soulfullness") {
                                        $response['soulfullness1'] = $item->score;
                                    }
                                } elseif ($item->id_juri === $setting->juri_2) {
                                    if ($item->keterangan === "attack") {
                                        $response['attack2'] = $item->score;
                                    } elseif ($item->keterangan === "firmness") {
                                        $response['firmness2'] = $item->score;
                                    } elseif ($item->keterangan === "soulfullness") {
                                        $response['soulfullness2'] = $item->score;
                                    }
                                } elseif ($item->id_juri === $setting->juri_3) {
                                    if ($item->keterangan === "attack") {
                                        $response['attack3'] = $item->score;
                                    } elseif ($item->keterangan === "firmness") {
                                        $response['firmness3'] = $item->score;
                                    } elseif ($item->keterangan === "soulfullness") {
                                        $response['soulfullness3'] = $item->score;
                                    }
                                } elseif ($item->status === "seni_minus") {
                                    $response['dewan'] = $item->score; // Subtract score for seni_minus
                                }
                            }                            
                            
                        
                            return response()->json($response,200);
                        } else {
                            return response()->json(['message' => 'No data available'],404);
                        }
                    }
                    return response()->json($respone);
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
