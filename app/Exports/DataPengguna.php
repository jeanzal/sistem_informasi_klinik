<?php

namespace App\Exports;
use App\Models\Pengguna;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class DataPengguna implements fromCollection ,ShouldAutoSize,WithHeadings,WithEvents
{


    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Role',
            'Email',
            'Gambar',
        ];
    }
        public function registerEvents(): array
    {
       return [
           AfterSheet::class=>function(AfterSheet $event){
           $cellRange = 'A1:E1';
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
        $data = Pengguna::all();
        $no = 1;
        foreach ($data as $row){
            $collect[] =[
              'no'=>$no++,
              'name'=>$row->name,
              'role'=>$row->role,
              'email'=>$row->email,
              'image'=>$row->image,

            ];
        }
        $pengguna = collect($collect)->map(function($id){
            return(object)$id;
        });
        return $pengguna;


    }


}
