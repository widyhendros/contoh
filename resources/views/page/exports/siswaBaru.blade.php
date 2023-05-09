<table style="border: 1px solid black">
    <thead style="border: 1px solid black;">
    <tr>
        <th>No</th>
        <th>Tahun Masuk</th>
        <th>NISN</th>
        <th>Nama</th>
        <th>Pilihan Minat 1</th>
        <th>Pilihan Lintas Minat 1</th>
        <th>Pilihan Minat 2</th>
        <th>Pilihan Lintas Minat 2</th>
        <th>Indonesia</th>
        <th>Inggris</th>
        <th>Matematika</th>
        <th>IPA</th>
        <th>IPS</th>
        
        <th>Indonesia</th>
        <th>Inggris</th>
        <th>Matematika</th>
        <th>IPA</th>
        <th>IPS</th>
        
        <th>Indonesia</th>
        <th>Inggris</th>
        <th>Matematika</th>
        <th>IPA</th>
        <th>IPS</th>
        
        <th>Indonesia</th>
        <th>Inggris</th>
        <th>Matematika</th>
        <th>IPA</th>
        <th>IPS</th>
        
        <th>Indonesia</th>
        <th>Inggris</th>
        <th>Matematika</th>
        <th>IPA</th>
        <th>IPS</th>
        <th>NIS</th>
        <th>Jurusan</th>
        {{-- <th>Lintas Minat Pilihan 1</th>
        <th>Pilihan Minat 2</th>
        <th>Lintas Minat Pilihan 1</th> --}}
    </tr>
    </thead>
    <tbody>
    @foreach($siswa as $key => $row)
        <tr>
            <td width="20">{{ $key+1 }}</td>
            <td width="20">{{ $row->thn_masuk }}</td>
            <td width="20">{{ $row->nisn }}</td>
            <td width="20">{{ $row->nmlengkap }}</td>
             {{-- Peminatan --}}
             <td>{{ $row->pilminatsatu }}</td>
             <td>{{ $row->linminpilsatu }}</td>
             <td>{{ $row->pilminatdua }}</td>
             <td>{{ $row->linminpildua }}</td>
             {{-- raport --}}
             <td>{{ $row->bindosatu }}</td>
             <td>{{ $row->bindodua }}</td>
             <td>{{ $row->bindotiga }}</td>
             <td>{{ $row->bindoempat }}</td>
             <td>{{ $row->bindolima }}</td>
             <td>{{ $row->bingsatu }}</td>
             <td>{{ $row->bingdua }}</td>
             <td>{{ $row->bingtiga }}</td>
             <td>{{ $row->bingempat }}</td>
             <td>{{ $row->binglima }}</td>
             <td>{{ $row->mtksatu }}</td>
             <td>{{ $row->mtkdua }}</td>
             <td>{{ $row->mtktiga }}</td>
             <td>{{ $row->mtkempat }}</td>
             <td>{{ $row->mtklima }}</td>
             <td>{{ $row->ipasatu }}</td>
             <td>{{ $row->ipadua }}</td>
             <td>{{ $row->ipatiga }}</td>
             <td>{{ $row->ipaempat }}</td>
             <td>{{ $row->ipalima }}</td>
             <td>{{ $row->ipssatu }}</td>
             <td>{{ $row->ipsdua }}</td>
             <td>{{ $row->ipstiga }}</td>
             <td>{{ $row->ipsempat }}</td>
             <td>{{ $row->ipslima }}</td>
            
            {{-- <td>{{ $row->pilminatsatu }}</td>
            <td>{{ $row->linminpilsatu }}</td>
            <td>{{ $row->pilminatdua }}</td>
            <td>{{ $row->linminpildua }}</td> --}}
        </tr>
    @endforeach
    </tbody>
</table>