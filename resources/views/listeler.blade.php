<x-app-layout>
    <x-slot name="header">
        Listeler
    </x-slot>
    {{ session()->put('panoid',$panoid) }}
    
    <div class="row">
    @foreach ($listeler as $liste)
    <div class="col-md-4 mt-2">
            <div class="card" style="min-height:260px;">
                <div class="card-body">
                    <h5 class="card-title fw-bold listebaslik">{{ $liste->baslik }}</h5>
                    <ul class="list-group list-group-flush">
                        @foreach (App\Models\Yapilacaklar::where('listeid',$liste->id)->where('sahipid',auth()->user()->id)->get() as $yapilacak)
                        <li class="list-group-item liste">
                            <div class="row align-items-center">
                                <div class="col-md-1"><input type="checkbox" disabled @if ($yapilacak->durum == 'yapildi') {{ 'checked' }} @endif name="test" class="todocheck form-check-input mr-3" id=""></div>
                                <div class="col-md-4 @if ($yapilacak->durum == 'yapildi') {{ 'text-decoration-line-through' }} @endif">{{ $yapilacak->yapilacak }}</div>
                                <div class="col-md-7">
                                    <div style="float: right;">
                                    @if ($yapilacak->durum == "yapildi")
                                        @php    
                                            $yazi = 'Yapılmadı';
                                            $butontip = 'warning';
                                            $guncelle = 'yapilmadi';
                                        @endphp
                                    @else
                                        @php    
                                            $yazi = 'Yapıldı';
                                            $butontip = 'success';
                                            $guncelle = 'yapildi';
                                        @endphp
                                    @endif
                                        <a href="{{route('yapilacaklar.durum',['yapilacakid'=>$yapilacak->id,'durum'=>$guncelle])}}" class="btn btn-sm btn-{{ $butontip }}">
                                         {{ $yazi }} olarak işaretle</a>
                                        <button class="btn btn-sm btn-secondary">Düzenle</button>
                                        <a href="{{route('yapilacaklar.sil',$yapilacak->id)}}" class="btn btn-sm btn-danger">Sil</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        <li class="list-group-item liste">
                            <div class="row align-items-center">
                                <div class="col-md-1"></div>
                                <form action="{{route('yapilacaklar',[$liste->id])}}" method="GET">
                                    @csrf
                                    <div class="row justify-content-center">
                                    <div class="col-md-6"><input type="text" name="yapilacak" class="form-control mr-3" placeholder="Yapılacak Ekle"></div>
                                    <div class="col-md-2">
                                        <div style="float: right;">
                                            <button type="submit" class="btn btn-md btn-primary">Ekle</button>
                                        </div>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
        

        <div class="col-md-4 mt-2">
            <div class="card" style="min-height:260px;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h5 class="card-title fw-bold listebaslik">Yeni Liste Ekle</h5>
                        <form action="{{route('listeler.store')}}" method="post">
                            @csrf
                            <input type="text" name="lbaslik" class="form-control" placeholder="Liste Başlığı">
                            <button type="submit" style="width: 100%;" class="btn btn-primary mt-2">Ekle</button>
                        </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>