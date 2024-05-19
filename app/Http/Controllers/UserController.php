<?php

namespace App\Http\Controllers;

use App\Models\SeniorCitizen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

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

        //TimeZone
        $manilaTime = Carbon::now('Asia/Manila');
        $timeFormatted = $manilaTime->format('M j, Y');

        //total
        $totalCount = DB::table('senior_citizens')->count();
        $totalUsers = DB::table('users')
            ->where('status', 'Active')
            ->count();
        $totalMaleCount = DB::table('senior_citizens')
            ->where('sex', 'Male')
            ->count();
        $totalFemaleCount = DB::table('senior_citizens')
            ->where('sex', 'Female')
            ->count();
        $totalBarangay = DB::table('senior_citizens')
            ->distinct('barangay')
            ->count();

         // Retrieve the currently authenticated user
        $user = auth()->user();
        // Access the name attribute
        $userName = $user->name;

        return view('dashboard',  $seniors, ['title'=>'Dashboard',
        'seniors'=> $seniors,
        'name'=>$userName,
        'totalCount'=>$totalCount,
        'totalMaleCount'=>$totalMaleCount,
        'totalFemaleCount'=>$totalFemaleCount,
        'totalBarangay'=>$totalBarangay,
        'totalUsers'=>$totalUsers,
        'timeFormatted'=>$timeFormatted,
        ]);
    }

    //LOGIN USER
    public function process_signin(Request $request){
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]); //set rule in validation
    
        // Attempt to authenticate the user
        if(auth()->attempt($validated)){
            // Retrieve the currently authenticated user
            $user = auth()->user();
    
            // Check if user status is 'Active'
            if ($user->status === 'Active') {
                $request->session()->regenerate();
                // Access the name attribute
                $userName = $user->name;
                return redirect('/dashboard')->with('message', 'Welcome ' . $userName);
            } else {
                // If user status is 'Inactive', logout the user
                auth()->logout();
                return back()->withErrors(['loginerror' => 'Your account is inactive.']);
            }
        }
    
        return back()->withErrors(['email' => 'Login Failed'])->onlyInput('email'); //if email is not existed nor password incorrect
    }
    

    //ADD USER ACCOUNT
    public function register(Request $request){
        $validated = $request->validate([
            "name" => ['required', 'min:4'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => 'required|min:6',
            "position" => ['required'],
            "status" => ['required'],
       ]); //set rule in validation

       $validated['password'] = Hash::make($validated['password']); //encrypt or hash the password | you can also use bycrpt($validated['password'])

       $user = User::create($validated); //insert validated name, email, pass in the database
    //    auth()->login($user);
       return redirect('/adduser')->with('message', 'Added Sucessfully');
    }

    //EDIT USER ACCOUNT
    public function edit_user(Request $request, $id){
        $user = User::where('id', $id)->first();
        return view('edit_user', ['title'=>'Edit Account', 'users'=>$user]);
    }

    //PROCESS EDIT USER ACCOUNT
    public function process_edit_user(Request $request, $id){
        // dd($request);
        $validated = $request->validate([
            "name" => ['required', 'min:4'],
            "email" => ['required', 'email', Rule::unique('users', 'email')->ignore($id)],
            "password" => 'nullable|confirmed|min:6',
            "position" => ['required'],
            "status" => ['required'],
        ]);

        // Remove password from the validated data if it's null
        if ($validated['password'] === null) {
            unset($validated['password']);
        } else {
            // Hash the password if it's not null
            $validated['password'] = Hash::make($validated['password']);
        }

        $user = User::find($id);
        $user->update($validated);

        // redirect('account')->with('message', 'Data Successfully Updated');
        return back()->with('message', 'Data Successfully Updated');
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

    //FILTER PROCESS
    public function filter_process(Request $request){
        // dd($request);
        $validated = $request->validate([
            "sex" => ['nullable'],
            "civil_status" => ['nullable'],
            "status_membership" => ['nullable'],
            "age_class" => ['nullable'],
            "dateto" => ['nullable'],
            "datefrom" => ['nullable']
        ]);
    
        $sex = $validated['sex'] ?? null;
        $civil = $validated['civil_status'] ?? null;
        $membership = $validated['status_membership'];
        $class = $validated['age_class'];
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

        if ($class) {
            if ($class == "Centenarian"){
                $seniorsQuery->whereRaw('YEAR(NOW()) - YEAR(birthdate) >= 100');
            }
            if ($class == "Nonagenarian"){
                $seniorsQuery->whereRaw('YEAR(NOW()) - YEAR(birthdate) >= 90 AND YEAR(NOW()) - YEAR(birthdate) <= 99');
            }
            if ($class == "Octogenarian"){
                $seniorsQuery->whereRaw('YEAR(NOW()) - YEAR(birthdate) >= 80 AND YEAR(NOW()) - YEAR(birthdate) <= 89');
            }
        }
        

        if ($datefrom && !$dateto) {
            // If $datefrom has value but $dateto is null
            $seniorsQuery->where('birthdate', '=', $datefrom);
        } elseif (!$datefrom && $dateto) {
            // If $datefrom is null but $dateto has value
            // Display an error message or handle it accordingly
            // For example, you can redirect back with an error message
            return redirect()->back()->with('message', 'Please provide a starting date.');
        } elseif ($datefrom && $dateto) {
            // If both $datefrom and $dateto have values
            $seniorsQuery->whereBetween('birthdate', [$datefrom, $dateto]);
        }
        

        $seniors = $seniorsQuery->get();
        $totalCount =  $seniorsQuery->count();
        $totalMaleCount = $seniors->where('sex', 'Male')->count();
        $totalFemaleCount = $seniors->where('sex', 'Female')->count();
    
        return view('citizen')->with([
            'title' => 'Citizen',
            'seniors' => $seniors,
            'totalCount' => $totalCount,
            'totalMaleCount' => $totalMaleCount,
            'totalFemaleCount' => $totalFemaleCount,
            'sex' => $sex,
            'civil' =>$civil,
            'membership' =>$membership,
            'class' =>$class,
            'dateto' =>$dateto,
            'datefrom' =>$datefrom,
        ]);
    }

    //ACCOUNT TEMPLATE
    public function account(Request $request){
        $user = Auth::user();
        $userId = $user->id;

        $userdetail = User::find($userId);
        $alluser = User::all();

        return view('account',['title'=>'Account', 
        'userdetail'=> $userdetail,
        'alluser'=>$alluser]);
    }
    
    // PROCESS UPDATE FOR LOGGED IN USER
    public function process_user_update(Request $request, $id){
        $validated = $request->validate([
            "name" => ['required', 'min:4'],
            "email" => ['required', 'email', Rule::unique('users', 'email')->ignore($id)],
            "password" => 'nullable|confirmed|min:6',
        ]);

        // Remove password from the validated data if it's null
        if ($validated['password'] === null) {
            unset($validated['password']);
        } else {
            // Hash the password if it's not null
            $validated['password'] = Hash::make($validated['password']);
        }

        $user = User::find($id);
        $user->update($validated);

        // redirect('account')->with('message', 'Data Successfully Updated');
        return back()->with('message', 'Data Successfully Updated');
    }

    //ACTIVATE ACCOUNT
    public function activate(Request $request, $id){
        $user = User::find($id);
    
        // Use the ternary operator to toggle the status and construct the message
        $status = ($user->status === 'Active') ? 'Inactive' : 'Active';
        $user->update(['status' => $status]);
    
        // Construct the display message based on the toggled status
        $display_message = ucfirst(strtolower($status)).'d'; // 'Activated' or 'Deactivated'
    
        return back()->with('message', 'Account ' . $display_message . ' Successfully');
    }
    
    

}
