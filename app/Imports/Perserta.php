<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\category;
use App\PersertaModel;
use App\kelas;
use App\KontigenModel;

class Perserta implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $item){
            $name = $item[1];
            $gender = $item[4];
            $kontigen = $item[2];
            $kelas = $item[3];
            $category = $item[5];
            $check_kelas = kelas::where('name',$kelas)->first();
            if(empty($check_kelas)){
                kelas::create(
                    [
                        'name'=>$kelas
                    ]
                );
            }
            $id_kelas = kelas::where('name',$kelas)->value('id');

            $check_category = category::where('name',$category)->first();
            if(empty($check_category)){
                category::create(
                    [
                        'name'=>$category
                    ]
                );
            }
            $id_category = category::where('name',$category)->value('id');

            $check_kontigen = KontigenModel::where('kontigen',$kontigen)->first();
            if(empty($check_kontigen)){
                KontigenModel::create(
                    [
                        'kontigen'=>$kontigen
                    ]
                );
            }
            $id_kontigen = KontigenModel::where('kontigen',$kontigen)->value('id');
            $tim = PersertaModel::where('status','biru')->latest()->first();
            if(empty($tim)){
                PersertaModel::create([
                    'name'=>$name,
                    'id_kontigen'=> $id_kontigen,
                    'category'=> $id_category,
                    'kelas'=>$id_kelas,
                    'gender'=>$gender,
                    'status'=>'biru'
                ]);
            }
            else{
                PersertaModel::create([
                    'name'=>$name,
                    'id_kontigen'=> $id_kontigen,
                    'category'=> $id_category,
                    'kelas'=>$id_kelas,
                    'gender'=>$gender,
                    'status'=>'merah'
                ]);
            }

            
        }
    }
}
