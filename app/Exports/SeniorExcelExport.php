<?php

namespace App\Exports;

use App\Models\SeniorCitizen;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SeniorExcelExport implements FromView, ShouldAutoSize
{
    private $seniorsQuery;

    public function __construct($seniorsQuery)
    {
        $this->seniorsQuery = $seniorsQuery;
    }

    public function view(): View
    {
        $totalusers  = $this->seniorsQuery->get();
        return view('partials.viewPDF', ['totalusers' => $totalusers ]);
    }
}
