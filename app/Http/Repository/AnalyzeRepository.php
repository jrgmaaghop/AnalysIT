<?php
namespace App\Http\Repository;


use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AnalyzeRepository
{
    public $clean_collection = null;
    public $sorted_collection = null;
    public $collection = null;
    public $numStuds = 0;
    public $numItems = 0;

    public function prepareDataCollection($collection)
    {
        $data = [];

        foreach ($collection as $collect) {
            $total = 0;
            foreach ($collect['scores'] as $key => $scores) {
                $data[$collect['name']][$key] = (int)$scores['value'];
                $total += (int)$scores['value'];
            }
            $data[$collect['name']]['total'] = (int)$total;
        }

        return $data;
    }

    public function sortCollection($collection)
    {
        $collect = collect($collection);

        return $collect->sortByDesc('total');
    }

    public function generate($num_studs, $num_items, $collection)
    {
        $this->collection = $collection;
        $this->numItems = $num_items;
        $this->numStuds = $num_studs;

        $this->clean_collection = collect($this->prepareDataCollection($collection));
        $this->sorted_collection = $this->sortCollection($this->clean_collection);

//        return $this->sorted_collection;


//        $spreadsheet = new Spreadsheet();
//        $sheet = $spreadsheet->getActiveSheet();
//        $sheet->setCellValue('A1', 'Hello World !');
//        $sheet->setCellValue('A2', 'Hello World !');
//        $sheet->setCellValue('A3', 'Hello World !');
//
//        $streamedResponse = new StreamedResponse();
//        $streamedResponse->setCallback(function () use ($spreadsheet) {
//            // $spreadsheet = //create you spreadsheet here;
//            $writer =  new Xlsx($spreadsheet);
//            $writer->save('php://output');
////            $writer->getSpreadsheet();
//        });
//
//        $streamedResponse->setStatusCode(200);
//        $streamedResponse->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
////        $streamedResponse->headers->set('Content-Type', 'application/vnd.ms-excel');
//        $streamedResponse->headers->set('Content-Disposition', 'attachment; filename="asof.xls"');
//        $streamedResponse->send();
    }

    public function makeAllDataTable($sheet)
    {

    }
}
