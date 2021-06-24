<x-app-layout>
    <x-slot name="header">
        Panolar
    </x-slot>

    <div class="row">
        <div class="col-md-2 mt-2">
            <div class="card" style="min-height:160px; width: 15rem;">
                <div class="card-body d-flex flex-column justify-content-center mx-auto">
                    <h5 class="card-title">Pano Başlığı</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Pano açıklaması</h6>
                </div>
            </div>
        </div>
        <div class="col-md-2 mt-2">
            <div class="card" style="min-height:160px; width: 15rem;">
                <div class="card-body mx-auto">
                    <form action="{{route('panolar.store')}}" method="post">
                        @csrf
                        <h5 class="card-title"><input type="text" class="form-control" name="pbaslik" placeholder="Pano Başlığı"></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><input type="text" name="paciklama" class="form-control" placeholder="Pano Açıklaması"></h6>
                        <button type="submit" class="btn btn-primary">Pano Oluştur</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>