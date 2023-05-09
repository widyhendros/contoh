<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Mutasi</title>
    <style>
        h5{
            text-align:center;
            font-weight: 900;
            font-size: 16px;
        }
        h2{
            text-align:center;
        }
        
        hr{
            margin-bottom: 30px;
        }

        .wrapper{
            display: flex;
            justify-content: center;
        }

        .wrapper > .logo21 > img{
            width: 50px;
            height: 50px;
        }

        .wrapper > .logopemprov > img{
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
<div class="wrapper">
    {{-- <div class="logo21">
        <img src="{{ asset('/images/logo/logo.png') }}" alt="logo21">
    </div> --}}
    <div class="tulisan">
        <h5>PEMERINTAH DAERAH PROVINSI JAWA BARAT</h5>
        <h5 style="margin-top: -25px">DINAS PENDIDIKAN</h5>
        <h5 style="margin-top: -25px">CABANG DINAS PENDIDIKAN WILAYAH VII</h5>
        <h2 style="margin-top: -25px">SEKOLAH MENENGAH ATAS NEGERI 21 BANDUNG</h2>
        {{-- <h2 style="margin-top: -25px">BANDUNG</h2> --}}
    </div>
    {{-- <div class="logopemprov">
        <img src="https://1.bp.blogspot.com/-H3vAuCq_84g/Ws7ziSuQ-2I/AAAAAAAAAag/YtrX5_r5J2gVYdMWt1DgDoqnLCttDuoPQCLcBGAs/s1600/SMA-Negeri-21-Bandung.jpg" alt="logo21">
        <img src="https://1.bp.blogspot.com/-H3vAuCq_84g/Ws7ziSuQ-2I/AAAAAAAAAag/YtrX5_r5J2gVYdMWt1DgDoqnLCttDuoPQCLcBGAs/s1600/SMA-Negeri-21-Bandung.jpg" alt="logo21">
    </div> --}}
</div>
<hr>
    <h4 style="text-align: center">DAFTAR SISWA MUTASI</h4>
    <div class="table-responsive">
        <table class="table" border="1" cellspacing="0" cellpadding="5">
            <thead class="bg-secondary text-white">
                <tr>
                    <th>NIS</th>
                    <th>NISN</th>
                    <th>Nama Lengkap</th>
                    <th>Tanggal Mutasi</th>
                    <th>Jenis Mutasi</th>
                    <th>Keterangan</th>
                    {{-- <th>AKSI</th> --}}
                </tr>
            </thead>

            @foreach($mutasi as $siswa)
            <tbody>
                <tr>
                    <td class="text-bold-500">{{$siswa->nis}}</td>
                    <td class="text-bold-500">{{$siswa->nisn}}</td>
                    <td class="text-bold-500">{{$siswa->nama}}</td>
                    <td class="text-bold-500">{{ date('d F Y', strtotime($siswa->tanggal)) }}</td>
                    <td class="text-bold-500">{{$siswa->jenis_mutasi}}</td>
                    <td class="text-bold-500">{{$siswa->catatan}}</td>
                    {{-- <td>
                                                    <a href="#" data-id="{{$siswa->id}}" class="btn icon btn-danger"><i
                        class="bi bi-x-lg"></i></a>
                    </td> --}}
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</body>

</html>