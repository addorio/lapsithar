<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan</title>
</head>
<style type="text/css">
table th{
    text-align:left;
}

.rata-kiri-kanan{
    text-align:justify;
}
</style>
<body>

    <div id="container">

        <h1>Laporan </h1>

        <div id="body">
        @php
                $no=1;
                @endphp
                @foreach ($laporan as $row)
            <table border="1" style="border-collapse: collapse;" width="100%" cellpadding="6">
        
                <tr>
                    <td colspan="2" style="background-color:darkblue; color:ivory;">{{$no++}}</td>
                </tr>
                <tr>
                    <th width="10%">OPD</th>
                    <td>{{$row->nama_opd}}</td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td>{{date('d - m - Y, (h:i:s)', strtotime($row->tanggal))}}</td>
                </tr>
                <tr>
                    <th>Judul</th>
                    <td>{{$row->judul}}</td>
                </tr>
                <tr>
                    <th>Bidang</th>
                    <td>{{$row->nama_bidang}}</td>
                </tr>
                <tr>
                    <th>Keterangan</th>
                    <td>{{$row->keterangan}}</td>
                </tr>
                <tr>
                    <th>Pelapor</th>
                    <td>{{$row->nama}}</td>
                </tr>
                <tr>
                    <th valign="top">Isi</th>
                    <td class="rata-kiri-kanan">{{$row->isi_laporan}}</td>
                </tr>
                <tr>
                    <th valign="top">Tindakan</th>
                    <td class="rata-kiri-kanan">{{$row->tindakan}}</td>
                </tr>
            </table>
            <pagebreak/>
            @endforeach

        </div>

    </div>

</body>

</html>