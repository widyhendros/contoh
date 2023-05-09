<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thnpelajaran;

class TahunajaranController extends Controller
{
    public function index() {
        return view('page/tahunajaran/tahunajaran', [
            "title" => "Tahun Ajaran", "pelajaran"=> Thnpelajaran::orderBy('nama_thnpelajaran', 'desc')->get()]);
    }

    public function insertthnpelajaran(Request $request)
    {

        $thnpelajaran = new Thnpelajaran;
        $thnpelajaran->nama_thnpelajaran = $request->nama_thnpelajaran;
        $thnpelajaran->status_thnpelajaran = 0;

       $thnpelajaran->save();

        return redirect()->back();
        // return redirect()->back();
    }

    public function updatethnpelajaran(Request $request)
    {
        $tahun = $request->nama_thnpelajaran;

        $thnpelajaran = Thnpelajaran::where('id',$request->idtahunpelajaran)->first();
        $thnpelajaran->nama_thnpelajaran = $tahun;

       $thnpelajaran->save();

        return redirect()->back()->with(['pesanedit'=>true, 'pesan'=>'Tahun Pelajaran Berhasil Diubah']);
        // return redirect()->back();
    }

    public function getDataById()
    {
        echo json_encode($_POST);
    }

    public function deletethnpelajaran(Request $request)
    {
        $thnpelajaran = Thnpelajaran::where('id',$request->id)->first();
      
        if(isset($thnpelajaran->id)){
            $thnpelajaran = Thnpelajaran::where('id',$request->id)->delete();
        }

        return back()->with('success', 'sss');
    }

    public function setactive($id){
        \DB::table('thnpelajaran')->update([
            'status_thnpelajaran' => 0
        ]);
        $setactive = Thnpelajaran::findOrFail($id);
        $setactive->status_thnpelajaran = 1;

        $setactive->save();
        return redirect()->back()->with(['sukses'=>true, 'pesan'=>'Tahun Pelajaran Berhasil Diaktifkan']);
    }
    

}
