@extends("sb_pengurus.app")
@section('title', 'Tes Kitab' )
@section('nilaiKitab', 'active' )
@section('main', 'show' )


@section('content')

<div class="card shadow">
    <div class="card-header fs-5 fw-bold text-light text-center" style="background-color: #064635; border-top-left-radius: 5px; border-top-right-radius: 5px ">
        Tes Kitab Mabadi Fiqih
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between ">
            <form action="{{ route('pengurus.nilaiKitab') }}" method="get" class="d-flex" role="search">
                <input class="form-control me-2  " type="search" name="search" placeholder="Search" aria-label="Search" value="{{ request('search') }}" >
                <button class="btn text-light" type="submit" style="margin-bottom: 17px; background-color: #064635">Search</button>
            </form>
        </div>
        <table class="table table-hover align-middle table-responsive-lg table-bordered table-sm">
            <thead class="text-dark fw-bold ">
                <tr class="text-center" style="font-size: 14px">
                    <th scope="col">No</th>
                    <th scope="col">No.Pendaftaran</th>
                    <th scope="col">Tgl Pendaftaran</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tempat & Tanggal Lahir</th>
                    <th scope="col">JK</th>
                    <th scope="col">Foto</th>
                    {{-- <th scope="col">Nama Ayah</th> --}}
                    <th scope="col">Nilai</th>
                </tr>
            </thead>
            <tbody class="text-dark">
                @foreach ($user as $row)
                <tr style="font-size: 12px" >
                    <th scope="row">{{ $loop->iteration}}</th>
                    <td>{{ $row->no_pend}}</td>
                    <td>{{ date('d-m-Y', strtotime($row->created_at))  }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->tempatLahir }},{{ date('d-m-Y', strtotime($row->tanggalLahir))  }}</td>
                    <td>{{ $row->jenisKelamin }}</td>
                    <td>
                        <img src="{{ asset('upload/image/'.$row->image) }}" alt="image" width="30px">
                    </td>
                    {{-- <td>{{ $row->nameAyah }}</td> --}}
                    <td class="text-center">
                        <a href="/pengurus/addNilaiKitab/{{ $row->id }}" type="button" class="btn btn-outline-primary btn-sm"><i class="fa-solid fa-pen-to-square me-2"></i>Nilai</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $user->links() }}
    </div>
</div>



@endsection

