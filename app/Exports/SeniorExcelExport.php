<?php

namespace App\Exports;

use App\Models\SeniorCitizen;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SeniorExcelExport implements FromView, ShouldAutoSize
{
    use Exportable;

    private $users;

    public function __construct() {
        $this->users = SeniorCitizen::all(); //to access senior citizen table and can be passed on view function
    }

    public function view(): View
    {
        return view('partials.viewPDF');
    }
}
