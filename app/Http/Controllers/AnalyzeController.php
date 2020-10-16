<?php

namespace App\Http\Controllers;

use App\Http\Repository\AnalyzeRepository;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AnalyzeController extends Controller
{
    public $repository = null;
    public function __construct(AnalyzeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function analyze(Request $request)
    {
        $collection = collect($request['data']);
//        $this->repository->generate($num_studs, $num_items, $request['data']);
        $sample = $this->repository->generate($request['num_studs'], $request['num_items'], $collection);
        var_dump($sample);
        var_dump($request->all());
        return response()->json(['scores' => $collection]);
    }
}
