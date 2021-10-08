<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index()
    {
        return view('Auth.register');
        
    }
    public function store(Request $request)
    {
        //? Validating Request Data from Form
        $this->validate($request,[
            
            'name' => 'required|max:225',
            'company_name' => 'required|max:225',
            'picture' => 'required',
            'email' =>'required|email|unique:users,email',
            'password'=>['required','confirmed',Password::min(8)->mixedCase()],
         ]);
         //?Replacing the spaces with ('-') 
         $company_slug_initial = $request->company_name;
         $company_slug =  str_replace(' ', '-', strtolower($company_slug_initial));
        //? Initializing status to Admin
         $status = 'Admin';

         //?MOving Picture to the Profile Image Directory
        $image = $request->file('picture');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('assets/img/profile'),$imageName);
        
        $imageus = "assets/img/profile/$imageName";

        $dateStamp = new DateTime();
        
        //? Creating User Details 
        User::create([
            'name' => $request->name,
            'company' => $request->company_name,
            'company_slug' => $company_slug,
            'status' => $status,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' =>$imageus,
            'email_verified_at' => $dateStamp->getTimestamp()
        ]);
        //?Logging User In
        Auth::attempt($request->only('email','password'));
        //?Redirecting to AdminRoute
        return redirect()->route('AdminDashboard');

        

        
    }

    public function workerindex($slug)
    {   
        //?finding user using the company-slug data
        $value = User::select('*')
        ->where('company_slug','=', $slug)->get();
        //?Getting the company name and ID
        $company_name = '';
        $company_id=0;
        foreach($value as $key){
            $company_name = $key->company;
            $company_id = $key->id;
        }
        //?Checking if company exsists        
        if(count($value) == 0){
            return view('Error.Util.error');
            
        }
        
            return view('Auth.User',[
                'company'=>$company_name,
                'company_id'=>$company_id,
            ]);
        
    
    }

    public function workerstore(Request $request)
    {
        //? Validating Request Data from Form
        $this->validate($request,[
            
            'name' => 'required|max:225',
            'picture' => 'required',
            'email' =>'required|email|unique:users,email',
            'password'=>['required','confirmed',Password::min(8)->mixedCase()],
         ]);
        
        //?MOving Picture to the Profile Image Directory
        $image = $request->file('picture');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('assets/img/profile'),$imageName);
        $imageus = "assets/img/profile/$imageName";
        //? Initializing status to Admin
        $status = 'Worker';
        
        //? Creating User Details 
        User::create([
            'name' => $request->name,
            'status' => $status,
            'Biz_id'=>$request->slug,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' =>$imageus,
        ]);
        //?Logging User In
        Auth::attempt($request->only('email','password'));
        //?Redirecting to WorkerRoute
        return redirect()->route('WorkerDashboard');

    }
}
