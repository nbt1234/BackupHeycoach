<?php

namespace App\Exports;

use App\Models\WeekTrackingModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;


use Auth;

class WeeklyActionNotesExport implements FromCollection, WithHeadings,  WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($formdata)
    {
        $this->formdata = $formdata;
    }

    public function headings(): array
    {
        return [["Week", "Date", "Categories", "Action Notes"]];
    }


    public function collection()
    {

       $export_data = WeekTrackingModel::select('weekly_category_data', 'created_at')->where('user_id', Auth::guard('frontuser')->user()->id)->where('focused_goal_id', $this->formdata['current_goal_id'])->get();
       // dd($export_data);
       $count = 0;
       $week = 1;
       foreach ($export_data as $key => $value) {
        
           $un_ser = unserialize($value->weekly_category_data);
           // dd($un_ser);

           foreach($un_ser as $key2 => $value2){
                $array[$count]['week'] = "Week".$week; 
                $array[$count]['date'] = date('d-F-Y', strtotime($value->created_at));
                $array[$count]['category'] = $key2;
                $array[$count]['action_note'] = $value2['action_note'];
                $count++;
           }
            $week++;

           $array[$count."d"][] = '';
           // $array[$count."c"]['category'] = '';
           // $array[$count."a"]['action_note'] = '';
       }

       // dd($array);

      return collect($array);

    }


     public function registerEvents(): array
    {
        
        $styleArray = [
        'font' => [
        'bold' => true,
        ],

         'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ]
        ]

        ];
        return [
            AfterSheet::class    => function(AfterSheet $event) use ($styleArray)
            {
                $cellRange = 'A1:D1'; // All headers
                //$event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setName('Calibri');
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                $event->sheet->getStyle($cellRange)->ApplyFromArray($styleArray);
                $event->sheet->getStyle($cellRange)->ApplyFromArray($styleArray);
                $event->sheet->getStyle('D')->getAlignment()->setWrapText(true);
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(50);

                $event->sheet->getDelegate()->getStyle('A1:D1')->getFont()->setSize(18);
                $event->sheet->getDelegate()->getStyle('A1:D1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            },
        ];
    }

   
}
