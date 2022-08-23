<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Santri</title>
    <style>
        td {
            text-align: center;
            font-size: 9px;
        }
        th {
            font-size: 9px;
        }

        p {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            font-family: 'Times New Roman', Times, serif;
        }

        span {
            font-size: 15px;
        }
        #customers {
        font-family: 'Times New Roman', Times, serif;
        border-collapse: collapse;
        width: 100%;
        }

        #customers td, #customers th {
            text-align: left;
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #175e4686;
            color: black;
        }
    </style>
</head>
<body>
        <table style="margin-left:auto;margin-right:auto">
            <tr>
                <td>
                    <img src="https://i.postimg.cc/Qd2Pfmbr/logo.png"  width="100px" height="100">
                </td>
                <td>
                    <font size="4">YAYASAN BUSTANUL FALAH</font><br>
                    <font size="5"><b>PONPES BUSTANUL FALAH</b></font><br>
                    <font size="2">Jl Tebu Indah 99 Kembiritan Genteng Banyuwangi ( 68465 )</font><br>
                    <font size="2">Email : ponpesbustanulfalahgenteng@gmail.com</font>
                </td>
            </tr>
        </table>
        <hr>
        <p>Data Calon Santri Baru <br>
            <span>Tahun Ajaran 2022/2023</span>
        </p>

        <table id="customers">

            <tr>
                <th>No</th>
                <th>Nisn</th>
                <th>No.Pendaftaran</th>
                <th>Nama</th>
                <th>Tempat & Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Foto</th>
                <th>Kelas</th>
                <th>Ayah</th>
                <th>Tahun Ajaran</th>
            </tr>
            @foreach ($data as $row)
            <tr>
                <td width='3%' style="text-align: center">{{ $loop->iteration}}</td>
                <td width='3%'>{{ $row->nisn }}</td>
                <td width='3%'>{{ $row->no_pend }}</td>
                <td width='18%'>{{ $row->name }}</td>
                <td width='20%'>{{ $row->tempatLahir }},{{ date('d-m-Y', strtotime($row->tanggalLahir)) }}</td>
                <td width='10%'>{{ $row->jenisKelamin }}</td>
                <td><img src="{{ asset('upload/image/'.$row->image) }}" alt="image" width="25px"></td>
                <td width='10%'>{{ $row->kelas->kelas }} {{ $row->kelas->madrasah }}</td>
                <td>{{ $row->nameAyah }}</td>
                <td>{{  $row->tahunAjaran->tahun_ajaran}}</td>
            </tr>
            @endforeach
        </table>
</body>
</html>
