<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\juri;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\Perserta;
use App\arena;
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
                'kelas' => 'nullable|array',
            ]);

            // Process the form data
            $name = $request->input('name');
            $kelas = $request->input('kelas', []);

            // Create and save a new Data model instance
            $data = new arena([
                'name' => $name,
                'status' => implode(',', $kelas), // Assuming 'kelas' is a comma-separated list
                // Add other fields as needed
            ]);

            $data->save();

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