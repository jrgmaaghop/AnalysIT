<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AnalyzeController extends Controller
{
    public function __construct()
    {
    }

    public function analyze(Request $request)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');

        $streamedResponse = new StreamedResponse();
        $streamedResponse->setCallback(function () use ($spreadsheet) {
            // $spreadsheet = //create you spreadsheet here;
            $writer =  new Xlsx($spreadsheet);
            $writer->save('php://output');
        });

        $streamedResponse->setStatusCode(200);
        $streamedResponse->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $streamedResponse->headers->set('Content-Disposition', 'attachment; filename="asof.xls"');
        $streamedResponse->send();

        return response()->json(['scores' => $request['title']]);
    }
}
