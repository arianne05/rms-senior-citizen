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
    private $seniorsQueryMale;
    private $seniorsQueryFemale;
    private $seniorsQueryPWD;
    private $seniorsQueryPension;
    private $seniorsQueryNonPension;

    public function __construct($seniorsQuery, $seniorsQueryMale, $seniorsQueryFemale, $seniorsQueryPWD,  $seniorsQueryPension, $seniorsQueryNonPension)
    {
        $this->seniorsQuery = $seniorsQuery;
        $this->seniorsQueryMale = $seniorsQueryMale;
        $this->seniorsQueryFemale = $seniorsQueryFemale;
        $this->seniorsQueryPWD = $seniorsQueryPWD;
        $this->seniorsQueryPension = $seniorsQueryPension;
        $this->seniorsQueryNonPension = $seniorsQueryNonPension;
    }

    public function view(): View
    {   
         // $totalusers = $seniorsQuery->get();
        // // $totalusers = $seniorsQueryPWD->get();

        

        $totalusers  = $this->seniorsQuery->get();
        $totalusers = $this->seniorsQueryPWD->get();
        $totalCount = $this->seniorsQuery->count();
        $totalMaleCount = $this->seniorsQueryMale
            ->where('sex', 'Male')
            ->count();
        $totalFemaleCount = $this->seniorsQueryFemale
            ->where('sex', 'Female')
            ->count();

        $totalPWD = $this->seniorsQueryPWD
            ->where('status_membership', 'PWD')
            ->count();
        $totalPension = $this->seniorsQueryPension
            ->where('status_membership', 'Pension')
            ->count();
        $totalNonPension = $this->seniorsQueryNonPension
            ->where('status_membership', 'Non-Pension')
            ->count();

        return view('partials.viewPDF', [
            'totalusers' => $totalusers, 
            'totalCount' => $totalCount,
            'totalMaleCount' => $totalMaleCount,
            'totalFemaleCount' => $totalFemaleCount,
            'totalPWD' => $totalPWD,
            'totalPension' => $totalPension,
            'totalNonPension' => $totalNonPension,
         ]);
    }
}
