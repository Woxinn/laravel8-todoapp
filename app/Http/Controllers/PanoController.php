<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panolar;
use App\Models\User;
use App\Models\Listeler;
use App\Models\Yapilacaklar;
use App\Http\Requests\PanoRequest;

class PanoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $panolar = Panolar::where('sahip', User::value('id'))->get();
        return view('panolar', compact('panolar'));
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
    public function store(PanoRequest $request)
    {
        Panolar::create([
            'sahip' => User::value('id'),
            'baslik' => $request->pbaslik,
            'aciklama' => $request->paciklama,
        ]);
        return redirect()->route('panolar.index')->withBasarili('Pano başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listeler = Listeler::where('sahipid', User::value('id'))->where('panoid', $id)->get();



        return view('listeler')->with(compact('listeler'))->with('panoid', $id);
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
        $listeler = Listeler::where('panoid', $id)->get();
        foreach ($listeler as $liste) {
            Yapilacaklar::where('listeid', $liste->id)->delete();
        }
        Listeler::where('panoid', $id)->delete();
        Panolar::destroy($id);
        return redirect()->route('panolar.index')->withBasarili('Pano ve altındaki kayıtlar başarıyla silindi.');
    }
}
