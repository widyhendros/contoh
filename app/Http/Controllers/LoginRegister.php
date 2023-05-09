<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\Candidate;
use Session;

class LoginRegister extends Controller
{
    public function register(Request $request)
    {
        $member = new Member;

        $member->MEMBER_USERNAME = $request->email;
        $member->MEMBER_PASSWORD = $request->password;
        // $member->MEMBER_PASSWORD = bcrypt($request->password);
		if($member->save())
        {
			$member_id =  Member::where('MEMBER_USERNAME',$request->email)->where('MEMBER_PASSWORD',$request->password)->first();
			$candidate = new Candidate;
			$candidate->MEMBER_ID = $member_id->MEMBER_ID;
			$candidate->CDT_NAME = $request->name;
			$candidate->CDT_EMAIL = $request->email;
			$candidate->save();
		}
     
        return view('index');
    }

    public function Login()
	{
		if(Session::has('login')) {
	 		return redirect('/Dashboard');
	 	}
	 	else
	 	{
			return view('login');
		}
	}

    public function PostLogin(Request $request)
	{

		$checklogin = users::where("nisn","=",$request['email'])->get();
		if(empty($checklogin[0]->nisn)){
            //////login admin////////////
            // $checklogin = users::where("email","=",$request['email'])->where("password",$request['password'])->where("isadmin",'1')->get();
            $checklogin = users::where("email","=",$request['email'])->where("password",$request['password'])->get();
            if(!empty($checklogin[0]->id))
            {
				Session::put('nisn', '');
				Session::put('id', $checklogin[0]->id);
				Session::put('tanggallahir', $checklogin[0]->tanggallahir);
				Session::put('admin', $checklogin[0]->isadmin);
				Session::put('name', $checklogin[0]->name);

                Session::put('login', true);
                return redirect('/dashboard');	
            }else{
                return redirect()->back()->with('alert', 'Username & Password tidak sesuai!');
            }
            /////////////////////////
			
			
            // echo 'Oops! The username you entered isn\'t connected to an account.';

		}

		else {
			if($checklogin[0]->password != $request['password']){
				return redirect()->back()->with('alert', 'Username & Password tidak sesuai!');
				// echo 'Oops! The password that you\'ve entered is incorrect';
			}else{
				$user = 
					users::select('users.id','siswa.id as siswaid','users.nisn', 'users.name')
							->leftjoin('siswa','siswa.nisn','=','users.nisn')
							->where("users.nisn",$request['email'])
							->where("users.password",$request['password'])
							->get();
					
					Session::put('nisn', $user[0]->nisn);
					Session::put('id', $user[0]->id);
					Session::put('siswaid', $user[0]->siswaid);
					Session::put('admin', '0');
					Session::put('name', $user[0]->name);
	
				Session::put('login', true);
				return redirect('/page/siswa/tambahsiswa/1');	
			}	
		}

	}

	public function logout()
	{
		// \LogActivity::addToLog('Logout from TREES');
		Session::flush();

	 	return redirect('/login');
	}
}
