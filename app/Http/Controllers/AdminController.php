<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\juri;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\Perserta;
use App\arena;
use App\score;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        {
            $status = 'admin';
            return view('admin.panel', compact('status'));
        }

        public function arena()
        {
            $status = 'arena';
            return view('admin.PanelArena', compact('status'));
        }
        public function timer(Request $request){
            $tipe = $request->tipe;
            $select = $request->value;
            $arena =$request->arena;
                if($tipe ==="babak"){
                    $data = Setting::where('arena',$arena)->first();
                    $data->update(['babak'=>$select]);
                    return response()->json('success',200);
                }
            elseif($tipe ==="clear"){
                if($arena == '1'){
                $data = Score::where('id_perserta', '1')->orWhere('id_perserta', '2')->get();
                $data->each->delete();
                    $data = Setting::where('arena',$arena)->first();
                    $data->update(['babak'=>'1']);
                return response()->json('success',200);
                }
            elseif($arena == '2'){
                $data = Score::where('id_perserta','3')->orWhere('id_perserta','4')->get();
                $data->each->delete();
                    $data = Setting::where('arena',$arena)->first();
                    $data->update(['babak'=>'1']);
                return response()->json('success',200);
                }
            }
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
        $data = [
            'judul'=>$request->judul,
            'arena'=>$request->arena,
            'babak'=>$request->babak,
            'biru'=>$request->biru,
            'merah'=>$request->merah,
            'keterangan'=>"setting",
        ];
        Setting::updateOrCreate(['keterangan' => 'setting'], $data);
        $status = 'arena';
        return view('admin.PanelArena',compact('status'));
    }
    public function excel(Request $request){
        try {
            Excel::import(new Perserta, request()->file('file'));
            return redirect()->back()->with('success', 'Data Imported');
        } catch (\Exception $e) {
            // Handle the exception
            return redirect()->back()->with('error', 'Error importing data: ' . $e->getMessage());
        }
    }
    public function juri(Request $request){
        $data = [
            'name'=>$request->name,
            'alamat'=>$request->alamat,
            'nomor_hp'=>$request->nomor_hp,
        ];
    juri::create($data);
    return redirect()->back()->with('success', 'Data Imported');
}
    public function arenastore(Request $request) {
        // Validate the form data
            $request->validate([
                'name' => 'required|string|max:255',
                'kelas' => 'required',
            ]);

            // Process the form data
            $name = $request->input('name');
            $kelas = $request->input('kelas');

            // Create and save a new Data model instance
            $data = new arena([
                'name' => $name,
                'status' => $kelas // Assuming 'kelas' is a comma-separated list
                // Add other fields as needed
            ]);

            $data->save();
            $arena = arena::where('name',$name)->first();
            $datas = [
                'judul'=>"$name || $kelas" ,
                'arena'=>$arena->id,
                'babak'=>'1',
                'biru'=>'',
                'merah'=>'',
                'keterangan'=>"$kelas",
                'juri_1'=>$request->input('juri_1'),
                'juri_2'=>$request->input('juri_2'),
                'juri_3'=>$request->input('juri_3'),
            ];
            Setting::create($datas);

            // Redirect or respond as needed
            return redirect()->back()->with('success', 'Data saved successfully');
        }
    public function redirect(Request $request){
        $id_juri = $request->name;
        $role = $request->role;
        $arena = $request->arena;

        $data = [
            'name'=>$id_juri,
            'role'=>$role,
            'arena'=>$arena
        ];
        // check role
        if($role ==="juri-tanding"){
            return view('penilaian.juri',compact('id_juri','arena'));
        }
        elseif($role === "dewan-tanding"){
            return view('penilaian.dewan',compact('id_juri','arena'));
        }
        elseif($role == "arena"){
            $status = 'arena';
            return view('admin.arena.panel',compact('arena','status'));
        }
        elseif($role == "arena-jadwal"){
            $status = 'arena';
            return view('admin.arena.jadwal',compact('arena','status'));
        }
        elseif($role == "score"){
                $data = arena::where('id',$arena)->first();
                    if($data->status === "tanding"){
                        return view('penilaian.score',compact('arena'));
                    }
                    elseif($data->status === "Ganda_Kreatif" || $data->status === "Solo_Kreatif"){
                        return view('seni.score',compact('arena'));
                    }
                    else{
                        return view('loginscore');
                    }
        }
        elseif($role == 'timer'){
            return view('timer',compact('arena'));
        }
        elseif($role == 'juri-ganda'){
            return view('seni.ganda.juri',compact('id_juri','arena'));
        }
        elseif($role == 'dewan-ganda'){
            return view('seni.ganda.dewan',compact('id_juri','arena'));
        }
        elseif($role == 'juri-tunggal'){
            return view('seni.tunggal.juri',compact('id_juri','arena'));
        }
        elseif($role == 'dewan-tunggal'){
            return view('seni.tunggal.dewan',compact('id_juri','arena'));
        }
        else{
            dd($data);
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