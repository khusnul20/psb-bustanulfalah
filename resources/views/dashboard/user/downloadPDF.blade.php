<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulir</title>
    <style>
        .bt-1{
            border-top: 2px solid black;
        }
        .bb-1{
            border-bottom: 2px solid black;
        }
        .bl-1{
            border-left: 2px solid black;
        }
        .br-1{
            border-right: 2px solid black;
        }
        .mt-1{
            margin-top: 5px;
        }
        .mb-1{
            margin-bottom: 5px;
        }
        .p{
            padding-left: 10px;
        }
        table tr th, table tr td {
            text-align: left;
            font-size: 15px;
        }
        #customers {
        font-family: 'Times New Roman', Times, serif;
        width: 110%;
        }

        #customers td, #customers th {
            text-align: left;
            padding: 8px;
        }

        #customers th {
            text-align: left;
            color: black;
        }

        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: right;
            width: 40%;
            padding: 10px;
            height: 170px; /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        ul.a {
        list-style-position: outside;
        }
    </style>
</head>
<body>
    <table id="tabel1" style="margin-left:auto;margin-right:auto">
        <tr>
            <td>
                <img src="{{ asset('img/logo.png') }}"  width="100px" height="100">
            </td>
            <td style="text-align: center;">
                <font size="4">YAYASAN BUSTANUL FALAH</font><br>
                <font size="5"><b>PONPES BUSTANUL FALAH</b></font><br>
                <font size="2">Jl Tebu Indah 99 Kembiritan Genteng Banyuwangi ( 68465 )</font><br>
                <font size="2">Email : ponpesbustanulfalahgenteng@gmail.com</font>
            </td>
        </tr>
    </table>
    <hr>
    <div class="center full">
        <h2 style="text-align: center;">
            Tanda Bukti Pendaftaran Online Santri Baru <br>
            <span style="font-size: 17px;">PONPES BUSTANUL FALAH TAHUN AJARAN 2022</span>
        </h2>
    </div>
    <div class="bt-1 bb-1 bl-1 br-1">
        <div class="ful">
            <div style="display: inline-block; width: 70%">
                <table id="customers" style="margin-top: 110px; margin-left: 20px;">
                    <tr>
                        <th>No.Pendaftaran</th>
                        <td>:</td>
                        <td>{{ Auth::guard('web')->user()->no_pend }}</td>
                    </tr>
                    <tr>
                        <th>NISN</th>
                        <td>:</td>
                        <td>{{ Auth::guard('web')->user()->nisn }}</td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>:</td>
                        <td>{{ Auth::guard('web')->user()->name }}</td>
                    </tr>
                    <tr>
                        <th>Tempat & Tanggal Lahir</th>
                        <td>:</td>
                        <td>{{ Auth::guard('web')->user()->tempatLahir }}, {{ date('d-m-Y', strtotime(Auth::guard('web')->user()->tanggalLahir))}}</td>
                    </tr>
                    <tr>
                        <th>Tahun Ajaran</th>
                        <td>:</td>
                        <td>{{ Auth::guard('web')->user()->tahunAjaran->tahun_ajaran }}</td>
                    </tr>
                </table>
            </div>
            <img src="{{ asset('upload/image/'.Auth::guard('web')->user()->image) }}" alt="image" width="120px" style="margin-bottom: 20px; margin-left: 20px">
        </div>
    </div>
    <p style="font-size: 14px; font-weight: 800;">Nama diatas telah diterima sebagai santri baru di PONDOK PESANTREN BUSTANUL FALAH GENTENG Tahun Ajaran 2022/2023</p>

    <div class="row">
        <div class="column">
            <p>Banyuwangi, 27 September 2022 <br>
				<span>Pimpinan,</span><br>
				<span>Pondok Pesantren Bustanul Falah</span>
            </p>
            {{-- <div style="margin-top: 80px;"></div> --}}
            <div style="text-align: center;">
                <img src="{{ asset('img/ttd.png') }}"  width="100px" height="100">
            </div>
            <p style="font-weight: bold;">Dr. KH. Kholilur Rahman, M.Pd.I</p>
        </div>
    </div>

    <p style="font-size: 14px; font-weight: 800; margin-top: 100px;">Catatan : <br>
        <ul class="a">
            <li>Tanda bukti pendaftran ini harus dibawa saat melakukan daftar ulang</li>
        </ul>
    </p>
</body>
</html>
