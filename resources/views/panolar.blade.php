<x-app-layout>
    <x-slot name="header">
        Panolar
    </x-slot>

    <div class="row">
        @foreach ($panolar as $pano)
        <div class="col-md-2 mt-2">
            <div class="card" style="min-height:200px; width: 15rem;">
                <div class="card-body d-flex flex-column justify-content-center mx-auto">
                    <h5 class="card-title">{{ $pano->baslik }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$pano->aciklama}}</h6>
                </div>
                
                <a href="{{route('panolar.show',$pano->id)}}" class="btn btn-success m-2">Panoya Git</a>
                <div class="row mx-auto">
                    <div class="col-md-10">
                        <label for="olusturulmat" class="text-muted" style="font-size: 15px;">Oluşturulma Tarihi</label>
                        <p class="text-muted" style="font-size: 15px;" id="olusturulmat">{{ $pano->created_at->format('d-m-Y - m:H') }}</p>
                    </div>
                    <div class="col-md-2">
                        <form action="{{route('panolar.destroy',$pano->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button style="float: right;" type="submit" class="btn btn-sm btn-danger">Sil</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-md-2 mt-2">
            <div class="card" style="min-height:160px; width: 15rem;">
                <div class="card-body mx-auto">
                    <form action="{{route('panolar.store')}}" method="post">
                        @csrf
                        <h5 class="card-title"><input type="text" class="form-control" name="pbaslik" placeholder="Pano Başlığı" value="{{old('pbaslik')}}"></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><input type="text" name="paciklama" class="form-control" placeholder="Pano Açıklaması" value="{{old('paciklama')}}"></h6>
                        <button type="submit" class="btn btn-primary">Pano Oluştur</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>