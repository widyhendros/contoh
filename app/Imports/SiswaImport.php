<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Users;
use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

class SiswaImport implements ToModel, SkipsEmptyRows, WithHeadingRow, WithEvents
{
    public $sheetName = '';
    public $thn_masuk = '';

    function __construct($thn_masuk){
        $this->thn_masuk = $thn_masuk;
    }
  

/**
* @param array $row
*
* @return \Illuminate\Database\Eloquent\Model|null
*/

    public function model(array $rows)
    {
        // echo json_encode($rows);exit();
        // echo json_encode($rows);exit();
        // echo \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($rows['tanggal_lahir'])->format('Y-m-d');exit();

        $siswa = Siswa::where('nisn', $rows['nisn'])->first();
        

        switch ($this->sheetName) {
            case 'abk':
                $nmjalurmasuk='ABK';
                break;
            case 'ketm':
                $nmjalurmasuk='KETM';
                break;
            case 'kondisi-tertentu':
                $nmjalurmasuk='Kondisi Tertentu';
                break;
            case 'perpindahan':
                $nmjalurmasuk='Perpindahan';
                break;
            case 'prestasi':
                $nmjalurmasuk='Prestasi Kejuaran';
                break;
            case 'prestasi-rapor':
                $nmjalurmasuk='Prestasi Rapor';
                break;
            case 'zonasi':
                $nmjalurmasuk='Zonasi';
                break;
            default:
                $nmjalurmasuk='Zonasi';
                break;
        }

        if ($siswa) {
            $siswa->nmlengkap = ($rows['nama'] ?? $siswa->nmlengkap);
            $siswa->nis = ($rows['nis'] ?? $siswa->nis);
            $siswa->nmjurusan = ($rows['jurusan'] ?? $siswa->nmjurusan);

            $siswa->save();
        } else {
            Users::create([
                'name' => $rows['nama'],
                'nisn' => $rows['nisn'],
                'password' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($rows['tanggal_lahir'])->format('dmY'),
            ]);

            Siswa::create([
                'nmjalurmasuk' => $nmjalurmasuk,
                'nisn' => $rows['nisn'],
                'nik' => $rows['nik'],
                'nmlengkap' => $rows['nama'],
                'jk' => $rows['jenis_kelamin'],
                'tmplahir' => $rows['tempat_lahir'],
                'tanggallahir' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($rows['tanggal_lahir'])->format('Y-m-d'),
                'thn_masuk'=> $this->thn_masuk
            ]);
        }
        //return an eloquent object
    }


    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function(BeforeSheet $event) {
                $this->sheetName = $event->getSheet()->getTitle();
            } 
        ];
    }

}
