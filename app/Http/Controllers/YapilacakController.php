<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yapilacaklar;
use App\Models\User;

class YapilacakController extends Controller
{
    public function __invoke($listeid,Request $request){
        Yapilacaklar::create([
            'sahipid'=>auth()->user()->id,
            'listeid'=>$listeid,
            'yapilacak'=>$request->yapilacak,
            'durum'=>'yapilmadi',
        ]);
        return redirect()->route('panolar.show',session()->get('panoid'))->withBasarili('Yapılacak başarıyla eklendi.');
    }

    public function durumguncelle($yapilacakid,$durum){
        $yapilacak = Yapilacaklar::find($yapilacakid);
        $yapilacak->durum = $durum;
        $yapilacak->save();
        return redirect()->back()->withBasarili('Durum başarıyla güncellendi.');
    }

    public function sil($yapilacakid){
        Yapilacaklar::destroy($yapilacakid);
        return redirect()->back()->withBasarili('Yapılacak başarıyla silindi.');

    }
}
