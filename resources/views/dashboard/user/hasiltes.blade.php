@extends("sb_user.app")
@section('title', 'User | Hasil Tes' )
@section('hasiltes', 'active' )


@section('content')
    {{-- @foreach ($user as $data) --}}
    @foreach ($admin as $row)
        @if ($row->tutup == 1)
        <div class="card mt-4">
            <div class="card-header text-light fw-bold fs-6" style="background-color: #064635">
                Hasil Tes Calon Santri
            </div>
            <div class="card-body shadow">
                <div class="col">
                    <table class="table table-bordered table-hover table-responsive-lg">
                        <thead>
                            <tr class="text-center" style="color: black">
                                <th scope="col">No.Pendaftaran</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Total Nilai Al-Qur'an</th>
                                <th scope="col">Total Nilai Kitab</th>
                                <th scope="col">Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center" style="color: rgba(0, 0, 0, 0.651)">
                                <td>{{ Auth::user()->no_pend }}</td>
                                <td>{{ Auth::user()->name }}</td>
                                <td>
                                    @foreach(Auth::user()->nilaiAlquran as $t)
                                        {{ $t->hasil }}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach(Auth::user()->nilaiKitab as $t)
                                    {{ $t->hasil }}
                                    @endforeach
                                </td>
                                <td>
                                    {{ Auth::user()->kelas->kelas }} {{ Auth::user()->kelas->madrasah }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <small id="pengumuman" class="form-text text-danger fst-italic" style="font-size: 12px">
                        * Kelas belum fiks!
                    </small>
                </div>
            </div>
        </div>
        @else
        <div class="card mt-4">
            <div class="card-header text-light fw-bold fs-6" style="background-color: #064635">
                Hasil Tes Calon Santri
            </div>
            <div class="card-body shadow">
                <div class="col">
                    <table class="table table-bordered table-hover table-responsive-lg">
                        <thead>
                            <tr class="text-center" style="color: black">
                                <th scope="col">No.Pendaftaran</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Total Nilai Al-Qur'an</th>
                                <th scope="col">Total Nilai Kitab</th>
                                <th scope="col">Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center" style="color: rgba(0, 0, 0, 0.651)">
                                <td></td>
                                <td></td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    @endforeach
    {{-- @endforeach --}}



@endsection
