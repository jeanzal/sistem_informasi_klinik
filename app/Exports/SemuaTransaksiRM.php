<?php

namespace App\Exports;
use App\Models\Transaction;
use App\Models\Pasien;
use App\Models\Admin;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class SemuaTransaksiRM implements fromCollection ,ShouldAutoSize,WithHeadings,WithEvents
{


    public function headings(): array
    {
        return [
            'No',
            'Tanggal Transaksi',
            'Nama Pasien',
            'Status',
            'Keterangan',
            'Petugas PenanggungJawab',
        ];
    }
        public function registerEvents(): array
    {
       return [
           AfterSheet::class=>function(AfterSheet $event){
           $cellRange = 'A1:F1';
           $styleArray =[
               'font'=>[
                   'bold'=>true,
                   'color'=>['rgb'=>'0000FF'],
                   'size'=>15,
               ],
               'border'=>[
                 'outline' =>[
                     'borderstyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                     'color'=>['argb'=>'FF0000FF']
                 ] ,
               ],
           ];
           $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray);
           }

       ];
    }

    public function collection()
    {
        // TODO: Implement collection() method.
        $data = Transaction::select('transactions.*','pasien.name as nama_pasien','admins.name as nama_pengguna')
        ->join('pasien','pasien.id','=','transactions.pasien_id')
        ->join('admins','admins.id','=','transactions.pengguna_id')
        ->get();
        $no = 1;
        foreach ($data as $row){
            if($row->ket == "Rekam Medis"){
                $collect[] =[
                'no'=>$no++,
                'date'=>$row->date,
                'pasien_id'=>$row->nama_pasien,
                'status'=>$row->status,
                'ket'=>$row->ket,
                'pengguna_id'=>$row->nama_pengguna,

                ];
            }
        }
        $trans = collect($collect)->map(function($id){
            return(object)$id;
        });
        return $trans;
    }
}
