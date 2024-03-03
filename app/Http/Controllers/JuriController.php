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
<<<<<<< HEAD
                elseif($tipe === "checkbabak"){
                        $data = Setting::where('arena',$id)->first();
                        $data = $data->babak;
                        return response()->json(['data' => $arena]);
                }
=======
               elseif($tipe === "checkbabak"){
                 	$data = Setting::where('arena',$id)->first();
                 	$data = $data->babak;
                 	return response()->json(['data' => $arena]);
               }
>>>>>>> db40017ff59f2393a9d0c51337fcd66f6ab3ab2a
                elseif($tipe === "detail"){
                    $kt = $request->input('kt');
                    $data = score::where('keterangan',"$kt")->where('id_perserta',"$id")->count();
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
<<<<<<< HEAD
                        $hapus_dewan->each->delete();
=======
                          $hapus_dewan->each->delete();
>>>>>>> db40017ff59f2393a9d0c51337fcd66f6ab3ab2a
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
                    if($kt == "solo"){
                        $data =score::where('id_perserta',$id)
                                        ->where('id_juri', ' $id_juri')
                                        ->first();
                    }
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
