<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\worker;
use App\Models\register;
use App\Models\empdocuments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use DB;
use Carbon\Carbon;
use Symfony\Contracts\Service\Attribute\Required;

class employeeinsertcontroller extends Controller
{
    public function emp_details(){
        $e = employee::with('createdby')->get();
       
        $count=0;
        foreach($e as $user)
        {
           $date =Carbon::parse($user->dob)->format('d-m-Y');
           $e[$count]['dob']=$date;
           $count+=1;
        }
       
        return view('emplist',compact('e'));
    }
    public function index(){
        return view('index');
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' =>'required',
            'address' =>'required',
            'status' =>'required',
            'dob' =>'required',
        ]);
        $data =[
            'name' =>$request->name,
            'address' =>$request->address,
            'status' =>$request->status,
            'dob' =>$request->dob,
        ];
        employee ::create($data);
        session()->flash('flase_message','customer master updated successfully');
        return redirect()->back();
    }
    public function show($id){
        $user= employee ::where('id',$id)->first();
        return view('show',compact('user'));
    }
    public function edit($id){
        $user= employee ::where('id',$id)->first();
        $date =Carbon::parse($user->dob)->format('Y-m-d');
        $user['dob']=$date;
      
        return view('edit',compact('user'));
    }
    public function update(Request $request,$id){
        $user= employee ::where('id',$id)->first();
        $validated = $request->validate([
            'name' =>'required',
            'address' =>'required',
            'status' =>'required',
            'dob' =>'required',
        ]);
        $data =[
            'name' =>$request->name,
            'address' =>$request->address,
            'status' =>$request->status,
            'dob' =>$request->dob,
        ];
        $user ->update($data);
        session()->flash('flase_message','user updated successfully');
        $e = employee::get();
        return view('emplist',compact('e'));
    }
    public function destroy($id){
        $user= employee ::where('id',$id)->delete();
        session()->flash('flase_msg','user deleted successfully');
        $e = employee::get();
        return view('emplist',compact('e'));
    }
    public function addemp(){

    //    employee::get();
       $e =employee::whereNotIn('id', function($se){
            $se->select('created_id')->from('worker');
        })->get();
        
        
        return view('addemp',compact('e'));
    }
    public function add(Request $request){
        $validated = $request->validate([
            'name' =>'required',
            'address' =>'required',
            'created_id' =>'required',
           
        ]);
        $data =[
            'name' =>$request->name,
            'address' =>$request->address,
            'created_id' =>$request->created_id,
            
        ];
    worker::create($data);
        session()->flash('flase_message','customer master updated successfully');
        return redirect()->back();
    }
    public function adddocument(){

        //    employee::get();
        $e = worker::get();
            
            
            return view('adddocument',compact('e'));
        }
        public function docustore(Request $request){
           
            $validated = $request->validate([
                'name' =>'required',
                'worker_id' =>'required',
               
            ]);
            $data =[
                'name' =>$request->name,
                'worker_id' =>$request->worker_id,
                
            ];
          
           empdocuments::create($data);
           
            session()->flash('flase_message','customer master updated successfully');
            return redirect()->back();
        }
        public function dcshow($id){
            $user= worker ::where('created_id',$id)->first();
          
            return view('dcshow',compact('user'));
        }
        public function register(){
            return view('register');
        }
        public function regstore(Request $request){
          return $request;
            $validated = $request->validate([
                'name' =>'required',
                'email' =>'required|email|unique:users',
                'password' => 'required|min:6',
                'cpassword' =>'required|same:password',
            ]);
            
            $data =[
                'name' =>$request->name,
                'email' =>$request->email,
                'password' =>Hash::make($request->password)
                
            ];
            register ::create($data);
            session()->flash('flase_message','Register successfully');
            return redirect()->back();
        }
        public function login(){
            return view('login');
        }
        public function Login_in(Request $request)
        {
           
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);
       
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
               
                
                return redirect('employee_list')->withSuccess('You have Successfully loggedin');
            }
            // return 'Oppes! You have entered invalid email or password ';
            return redirect("user/login")->with('flase_message','Oppes! You have entered invalid credentials');
        }
        public function logout() {
            Session::flush();
            Auth::logout();
      
            return Redirect('user/login');
        }
    }



