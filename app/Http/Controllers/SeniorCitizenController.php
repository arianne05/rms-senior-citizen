<?php

namespace App\Http\Controllers;

use App\Exports\SeniorExcelExport;
use App\Models\SeniorCitizen;
// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Carbon\Carbon;

class SeniorCitizenController extends Controller
{
    public function login(){
        return view('index')->with('title','Login');
    }

    public function add_citizen(){
        $citizens = SeniorCitizen::all(); 

        return view('senior_citizen.add_citizen', ['header'=>'Add New Record',
        'title'=>'Add New',
        'citizens'=>$citizens]);
    }

    public function process_add(Request $request){
        // dd($request);

        $validated = $request->validate([
            "lastname" => ['required', 'min:4'],
            "firstname" => ['required', 'min:4'],
            "middlename" => ['nullable'],
            "suffix" => ['nullable'],
            "civil_status" => ['required'],
            "birthplace" => ['required'],
            "contact" => ['nullable', 'min:11'],
            "birthdate" => ['required'],
            "religion" => ['required'],
            "sex" => ['required'],
            "house_number" => ['required'],
            "barangay" => ['required'],
            "municipality" => ['required'],
            "province" => ['required'],
            "zipcode" => ['required'],
            "gsis" => ['nullable'],
            "philhealth" => ['nullable', Rule::unique('senior_citizens','philhealth')],
            "tin" => ['nullable', Rule::unique('senior_citizens','philhealth')],
            "sss" => ['nullable', Rule::unique('senior_citizens','philhealth')],
            "beneficiary" => ['nullable'],
            "contact_beneficiary" => ['nullable', 'min:11'],
            "status_membership" => ['required']
       ]); //set rule in validation

        //save img query
            if($request->hasFile('senior_img')){ //Validate for image
                $request->validate([
                    "senior_img" => 'mimes:jpeg,png,bmp,tiff |max:8192' //rules to validate image must be on jpeg,png and 4mb
                ]);
                
                $filenameWithExtension = $request->file("senior_img");
                $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
                $extension = $request->file("senior_img")->getClientOriginalExtension();
        
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                $smallThumbnail= $filename.'_'.time().'.'.$extension;
        
                $request->file('senior_img')->storeAs('public/citizen_profile', $filenameToStore);
                $request->file("senior_img")->storeAs('public/citizen_profile/thumbnail', $smallThumbnail);
                
                $thumbnail = 'storage/citizen_profile/thumbnail/'.$smallThumbnail;
                $this->createThumbnail($thumbnail, 150, 93);
        
                $validated['senior_img'] = $filenameToStore; //save to the citizen_profile col in the db
            }

       SeniorCitizen::create($validated); //insert validated data in the database

       return redirect('/add_citizen')->with('message','Added Successfully');

    }

    //UPLOAD FILE/IMG BY GETTING THE NAME PATH
    public function createThumbnail($path, $width, $height){
        $img = Image::make($path)->resize($width, $height, function($constraint){
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    // EDIT CITIZEN
    public function edit_citizen(Request $request, $id){
        $citizens = SeniorCitizen::where('id', $id)->first(); 
        return view("senior_citizen.edit_citizen", ['title'=>'Edit Record', 'citizens'=>$citizens]);
    }

    //PROCESS UPDATE/EDIT
    public function process_edit(Request $request, $id){
        $validated = $request->validate([
            "lastname" => ['required', 'min:4'],
            "firstname" => ['required', 'min:4'],
            "middlename" => ['nullable'],
            "suffix" => ['nullable'],
            "civil_status" => ['required'],
            "birthplace" => ['required'],
            "contact" => ['nullable', 'min:11'],
            "birthdate" => ['required'],
            "religion" => ['required'],
            "sex" => ['required'],
            "house_number" => ['required'],
            "barangay" => ['required'],
            "municipality" => ['required'],
            "province" => ['required'],
            "zipcode" => ['required'],
            "gsis" => ['nullable'],
            "philhealth" => ['nullable', Rule::unique('senior_citizens','philhealth')->ignore($id)],
            "tin" => ['nullable', Rule::unique('senior_citizens','philhealth')->ignore($id)],
            "sss" => ['nullable', Rule::unique('senior_citizens','philhealth')->ignore($id)],
            "beneficiary" => ['nullable'],
            "contact_beneficiary" => ['nullable', 'min:11'],
            "status_membership" => ['required']
       ]); //set rule in validation

       $seniorCitizen = SeniorCitizen::find($id);

        //save img query
        if($request->hasFile('senior_img')){ //Validate for image
            $request->validate([
                "senior_img" => 'mimes:jpeg,png,bmp,tiff |max:8192' //rules to validate image must be on jpeg,png and 4mb
            ]);
            
            $filenameWithExtension = $request->file("senior_img");
            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file("senior_img")->getClientOriginalExtension();
    
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $smallThumbnail= $filename.'_'.time().'.'.$extension;
    
            $request->file('senior_img')->storeAs('public/citizen_profile', $filenameToStore);
            $request->file("senior_img")->storeAs('public/citizen_profile/thumbnail', $smallThumbnail);
            
            $thumbnail = 'storage/citizen_profile/thumbnail/'.$smallThumbnail;
            $this->createThumbnail($thumbnail, 150, 93);
    
            $validated['senior_img'] = $filenameToStore; //save to the citizen_profile col in the db
        }

        $seniorCitizen->update($validated);
        return back()->with('message', 'Data Successfully Updated');
    }

    //DELETE FUNCTION
    public function delete_citizen(SeniorCitizen $id){
        $id->delete();
        return redirect('/citizen')->with('message', 'Deleted Successfully');
    }

    //VIEW CITIZEN
    public function view_citizen(Request $request, $id){
        $citizens = SeniorCitizen::where('id', $id)->first();
        return view("senior_citizen.view_citizen", ['title'=>'View','citizens'=>$citizens]);
    }

    // SAVE PDF BRGY LIST
    public function brgypdf(Request $request){
        $validated = $request->validate([
            "dateto" => ['nullable', 'date'],
            "datefrom" => ['nullable', 'date']
        ]);
        $dateto = $validated['dateto'] ?? null;
        $datefrom = $validated['datefrom'] ?? null;
        
        if ($datefrom && !$dateto) {
            $header = "Total Brgy List As of ".$datefrom;
            $barangays = SeniorCitizen::whereDate('created_at', '=', $datefrom)
                ->select(
                    'barangay', 
                    DB::raw('count(*) as totalBrgy'), 
                    DB::raw('sum(case when sex = "Male" then 1 else 0 end) as totalMale'), 
                    DB::raw('sum(case when sex = "Female" then 1 else 0 end) as totalFemale')
                    )
                ->groupBy('barangay')
                ->get();
        } elseif (!$datefrom && $dateto) {
            $header = null;
            return redirect()->back()->with('message', 'Please provide a starting date.');
        } elseif ($datefrom && $dateto) {
            $header = "Total Brgy List As of ".$datefrom." to ".$dateto;
            $barangays = SeniorCitizen::whereDate('created_at', '>=', $datefrom)
                ->whereDate('created_at', '<=', $dateto)
                ->select(
                    'barangay', 
                    DB::raw('count(*) as totalBrgy'), 
                    DB::raw('sum(case when sex = "Male" then 1 else 0 end) as totalMale'), 
                    DB::raw('sum(case when sex = "Female" then 1 else 0 end) as totalFemale')
                    )
                ->groupBy('barangay')
                ->get();
        } else {
            $header = "Overall Brgy List";
            $barangays = SeniorCitizen::select(
                    'barangay', 
                    DB::raw('count(*) as totalBrgy'), 
                    DB::raw('sum(case when sex = "Male" then 1 else 0 end) as totalMale'), 
                    DB::raw('sum(case when sex = "Female" then 1 else 0 end) as totalFemale')
                )
                ->groupBy('barangay')
                ->get();
            
        }
        
        // Calculate the total of all totalBrgy
        $totalBrgyCount = $barangays->sum('totalBrgy');
    
        $pdf = PDF::loadView('partials.brgylist', ['brgylist' => $barangays, 'header' => $header,'totalBrgyCount' => $totalBrgyCount ]);
        return $pdf->stream();
    }

    
    // SAVE PDF PER BRGY LIST
    public function viewbrgypdf(Request $request){
        // dd($request);
        $validated = $request->validate([
            "brgyname" => ['nullable'],
            "dateto" => ['nullable', 'date'],
            "datefrom" => ['nullable', 'date']
        ]);
        $brgyname = $validated['brgyname'] ?? null;
        $dateto = $validated['dateto'] ?? null;
        $datefrom = $validated['datefrom'] ?? null;

        if ($datefrom && !$dateto) {
            $header = "List of Senior Citizen in " . $brgyname . " As of " . $datefrom;
            $barangays = SeniorCitizen::where('barangay', $brgyname)
                ->whereDate('created_at', '=', $datefrom)
                ->get();
        } elseif (!$datefrom && $dateto) {
            $header = null;
            return redirect()->back()->with('message', 'Please provide a starting date.');
        } elseif ($datefrom && $dateto) {
            $header = "List of Senior Citizen in " . $brgyname . " As of " . $datefrom ." to ". $dateto;
            $barangays = SeniorCitizen::where('barangay', $brgyname)
                ->whereDate('created_at', '>=', $datefrom)
                ->whereDate('created_at', '<=', $dateto)
                ->get();
        } else {
            $header = "Overall Brgy List In ". $brgyname;
            $barangays = SeniorCitizen::where('barangay', $brgyname)
                ->get();
        }

        // Calculate the total of all totalBrgy
        $totalPerBrgy = $barangays->count();

        $pdf = PDF::loadView('partials.perbrgylist', ['brgylist' => $barangays, 'header' => $header, 'totalPerBrgy' => $totalPerBrgy]);
        return $pdf->stream();
    }
    
    

    //VIEW PDF
    public function viewpdf(Request $request, $category){
        // dd($request);
        $validated = $request->validate([
            "sex" => ['nullable'],
            "civil" => ['nullable'],
            "membership" => ['nullable'],
            "age_class" => ['nullable'],
            "dateto" => ['nullable'],
            "datefrom" => ['nullable']
        ]);
    
        $sex = $validated['sex'] ?? null;
        $civil_status = $validated['civil'] ?? null;
        $status_membership = $validated['membership'] ?? null;
        $class = $validated['age_class'] ?? null;
        $dateto = $validated['dateto'] ?? null;
        $datefrom = $validated['datefrom'] ?? null;

        if ($category == 'total') {
            // dd($request);
            $seniorsQuery = SeniorCitizen::query();
            $seniorsQueryMale = SeniorCitizen::query();
            $seniorsQueryFemale = SeniorCitizen::query();
            $seniorsQueryPWD = SeniorCitizen::query();
            $seniorsQueryPension = SeniorCitizen::query();
            $seniorsQueryNonPension = SeniorCitizen::query();
        
            if ($sex) {
                $seniorsQuery->where('sex', $sex);
                $seniorsQueryMale->where('sex', $sex);
                $seniorsQueryFemale->where('sex', $sex);
                $seniorsQueryPWD->where('sex', $sex);
                $seniorsQueryPension->where('sex', $sex);
                $seniorsQueryNonPension->where('sex', $sex);
            }
            if ($civil_status) {
                $seniorsQuery->where('civil_status', $civil_status);
                $seniorsQueryMale->where('civil_status', $civil_status);
                $seniorsQueryFemale->where('civil_status', $civil_status);
                $seniorsQueryPWD->where('civil_status', $civil_status);
                $seniorsQueryPension->where('civil_status', $civil_status);
                $seniorsQueryNonPension->where('civil_status', $civil_status);
            }
            if ($status_membership) {
                $seniorsQuery->where('status_membership', $status_membership);
                $seniorsQueryMale->where('status_membership', $status_membership);
                $seniorsQueryFemale->where('status_membership', $status_membership);
                $seniorsQueryPWD->where('status_membership', $status_membership);
                $seniorsQueryPension->where('status_membership', $status_membership);
                $seniorsQueryNonPension->where('status_membership', $status_membership);
            }
            if ($class) {
                $applyAgeFilter = function ($query, $minAge, $maxAge) {
                    $query->whereRaw('YEAR(NOW()) - YEAR(birthdate) >= ? AND YEAR(NOW()) - YEAR(birthdate) <= ?', [$minAge, $maxAge]);
                };
            
                switch ($class) {
                    case "Centenarian":
                        $applyAgeFilter($seniorsQuery, 100, PHP_INT_MAX);
                        break;
                    case "Nonagenarian":
                        $applyAgeFilter($seniorsQuery, 90, 99);
                        break;
                    case "Octogenarian":
                        $applyAgeFilter($seniorsQuery, 80, 89);
                        break;
                }
            
                // Applying the same logic for other queries
                $applyAgeFilter($seniorsQueryMale, 100, PHP_INT_MAX);
                $applyAgeFilter($seniorsQueryFemale, 100, PHP_INT_MAX);
                $applyAgeFilter($seniorsQueryPWD, 100, PHP_INT_MAX);
                $applyAgeFilter($seniorsQueryPension, 100, PHP_INT_MAX);
                $applyAgeFilter($seniorsQueryNonPension, 100, PHP_INT_MAX);
            }            
            if ($datefrom && !$dateto) {
                $startOfDay = Carbon::parse($datefrom)->startOfDay();
                $seniorsQuery->where('created_at', '>=', $startOfDay);
                $seniorsQueryMale->where('created_at', '>=', $startOfDay);
                $seniorsQueryFemale->where('created_at', '>=', $startOfDay);
                $seniorsQueryPWD->where('created_at', '>=', $startOfDay);
                $seniorsQueryPension->where('created_at', '>=', $startOfDay);
                $seniorsQueryNonPension->where('created_at', '>=', $startOfDay);
            } elseif ($datefrom && $dateto) {
                $startOfDay = Carbon::parse($datefrom)->startOfDay();
                $endOfDay = Carbon::parse($dateto)->endOfDay();
                $seniorsQuery->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryMale->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryFemale->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryPWD->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryPension->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryNonPension->whereBetween('created_at', [$startOfDay, $endOfDay]);
            }
            
            $totalusers = $seniorsQuery->get();
            // $totalusers = $seniorsQueryPWD->get();

            $totalCount = $seniorsQuery->count();
            $totalMaleCount = $seniorsQueryMale
                ->where('sex', 'Male')
                ->count();
            $totalFemaleCount = $seniorsQueryFemale
                ->where('sex', 'Female')
                ->count();

            $totalPWD = $seniorsQueryPWD
                ->where('status_membership', 'PWD')
                ->count();
            $totalPension = $seniorsQueryPension
                ->where('status_membership', 'Pension')
                ->count();
            $totalNonPension = $seniorsQueryNonPension
                ->where('status_membership', 'Non-Pension')
                ->count();
            
            $pdf = PDF::loadView('partials.viewPDF', 
            ['totalusers' => $totalusers, 
            'totalCount' => $totalCount,
            'totalMaleCount' => $totalMaleCount,
            'totalFemaleCount' => $totalFemaleCount,
            'totalPWD' => $totalPWD,
            'totalPension' => $totalPension,
            'totalNonPension' => $totalNonPension,
            ]);
        } 
        
        elseif ($category == 'male') {

            $seniorsQuery = SeniorCitizen::query();
            $seniorsQueryMale = SeniorCitizen::query();
            $seniorsQueryFemale = SeniorCitizen::query();
            $seniorsQueryPWD = SeniorCitizen::query();
            $seniorsQueryPension = SeniorCitizen::query();
            $seniorsQueryNonPension = SeniorCitizen::query();
        
            if ($sex) {
                $seniorsQuery->where('sex', $sex);
                $seniorsQueryMale->where('sex', $sex);
                $seniorsQueryFemale->where('sex', $sex);
                $seniorsQueryPWD->where('sex', $sex);
                $seniorsQueryPension->where('sex', $sex);
                $seniorsQueryNonPension->where('sex', $sex);
            }
            if ($civil_status) {
                $seniorsQuery->where('civil_status', $civil_status);
                $seniorsQueryMale->where('civil_status', $civil_status);
                $seniorsQueryFemale->where('civil_status', $civil_status);
                $seniorsQueryPWD->where('civil_status', $civil_status);
                $seniorsQueryPension->where('civil_status', $civil_status);
                $seniorsQueryNonPension->where('civil_status', $civil_status);
            }
            if ($status_membership) {
                $seniorsQuery->where('status_membership', $status_membership);
                $seniorsQueryMale->where('status_membership', $status_membership);
                $seniorsQueryFemale->where('status_membership', $status_membership);
                $seniorsQueryPWD->where('status_membership', $status_membership);
                $seniorsQueryPension->where('status_membership', $status_membership);
                $seniorsQueryNonPension->where('status_membership', $status_membership);
            }
            if ($class) {
                $applyAgeFilter = function ($query, $minAge, $maxAge) {
                    $query->whereRaw('YEAR(NOW()) - YEAR(birthdate) >= ? AND YEAR(NOW()) - YEAR(birthdate) <= ?', [$minAge, $maxAge]);
                };
            
                switch ($class) {
                    case "Centenarian":
                        $applyAgeFilter($seniorsQuery, 100, PHP_INT_MAX);
                        break;
                    case "Nonagenarian":
                        $applyAgeFilter($seniorsQuery, 90, 99);
                        break;
                    case "Octogenarian":
                        $applyAgeFilter($seniorsQuery, 80, 89);
                        break;
                }
            
                // Applying the same logic for other queries
                $applyAgeFilter($seniorsQueryMale, 100, PHP_INT_MAX);
                $applyAgeFilter($seniorsQueryFemale, 100, PHP_INT_MAX);
                $applyAgeFilter($seniorsQueryPWD, 100, PHP_INT_MAX);
                $applyAgeFilter($seniorsQueryPension, 100, PHP_INT_MAX);
                $applyAgeFilter($seniorsQueryNonPension, 100, PHP_INT_MAX);
            }    
            if ($datefrom && !$dateto) {
                $startOfDay = Carbon::parse($datefrom)->startOfDay();
                $seniorsQuery->where('created_at', '>=', $startOfDay);
                $seniorsQueryMale->where('created_at', '>=', $startOfDay);
                $seniorsQueryFemale->where('created_at', '>=', $startOfDay);
                $seniorsQueryPWD->where('created_at', '>=', $startOfDay);
                $seniorsQueryPension->where('created_at', '>=', $startOfDay);
                $seniorsQueryNonPension->where('created_at', '>=', $startOfDay);
            } elseif ($datefrom && $dateto) {
                $startOfDay = Carbon::parse($datefrom)->startOfDay();
                $endOfDay = Carbon::parse($dateto)->endOfDay();
                $seniorsQuery->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryMale->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryFemale->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryPWD->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryPension->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryNonPension->whereBetween('created_at', [$startOfDay, $endOfDay]);
            }
            
            $totalusers = $seniorsQuery->where('sex', 'Male')->get();

            $totalCount = $seniorsQuery->count();
            $totalMaleCount = $seniorsQueryMale
                ->where('sex', 'Male')
                ->count();
            $totalFemaleCount = $seniorsQueryFemale
                ->where('sex', 'Female')
                ->count();

            $totalPWD = $seniorsQueryPWD
                ->where('status_membership', 'PWD')
                ->where('sex', 'Male')
                ->count();
            $totalPension = $seniorsQueryPension
                ->where('status_membership', 'Pension')
                ->where('sex', 'Male')
                ->count();
            $totalNonPension = $seniorsQueryNonPension
                ->where('status_membership', 'Non-Pension')
                ->where('sex', 'Male')
                ->count();
            
            $pdf = PDF::loadView('partials.viewPDFMale', 
            ['totalusers' => $totalusers, 
            'totalCount' => $totalCount,
            'totalMaleCount' => $totalMaleCount,
            'totalFemaleCount' => $totalFemaleCount,
            'totalPWD' => $totalPWD,
            'totalPension' => $totalPension,
            'totalNonPension' => $totalNonPension,
            ]);
        } 
        
        elseif ($category == 'female') {
            $seniorsQuery = SeniorCitizen::query();
            $seniorsQueryMale = SeniorCitizen::query();
            $seniorsQueryFemale = SeniorCitizen::query();
            $seniorsQueryPWD = SeniorCitizen::query();
            $seniorsQueryPension = SeniorCitizen::query();
            $seniorsQueryNonPension = SeniorCitizen::query();
        
            if ($sex) {
                $seniorsQuery->where('sex', $sex);
                $seniorsQueryMale->where('sex', $sex);
                $seniorsQueryFemale->where('sex', $sex);
                $seniorsQueryPWD->where('sex', $sex);
                $seniorsQueryPension->where('sex', $sex);
                $seniorsQueryNonPension->where('sex', $sex);
            }
            if ($civil_status) {
                $seniorsQuery->where('civil_status', $civil_status);
                $seniorsQueryMale->where('civil_status', $civil_status);
                $seniorsQueryFemale->where('civil_status', $civil_status);
                $seniorsQueryPWD->where('civil_status', $civil_status);
                $seniorsQueryPension->where('civil_status', $civil_status);
                $seniorsQueryNonPension->where('civil_status', $civil_status);
            }
            if ($status_membership) {
                $seniorsQuery->where('status_membership', $status_membership);
                $seniorsQueryMale->where('status_membership', $status_membership);
                $seniorsQueryFemale->where('status_membership', $status_membership);
                $seniorsQueryPWD->where('status_membership', $status_membership);
                $seniorsQueryPension->where('status_membership', $status_membership);
                $seniorsQueryNonPension->where('status_membership', $status_membership);
            }
            if ($class) {
                $applyAgeFilter = function ($query, $minAge, $maxAge) {
                    $query->whereRaw('YEAR(NOW()) - YEAR(birthdate) >= ? AND YEAR(NOW()) - YEAR(birthdate) <= ?', [$minAge, $maxAge]);
                };
            
                switch ($class) {
                    case "Centenarian":
                        $applyAgeFilter($seniorsQuery, 100, PHP_INT_MAX);
                        break;
                    case "Nonagenarian":
                        $applyAgeFilter($seniorsQuery, 90, 99);
                        break;
                    case "Octogenarian":
                        $applyAgeFilter($seniorsQuery, 80, 89);
                        break;
                }
            
                // Applying the same logic for other queries
                $applyAgeFilter($seniorsQueryMale, 100, PHP_INT_MAX);
                $applyAgeFilter($seniorsQueryFemale, 100, PHP_INT_MAX);
                $applyAgeFilter($seniorsQueryPWD, 100, PHP_INT_MAX);
                $applyAgeFilter($seniorsQueryPension, 100, PHP_INT_MAX);
                $applyAgeFilter($seniorsQueryNonPension, 100, PHP_INT_MAX);
            }    
            if ($datefrom && !$dateto) {
                $startOfDay = Carbon::parse($datefrom)->startOfDay();
                $seniorsQuery->where('created_at', '>=', $startOfDay);
                $seniorsQueryMale->where('created_at', '>=', $startOfDay);
                $seniorsQueryFemale->where('created_at', '>=', $startOfDay);
                $seniorsQueryPWD->where('created_at', '>=', $startOfDay);
                $seniorsQueryPension->where('created_at', '>=', $startOfDay);
                $seniorsQueryNonPension->where('created_at', '>=', $startOfDay);
            } elseif ($datefrom && $dateto) {
                $startOfDay = Carbon::parse($datefrom)->startOfDay();
                $endOfDay = Carbon::parse($dateto)->endOfDay();
                $seniorsQuery->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryMale->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryFemale->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryPWD->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryPension->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryNonPension->whereBetween('created_at', [$startOfDay, $endOfDay]);
            }
            
            $totalusers = $seniorsQuery->where('sex', 'Female')->get();

            $totalCount = $seniorsQuery->count();
            $totalMaleCount = $seniorsQueryMale
                ->where('sex', 'Male')
                ->count();
            $totalFemaleCount = $seniorsQueryFemale
                ->where('sex', 'Female')
                ->count();

            $totalPWD = $seniorsQueryPWD
                ->where('status_membership', 'PWD')
                ->where('sex', 'Female')
                ->count();
            $totalPension = $seniorsQueryPension
                ->where('status_membership', 'Pension')
                ->where('sex', 'Female')
                ->count();
            $totalNonPension = $seniorsQueryNonPension
                ->where('status_membership', 'Non-Pension')
                ->where('sex', 'Female')
                ->count();
            
            $pdf = PDF::loadView('partials.viewPDFFemale', 
            ['totalusers' => $totalusers, 
            'totalCount' => $totalCount,
            'totalMaleCount' => $totalMaleCount,
            'totalFemaleCount' => $totalFemaleCount,
            'totalPWD' => $totalPWD,
            'totalPension' => $totalPension,
            'totalNonPension' => $totalNonPension,
            ]);
        }
    
        return $pdf->stream();
    }
    
    

    //DOWNLOAD PDF
    public function downloadpdf(Request $request){
        $validated = $request->validate([
            "sex" => ['nullable'],
            "civil_status" => ['nullable'],
            "status_membership" => ['nullable'],
            "dateto" => ['nullable'],
            "datefrom" => ['nullable']
        ]);
    
        $sex = $validated['sex'] ?? null;
        $civil_status = $validated['civil_status'] ?? null;
        $status_membership = $validated['status_membership'] ?? null;
        $dateto = $validated['dateto'] ?? null;
        $datefrom = $validated['datefrom'] ?? null;

        $seniorsQuery = SeniorCitizen::query();
            $seniorsQueryMale = SeniorCitizen::query();
            $seniorsQueryFemale = SeniorCitizen::query();
            $seniorsQueryPWD = SeniorCitizen::query();
            $seniorsQueryPension = SeniorCitizen::query();
            $seniorsQueryNonPension = SeniorCitizen::query();
        
            if ($sex) {
                $seniorsQuery->where('sex', $sex);
                $seniorsQueryMale->where('sex', $sex);
                $seniorsQueryFemale->where('sex', $sex);
                $seniorsQueryPWD->where('sex', $sex);
                $seniorsQueryPension->where('sex', $sex);
                $seniorsQueryNonPension->where('sex', $sex);
            }
            if ($civil_status) {
                $seniorsQuery->where('civil_status', $civil_status);
                $seniorsQueryMale->where('civil_status', $civil_status);
                $seniorsQueryFemale->where('civil_status', $civil_status);
                $seniorsQueryPWD->where('civil_status', $civil_status);
                $seniorsQueryPension->where('civil_status', $civil_status);
                $seniorsQueryNonPension->where('civil_status', $civil_status);
            }
            if ($status_membership) {
                $seniorsQuery->where('status_membership', $status_membership);
                $seniorsQueryMale->where('status_membership', $status_membership);
                $seniorsQueryFemale->where('status_membership', $status_membership);
                $seniorsQueryPWD->where('status_membership', $status_membership);
                $seniorsQueryPension->where('status_membership', $status_membership);
                $seniorsQueryNonPension->where('status_membership', $status_membership);
            }
            if ($datefrom && !$dateto) {
                $startOfDay = Carbon::parse($datefrom)->startOfDay();
                $seniorsQuery->where('created_at', '>=', $startOfDay);
                $seniorsQueryMale->where('created_at', '>=', $startOfDay);
                $seniorsQueryFemale->where('created_at', '>=', $startOfDay);
                $seniorsQueryPWD->where('created_at', '>=', $startOfDay);
                $seniorsQueryPension->where('created_at', '>=', $startOfDay);
                $seniorsQueryNonPension->where('created_at', '>=', $startOfDay);
            } elseif ($datefrom && $dateto) {
                $startOfDay = Carbon::parse($datefrom)->startOfDay();
                $endOfDay = Carbon::parse($dateto)->endOfDay();
                $seniorsQuery->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryMale->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryFemale->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryPWD->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryPension->whereBetween('created_at', [$startOfDay, $endOfDay]);
                $seniorsQueryNonPension->whereBetween('created_at', [$startOfDay, $endOfDay]);
            }
            
            $totalusers = $seniorsQuery->get();
            // $totalusers = $seniorsQueryPWD->get();

            $totalCount = $seniorsQuery->count();
            $totalMaleCount = $seniorsQueryMale
                ->where('sex', 'Male')
                ->count();
            $totalFemaleCount = $seniorsQueryFemale
                ->where('sex', 'Female')
                ->count();

            $totalPWD = $seniorsQueryPWD
                ->where('status_membership', 'PWD')
                ->count();
            $totalPension = $seniorsQueryPension
                ->where('status_membership', 'Pension')
                ->count();
            $totalNonPension = $seniorsQueryNonPension
                ->where('status_membership', 'Non-Pension')
                ->count();
            
            $pdf = PDF::loadView('partials.viewPDF', 
            ['totalusers' => $totalusers, 
            'totalCount' => $totalCount,
            'totalMaleCount' => $totalMaleCount,
            'totalFemaleCount' => $totalFemaleCount,
            'totalPWD' => $totalPWD,
            'totalPension' => $totalPension,
            'totalNonPension' => $totalNonPension,
            ]);
        return $pdf->download('senior-citizen.pdf');
    }

    //EXPORT EXCEL
    public function exportExcel(Request $request){
        $validated = $request->validate([
            "sex" => ['nullable'],
            "civil_status" => ['nullable'],
            "status_membership" => ['nullable'],
            "dateto" => ['nullable'],
            "datefrom" => ['nullable']
        ]);
    
        $sex = $validated['sex'] ?? null;
        $civil_status = $validated['civil_status'] ?? null;
        $status_membership = $validated['status_membership'] ?? null;
        $dateto = $validated['dateto'] ?? null;
        $datefrom = $validated['datefrom'] ?? null;

            $seniorsQuery = SeniorCitizen::query();
            $seniorsQueryMale = SeniorCitizen::query();
            $seniorsQueryFemale = SeniorCitizen::query();
            $seniorsQueryPWD = SeniorCitizen::query();
            $seniorsQueryPension = SeniorCitizen::query();
            $seniorsQueryNonPension = SeniorCitizen::query();
        
            if ($sex) {
                $seniorsQuery->where('sex', $sex);
                $seniorsQueryMale->where('sex', $sex);
                $seniorsQueryFemale->where('sex', $sex);
                $seniorsQueryPWD->where('sex', $sex);
                $seniorsQueryPension->where('sex', $sex);
                $seniorsQueryNonPension->where('sex', $sex);
            }
            if ($civil_status) {
                $seniorsQuery->where('civil_status', $civil_status);
                $seniorsQueryMale->where('civil_status', $civil_status);
                $seniorsQueryFemale->where('civil_status', $civil_status);
                $seniorsQueryPWD->where('civil_status', $civil_status);
                $seniorsQueryPension->where('civil_status', $civil_status);
                $seniorsQueryNonPension->where('civil_status', $civil_status);
            }
            if ($status_membership) {
                $seniorsQuery->where('status_membership', $status_membership);
                $seniorsQueryMale->where('status_membership', $status_membership);
                $seniorsQueryFemale->where('status_membership', $status_membership);
                $seniorsQueryPWD->where('status_membership', $status_membership);
                $seniorsQueryPension->where('status_membership', $status_membership);
                $seniorsQueryNonPension->where('status_membership', $status_membership);
            }
            if ($datefrom && !$dateto) {
                $seniorsQuery->where('birthdate', '=', $datefrom);
                $seniorsQueryMale->where('birthdate', '=', $datefrom);
                $seniorsQueryFemale->where('birthdate', '=', $datefrom);
                $seniorsQueryPWD->where('birthdate', '=', $datefrom);
                $seniorsQueryPension->where('birthdate', '=', $datefrom);
                $seniorsQueryNonPension->where('birthdate', '=', $datefrom);

            } elseif ($datefrom && $dateto) {
                $seniorsQuery->whereBetween('birthdate', [$datefrom, $dateto]);
                $seniorsQueryMale->whereBetween('birthdate', [$datefrom, $dateto]);
                $seniorsQueryFemale->whereBetween('birthdate', [$datefrom, $dateto]);
                $seniorsQueryPWD->whereBetween('birthdate', [$datefrom, $dateto]);
                $seniorsQueryPension->whereBetween('birthdate', [$datefrom, $dateto]);
                $seniorsQueryNonPension->whereBetween('birthdate', [$datefrom, $dateto]);
            }
        
        return Excel::download(new SeniorExcelExport($seniorsQuery, $seniorsQueryMale, $seniorsQueryFemale, $seniorsQueryPWD, $seniorsQueryPension, $seniorsQueryNonPension), 'senior-citizen.xlsx');
        // return Excel::download(new SeniorExcelExport, 'senior-citizen.xlsx');
    }

    //SEARCH FUNCTION
    public function search(Request $request){
        $user = auth()->user();
        $assignbrgy = $user->assignbrgy;
        $userPosition = $user->position;
    
        $searchValue = request()->input('searchvalue');
        $centenarian = $request->input('centenarian'); // Get the parameter
    
        if($centenarian == "true"){ // Check if it's a centenarian search
            $seniors = SeniorCitizen::where('birthdate', '<=', now()->subYears(100)->format('Y-m-d')) // Filter by birthdate for centenarians
                ->where(function($query) use ($searchValue) {
                    $query->where('lastname', 'like', '%' . $searchValue . '%')
                        ->orWhere('firstname', 'like', '%' . $searchValue . '%');
                })
                ->get();
        } else {
            // Your existing search logic goes here
            if($userPosition == "Admin"){
                $seniors = SeniorCitizen::where('lastname', 'like', '%' . $searchValue . '%')
                        ->orWhere('firstname', 'like', '%' . $searchValue . '%')
                        ->get();
            } else{
                $seniors = SeniorCitizen::where('barangay', $assignbrgy)
                    ->where(function($query) use ($searchValue) {
                        $query->where('lastname', 'like', '%' . $searchValue . '%')
                            ->orWhere('firstname', 'like', '%' . $searchValue . '%');
                    })
                    ->get();
            }
        }
    
        return view('search_result', ['title' => 'Search Result', 'seniors'=>$seniors, 'searchValue' => $searchValue]);
    }
    
    
}
