<?php

namespace App\Http\Controllers;

use App\Exports\SeniorExcelExport;
use App\Models\SeniorCitizen;
// use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

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

    //VIEW PDF
    public function viewpdf(Request $request, $category){
        // dd($request);
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

        if ($category == 'total') {
            $seniorsQuery = SeniorCitizen::query();
        
            if ($sex) {
                $seniorsQuery->where('sex', $sex);
            }
            if ($civil_status) {
                $seniorsQuery->where('civil_status', $civil_status);
            }
            if ($status_membership) {
                $seniorsQuery->where('status_membership', $status_membership);
            }
            if ($datefrom && !$dateto) {
                $seniorsQuery->where('birthdate', '=', $datefrom);
            } elseif ($datefrom && $dateto) {
                $seniorsQuery->whereBetween('birthdate', [$datefrom, $dateto]);
            }
            $totalusers = $seniorsQuery->get();

            $pdf = PDF::loadView('partials.viewPDF', ['totalusers' => $totalusers]);
        } 
        
        elseif ($category == 'male') {

            $maleSeniorsQuery = SeniorCitizen::query();

            if ($sex) {
                $maleSeniorsQuery->where('sex', $sex);
            }
            if ($civil_status) {
                $maleSeniorsQuery->where('civil_status', $civil_status);
            }
            if ($status_membership) {
                $maleSeniorsQuery->where('status_membership', $status_membership);
            }
            if ($datefrom && !$dateto) {
                $maleSeniorsQuery->where('birthdate', '=', $datefrom);
            } elseif ($datefrom && $dateto) {
                $maleSeniorsQuery->whereBetween('birthdate', [$datefrom, $dateto]);
            }
        
            // Fetch total male seniors based on filters
            $totalmale = $maleSeniorsQuery->where('sex', 'Male')->get();
            $pdf = PDF::loadView('partials.viewPDFMale', ['totalmale' => $totalmale]);
        } 
        
        elseif ($category == 'female') {
            $femaleSeniorsQuery = SeniorCitizen::query();

            if ($sex) {
                $femaleSeniorsQuery->where('sex', $sex);
            }
            if ($civil_status) {
                $femaleSeniorsQuery->where('civil_status', $civil_status);
            }
            if ($status_membership) {
                $femaleSeniorsQuery->where('status_membership', $status_membership);
            }
            if ($datefrom && !$dateto) {
                $femaleSeniorsQuery->where('birthdate', '=', $datefrom);
            } elseif ($datefrom && $dateto) {
                $femaleSeniorsQuery->whereBetween('birthdate', [$datefrom, $dateto]);
            }
        
            // Fetch total female seniors based on filters
            $totalfemale = $femaleSeniorsQuery->where('sex', 'Female')->get();
            $pdf = PDF::loadView('partials.viewPDFFemale', ['totalfemale' => $totalfemale]);
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
        
            if ($sex) {
                $seniorsQuery->where('sex', $sex);
            }
            if ($civil_status) {
                $seniorsQuery->where('civil_status', $civil_status);
            }
            if ($status_membership) {
                $seniorsQuery->where('status_membership', $status_membership);
            }
            if ($datefrom && !$dateto) {
                $seniorsQuery->where('birthdate', '=', $datefrom);
            } elseif ($datefrom && $dateto) {
                $seniorsQuery->whereBetween('birthdate', [$datefrom, $dateto]);
            }
        $totalusers = $seniorsQuery->get();

        $pdf = PDF::loadView('partials.viewPDF', compact('totalusers'));
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
        
            if ($sex) {
                $seniorsQuery->where('sex', $sex);
            }
            if ($civil_status) {
                $seniorsQuery->where('civil_status', $civil_status);
            }
            if ($status_membership) {
                $seniorsQuery->where('status_membership', $status_membership);
            }
            if ($datefrom && !$dateto) {
                $seniorsQuery->where('birthdate', '=', $datefrom);
            } elseif ($datefrom && $dateto) {
                $seniorsQuery->whereBetween('birthdate', [$datefrom, $dateto]);
            }
        $totalusers = $seniorsQuery->get();
        
        return Excel::download(new SeniorExcelExport($seniorsQuery), 'senior-citizen.xlsx');
        // return Excel::download(new SeniorExcelExport, 'senior-citizen.xlsx');
    }

    //SEARCH FUNCTION
    public function search(Request $request){
        // dd($request);
        $searchValue = request()->input('searchvalue');
        $seniors = SeniorCitizen::where('lastname', 'like', '%' . $searchValue . '%')
                            ->orWhere('firstname', 'like', '%' . $searchValue . '%')
                            ->get();
        return view('search_result', ['title' => 'Search Result', 'seniors'=>$seniors, 'searchValue' => $searchValue]);
    }
    
}
