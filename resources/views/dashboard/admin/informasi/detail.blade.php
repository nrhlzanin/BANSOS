@extends('dashboard.layouts.main')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
        <div
            class="d-flex text-center justify-content-between flex-column flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Detail Bantuan Sosial</h1>
        </div>
        <div class="col-lg-12 shadow p-4">
            {{-- nama bantuan --}}
            <h2 class="h4">{{ $informasi->judul_informasi }}</h2>
            <small class="text-muted mb-2 d-block" style="margin-top: -5px !important;">Updated
                {{ $informasi->created_at->diffForHumans() }}</small>
            {{-- deskripsi --}}
            <p>{!! $informasi->deskripsi !!}</p>
            <ul>
                <li class="mb-3">
                    <div class="d-flex">
                        <div class="d-flex justify-content-between" style="width: 100px !important">
                            <span>Provinsi</span>
                            <span>:</span>
                        </div>
                        <div class="ms-2">{{ $informasi->provinsi }}</div>
                    </div>
                </li>
                <li class="mb-3">
                    <div class="d-flex">
                        <div class="d-flex justify-content-between" style="width: 100px !important">
                            <span>Kabupaten</span>
                            <span>:</span>
                        </div>
                        <div class="ms-2">{{ $informasi->kabupaten }}</div>
                    </div>
                </li>
                <li class="mb-3">
                    <div class="d-flex">
                        <div class="d-flex justify-content-between" style="width: 100px !important">
                            <span>Kecamatan</span>
                            <span>:</span>
                        </div>
                        <div class="ms-2">{{ $informasi->kecamatan }}</div>
                    </div>
                </li>
                <li class="mb-3">
                    <div class="d-flex">
                        <div class="d-flex justify-content-between" style="width: 100px !important">
                            <span>Desa</span>
                            <span>:</span>
                        </div>
                        <div class="ms-2">{{ $informasi->desa }}</div>
                    </div>
                </li>
                <li class="mb-3">
                    <div class="d-flex">
                        <div class="d-flex justify-content-between" style="width: 100px !important">
                            <span>Jenis Bantuan</span>
                            <span>:</span>
                        </div>
                        <div class="ms-2">{{ $jenisBantuan[0]['nama_bantuan'] }}</div>
                    </div>
                </li>
                <li class="mb-3">
                    <div class="d-flex">
                        <div class="d-flex justify-content-between" style="width: 100px !important">
                            <span>Jumlah Bantuan</span>
                            <span>:</span>
                        </div>
                        <div class="ms-2">Rp. {{ $informasi->jmlh_bantuan }}</div>
                    </div>
                </li>
                <li class="mb-3">
                    <div class="d-flex">
                        <div class="d-flex justify-content-between" style="width: 100px !important">
                            <span>Target penerima</span>
                            <span>:</span>
                        </div>
                        <div class="ms-2">{{ $informasi->target_penerima }} Orang</div>
                    </div>
                </li>
                <li class="mb-3">
                    <div class="d-flex">
                        <div class="d-flex justify-content-between" style="width: 100px !important">
                            <span>Jumlah Bantuan Per Orang</span>
                            <span>:</span>
                        </div>
                        <div class="ms-2">Rp. {{ $informasi->bantuan_perorang }}</div>
                    </div>
                </li>
                <li class="mb-3">
                    <div class="d-flex">
                        <div class="d-flex justify-content-between" style="width: 100px !important">
                            <span>Penerima</span>
                            <span>:</span>
                        </div>
                        <div class="ms-2 badge bg-primary"><a href="/penerima"
                                class="text-white text-decoration-none penerima">Penerima</a></div>
                    </div>
                </li>
            </ul>
            <div class="aksi d-flex justify-content-end mt-5">
                <a href="/dashboard/admin/informasi" class="btn btn-warning text-white">Kembali</a>
                <a href="/dashboard/admin/informasi/{{ $informasi->id }}/edit" class="btn btn-primary ms-2">Edit</a>
                <form action="/dashboard/admin/informasi/{{ $informasi->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn fs-6 btn-danger ms-2" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                </form>
            </div>
        </div>
    </main>
@endsection
