<?php

namespace App\Exports;

use App\Models\Jadwal;
use App\Models\Jam;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class JadwalExport implements FromCollection, WithHeadings, WithTitle, WithStyles
{
    protected $records;
    protected $mergeData = [];  // Menyimpan data untuk merge cells

    public function __construct($records)
    {
        // Menerima data yang dipilih untuk ekspor
        $this->records = $records;
    }

    public function collection()
    {
        // Mendapatkan data jam dan hari
        $jamList = Jam::all();
        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

        $data = [];

        foreach ($jamList as $jam) {
            $row = [$jam->Waktu];  // Memulai baris dengan jam

            foreach ($hariList as $hari) {
                // Mencari jadwal yang sesuai dengan jam dan hari
                $jadwalHari = $this->records->filter(function ($record) use ($jam, $hari) {
                    return $record->jamMulai->id == $jam->id && $record->hari->Nama_Hari == $hari;
                });

                // Jika ada jadwal untuk jam dan hari tersebut
                if ($jadwalHari->count() > 0) {
                    $courseDetails = '';
                    foreach ($jadwalHari as $jadwal) {
                        $durasi = $jadwal->jamSelesai->id - $jadwal->jamMulai->id + 1;
                        $courseDetails .= $jadwal->matkul->nama_mata_kuliah . "\n"
                            . 'Dosen: ' . ($jadwal->dosenPj->Nama_Dosen ?? '') . "\n";

                        if ($jadwal->dosenAnggota1 && $jadwal->dosenAnggota1->Nama_Dosen) {
                            $courseDetails .= 'Dosen: ' . $jadwal->dosenAnggota1->Nama_Dosen . "\n";
                        }

                        if ($jadwal->dosenAnggota2 && $jadwal->dosenAnggota2->Nama_Dosen) {
                            $courseDetails .= 'Dosen: ' . $jadwal->dosenAnggota2->Nama_Dosen . "\n";
                        }

                        if ($jadwal->dosenAnggota3 && $jadwal->dosenAnggota3->Nama_Dosen) {
                            $courseDetails .= 'Dosen: ' . $jadwal->dosenAnggota3->Nama_Dosen . "\n";
                        }

                        $courseDetails .= 'Ruangan: ' . ($jadwal->ruangan->Nama_Ruangan ?? '') . "\n";


                        // Menyimpan informasi untuk merge cells secara vertikal
                        $this->mergeData[] = [
                            'hari' => $hari,
                            'jamMulai' => $jadwal->jamMulai->id,
                            'jamSelesai' => $jadwal->jamSelesai->id,
                            'rowStart' => count($data) + 2,  // Menghitung baris berdasarkan data
                            'col' => count($row)  // Kolom tempat data ini ditempatkan
                        ];
                    }

                    // Menambahkan data untuk jadwal yang ada
                    $row[] = $courseDetails;
                } else {
                    $row[] = '';  // Jika tidak ada jadwal
                }
            }

            $data[] = $row;  // Menambahkan baris ke data hasil ekspor
        }

        return collect($data);  // Mengembalikan hanya data jadwal
    }

    public function headings(): array
    {
        return ['Waktu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
    }

    public function styles(Worksheet $sheet)
    {
        // Set the font size and style for headers
        $sheet->getStyle('A1:F1')->getFont()->setBold(true);

        // Set wrap text and alignment for each cell
        $sheet->getStyle('A2:F' . ($sheet->getHighestRow()))
            ->getAlignment()
            ->setWrapText(true)
            ->setVertical('center')
            ->setHorizontal('center');

        // Adjust column widths dynamically based on the content length
        $sheet->getColumnDimension('A')->setWidth(15);
        foreach (['B', 'C', 'D', 'E', 'F'] as $col) {
            // Adjust the column width based on the maximum length of content in the column
            $sheet->getColumnDimension($col)->setAutoSize(true);  // Auto-size column based on content
        }

        // Set row height to make it look more like a grid
        $sheet->getRowDimension(1)->setRowHeight(20); // Set height for header row
        for ($i = 2; $i <= $sheet->getHighestRow(); $i++) {
            $sheet->getRowDimension($i)->setRowHeight(40); // Set height for data rows
        }

        // Merge cells based on the mergeData
        foreach ($this->mergeData as $merge) {
            // Melakukan merge cells secara vertikal untuk setiap jadwal
            $startRow = $merge['rowStart'];  // Menggunakan 'rowStart' sebagai baris awal
            $endRow = $startRow + ($merge['jamSelesai'] - $merge['jamMulai']);  // Menentukan akhir baris berdasarkan durasi

            // Menghitung kolom berdasarkan index
            $col = chr(65 + $merge['col']);  // Konversi angka ke huruf kolom (A, B, C, D, dst.)

            // Melakukan merge cells dari baris startRow hingga endRow
            $sheet->mergeCells($col . $startRow . ':' . $col . $endRow);
        }
    }


    public function title(): string
    {
        return 'Jadwal Perkuliahan';
    }
}
