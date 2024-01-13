<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\juri;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\Perserta;
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