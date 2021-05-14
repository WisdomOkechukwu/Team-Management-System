<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        
        $this->validate($request,[
            
            'name' => 'required|max:225',
            'company_name' => 'required|max:225',
            'picture' => 'required',
            'email' =>'required|email|unique:users,email',
            'password'=>['required','confirmed',Password::min(8)->mixedCase()],
         ]);
         
         $company_slug_initial = $request->company_name;
         $company_slug =  str_replace(' ', '-', strtolower($company_slug_initial));

         $status = 'Admin';

        $image = $request->file('picture');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('assets/img/profile'),$imageName);
        
         
        User::create([
            'name' => $request->name,
            'company' => $request->company_name,
            'company-slug' => $company_slug,
            'status' => $status,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' =>$imageName,
        ]);

        Auth::attempt($request->only('email','password'));

        

        
    }

    public function workerindex($slug)
    {
        $value = User::select('*')
        ->where('company_slug','=', $slug)->get();
        
        $company_name = '';
        $company_id=0;
        foreach($value as $key){
            $company_name = $key->company;
            $company_id = $key->id;
        }
                
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
        
        $this->validate($request,[
            
            'name' => 'required|max:225',
            'picture' => 'required',
            'email' =>'required|email|unique:users,email',
            'password'=>['required','confirmed',Password::min(8)->mixedCase()],
         ]);

        $image = $request->file('picture');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('assets/img/profile'),$imageName);

        $status = 'Worker';

        User::create([
            'name' => $request->name,
            'status' => $status,
            'Biz_id'=>$request->slug,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' =>$imageName,
        ]);

        Auth::attempt($request->only('email','password'));

        dd('done');

    }
}
