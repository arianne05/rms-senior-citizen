<?php

namespace App\Http\Controllers;

use App\Models\SeniorCitizen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(){
        return view('index')->with('title','Login');
    }
    
    public function adduser(){
        return view('add_user')->with('title','Add User');
    }

    public function dashboard(){
        //Fetch senior table
        $seniors = SeniorCitizen::all();

         // Retrieve the currently authenticated user
        $user = auth()->user();
        // Access the name attribute
        $userName = $user->name;

        return view('dashboard',  $seniors, ['title'=>'Dashboard',
        'seniors'=> $seniors]);
    }

    //LOGIN USER
    public function process_signin(Request $request){
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
       ]); //set rule in validation

       if(auth()->attempt($validated)){
        $request->session()->regenerate();
        // Retrieve the currently authenticated user
        $user = auth()->user();
        // Access the name attribute
        $userName = $user->name;
        return redirect('/dashboard')->with('message', 'Welcome ' . $userName);
       }

       return back()->withErrors(['email' => 'Login Failed'])->onlyInput('email'); //if email is not existed nor password incorrect
    }

    //ADD USER ACCOUNT
    public function register(Request $request){
        $validated = $request->validate([
            "name" => ['required', 'min:4'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => 'required|min:6'
       ]); //set rule in validation

       $validated['password'] = Hash::make($validated['password']); //encrypt or hash the password | you can also use bycrpt($validated['password'])

       $user = User::create($validated); //insert validated name, email, pass in the database
       auth()->login($user);
       return redirect('/adduser')->with('message', 'Added Sucessfully');
    }

    //Logout Function
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); //reset token

        return redirect('/')->with('message', 'Logout Success');
    }

    //TEMPLATE BARANGAY PAGE
    public function barangay(){
        $barangay = DB::table('senior_citizens')
                ->select(DB::raw('count(*) as barangay_count, barangay'))
                ->groupBy('barangay')
                ->get();
        return view('barangay', ['title'=>'Barangay',
                    'data_barangay'=>$barangay]);
    }

     //TEMPLATE VIEW BARANGAY PAGE
    public function view_barangay(Request $request, $barangay){
        $barangay_list = SeniorCitizen::where('barangay', $barangay)->get();
        return view("senior_citizen.view_barangay", ['title'=>$barangay,
        'barangay_list' => $barangay_list]);
    }

     //TEMPLATE CITIZEN PAGE
     public function citizen(){
        $seniors = SeniorCitizen::all();
        $totalCount = DB::table('senior_citizens')->count();
        $totalMaleCount = DB::table('senior_citizens')
            ->where('sex', 'Male')
            ->count();
        $totalFemaleCount = DB::table('senior_citizens')
            ->where('sex', 'Female')
            ->count();

        return view('citizen', ['title'=>'Citizen','seniors'=> $seniors, 
        'totalCount'=>$totalCount,
        'totalMaleCount'=>$totalMaleCount,
        'totalFemaleCount'=>$totalFemaleCount
        ]);
    }

    public function filter_process(Request $request){

        $validated = $request->validate([
            "sex" => ['nullable'],
            "civil_status" => ['nullable'],
            "status_membership" => ['nullable'],
            "dateto" => ['nullable'],
            "datefrom" => ['nullable']
        ]);
    
        $sex = $validated['sex'];
        $civil = $validated['civil_status'];
        $membership = $validated['status_membership'];
        $dateto = $validated['dateto'];
        $datefrom = $validated['datefrom'];

        $seniorsQuery = SeniorCitizen::query();
        

        if ($sex) {
            $seniorsQuery->where('sex', $sex);
        }

        if ($civil) {
            $seniorsQuery->where('civil_status', $civil);
        }

        if ($membership) {
            $seniorsQuery->where('status_membership', $membership);
        }

        if ($datefrom) {
            $seniorsQuery->where(function ($query) use ($datefrom) {
                $query->where('birthdate', '=', $datefrom);
            });
        }
        
        if ($datefrom && $dateto) {
            $seniorsQuery->where(function ($query) use ($datefrom, $dateto) {
                $query->where('birthdate', '>=', $datefrom)
                    ->where('birthdate', '<=', $dateto);
            });
        }

        $seniors = $seniorsQuery->get();
        $totalCount =  $seniorsQuery->count();
        $totalMaleCount = DB::table('senior_citizens')
            ->where('sex', 'Male')
            ->count();
        $totalFemaleCount = DB::table('senior_citizens')
            ->where('sex', 'Female')
            ->count();
    
        return view('citizen')->with([
            'title' => 'Citizen',
            'seniors' => $seniors,
            'totalCount' => $totalCount,
            'totalMaleCount' => $totalMaleCount,
            'totalFemaleCount' => $totalFemaleCount
        ]);
    }
    
    
}
