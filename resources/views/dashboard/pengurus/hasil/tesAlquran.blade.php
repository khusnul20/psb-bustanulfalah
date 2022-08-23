@extends("sb_pengurus.app")
@section('title', 'Hasil Tes Al-Quran' )
@section('tesAlquran', 'active' )
@section('main2', 'show' )


@section('content')

<div class="card shadow">
    <div class="card-header fs-5 fw-bold text-light text-center" style="background-color: #064635; border-top-left-radius: 5px; border-top-right-radius: 5px ">
        Nilai Tes Al-Qur'an
    </div>

    <div class="card-body">
        <table class="table table-hover align-middle table-responsive-lg table-bordered border-primary">
            <thead class="text-dark fw-bold ">
                <tr class="text-center" style="font-size: 13px; color: black">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelancaran Membaca</th>
                    <th scope="col">Makhorijul Huruf</th>
                    <th scope="col">Penempatan Tajwid</th>
                    <th scope="col" class="table-primary">Nilai Akhir</th>
                </tr>
            </thead>
            <tbody class="text-dark">
                @foreach ($nilaiAlquran as $row)
                <tr style="font-size: 13px" >
                    <th scope="row" style="color: black">{{ $loop->iteration}}</th>
                    <td>{{ $row->user->name}}</td>
                    <td>{{ $row->kelancaran_membaca}}</td>
                    <td>{{ $row->makhorijul_huruf}}</td>
                    <td>{{ $row->penempatan_tajwid}}</td>
                    <td class="fw-bold" style="color: black">{{ $row->hasil}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $nilaiAlquran->links() }}
    </div>
</div>





@endsection
