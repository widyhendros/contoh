<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('page/user/user', [
            "title" => "Data user",
            "admins" => Users::where('isadmin', '=', 1)->paginate(10),
            "users" => Users::where('isadmin', '=', 2)->get(),
            "siswas" => Users::where('isadmin', '=', 0)->orderBy('name', 'asc')->filteruser(request(['cari_user']))->paginate(10),
            "request" => $request
        ]);
    }
    public function adduser(Request $request)
    {
        $user = new Users;
        $user->email = $request->email;
        $user->name = $request->nmlengkap;
        $user->password = $request->password;
        $user->isAdmin = $request->roleuser;
        $user->nisn = $request->nis;

        if($request->roleuser == '0'){
            $siswa = new Siswa;
            $siswa->nmlengkap = $request->nmlengkap;
            $siswa->nisn = $request->nis;
            $user->password = $request->nis;


            $siswa->save();
        }
        
        $user->save();

        return back();
    }

    public function edituser(Request $request)
    {
        $rolenya = $request->roleuser;
        $nisnnya = $request->nis;
        $emailnya = $request->email;
        $passwordnya = $request->password;
        $namanya = $request->nmlengkap;

        $usernya = Users::where('id',$request->iduser)->first();
        $usernya->isAdmin = $rolenya;
        $usernya->nisn = $nisnnya;
        $usernya->email = $emailnya;
        $usernya->password = $passwordnya;
        $usernya->name = $namanya;

        $usernya->save();

        return redirect()->back()->with(['pesanedit'=>true, 'pesan'=>'Akun Berhasil Diubah']);
        // return redirect()->back();
    }

    public function deleteuser(Request $request)
    {
        $users = Users::where('id',$request->id)->first();
      
        if(isset($users->id)){
            $users = Users::where('id',$request->id)->delete();
        }

        return back()->with(['Deleteuser'=>true, 'pesan'=>'User Berhasil dihapus!']);
    }

    public function change_password(Request $request){
        $password = $request->password;

        $user = Users::where('id',$request->id)->first();
        $user->password = $password;

       $user->save();

        return redirect()->back()->with(['changepassword'=>true, 'pesan'=>'Password Berhasil diubah']);
    }

    public function resetpassword(Request $request)
    {
        // $reset = 123456;
        // $idnya = $request->$id;
        // dd($idnya);


        // $resetpassword = Users::where('id',$request->id)->first();
        // $resetpassword->password = $reset;

        $resetpassword = DB::table('users')
              ->where('id', $request->id)
              ->update(['password' => 123456]);

    //    $resetpassword->update();

        return redirect()->back()->with(['resetpassword'=>true, 'pesan'=>'Reset Password Berhasil']);
    }
    
}
