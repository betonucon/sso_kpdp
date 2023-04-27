<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\Employe;
use App\Models\User;

class EmployeController extends Controller
{
    
    public function index(request $request)
    {
        error_reporting(0);
        $template='top';
        
        return view('employe.index',compact('template'));
    }

    public function view_data(request $request)
    {
        error_reporting(0);
        $template='top';
        $id=decoder($request->id);
        
        $data=Employe::where('id',$id)->first();
        
        if($id==0){
            $disabled='';
        }else{
            $disabled='readonly';
        }
        return view('employe.view_data',compact('template','data','disabled','id'));
    }
   

    public function get_data(request $request)
    {
        error_reporting(0);
        $query = Employe::query();
        // if($request->hide==1){
        //     $data = $query->where('active',0);
        // }else{
        //     $data = $query->where('active',1);
        // }
        $data = $query->orderBy('nama','Asc')->get();

        return Datatables::of($data)
            
            ->addColumn('action', function ($row) {
                if($row->active==1){
                    $btn='
                        <div class="btn-group">
                            <button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Act <i class="fa fa-sort-desc"></i> 
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:;" onclick="location.assign(`'.url('employe/view').'?id='.encoder($row->id).'`)">View</a></li>
                                <li><a href="javascript:;"  onclick="delete_data(`'.encoder($row->id).'`,`0`)">Hidden</a></li>
                            </ul>
                        </div>
                    ';
                }else{
                    $btn='
                        <div class="btn-group">
                            <button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Act <i class="fa fa-sort-desc"></i> 
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:;"  onclick="delete_data(`'.encoder($row->id).'`,1)">Un Hidden</a></li>
                            </ul>
                        </div>
                    ';
                }
                return $btn;
            })
            
            ->rawColumns(['action'])
            ->make(true);
    }
    public function getdatauser(request $request)
    {
        error_reporting(0);
        $data=Employe::get();
        foreach($data as $o){
            $user=User::UpdateOrcreate([
                'username'=>$o->nik,
            ],[
                'email'=>$o->email,
                'name'=>$o->nama,
                'role_id'=>$o->role_id,
                'password'=>Hash::make($o->nik),
            ]);
        }
    }

    public function delete(request $request)
    {
        $id=decoder($request->id);
        
        $mst=Employe::where('id',$id)->first();
        $data=Employe::where('id',$id)->update(['active'=>$request->act]);
        $user=User::where('username',$mst->nik)->update(['active'=>$request->act]);
    }
    public function switch_to(request $request)
    {
        $data=User::where('username',Auth::user()->username)->update(['role_id'=>$request->role_id]);
    }

    public function get_role(request $request)
    {
        error_reporting(0);
        $query = Viewrole::query();
        // if($request->KD_Divisi!=""){
        //     $data = $query->where('kd_divisi',$request->KD_Divisi);
        // }
        $data = $query->whereNotIn('id',array(1,8))->orderBy('id','Asc')->get();
        $success=[];
        foreach($data as $o){
            $btn='
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="info-box" style="margin-bottom: 5px; min-height: 50px;">
                        <span class="info-box-iconic bg-'.$o->color.'" style="margin-bottom: 1px; min-height: 50px;"><i class="fa fa-users"></i></span>
        
                        <div class="info-box-content" style="padding: 5px 10px; margin-left: 50px;">
                            <span class="info-box-text">'.$o->role.'</span>
                            <span class="info-box-number">'.$o->total.'<small>"</small></span>
                        </div>
                    </div>
                </div>
            ';
            $scs=[];
            $scs['id']=$o->id;
            $scs['action']=$btn;
            $success[]=$scs;
        }
        return response()->json($success, 200);
    }
    
    
   
    public function store(request $request){
        error_reporting(0);
        $rules = [];
        $messages = [];
        
        if($request->id=='0'){
            $rules['nik']= 'required';
            $messages['nik.required']= 'Masukan nik';
        }
        

        $rules['nama']= 'required';
        $messages['nama.required']= 'Masukan nama';
        
        $rules['jabatan_id']= 'required';
        $messages['jabatan_id.required']= 'Masukan jabatan';

        $rules['role_id']= 'required';
        $messages['role_id.required']= 'Masukan Otorisasi';

        
       
        $validator = Validator::make($request->all(), $rules, $messages);
        $val=$validator->Errors();


        if ($validator->fails()) {
            echo'<div class="nitof"><b>Oops Error !</b><br><div class="isi-nitof">';
                foreach(parsing_validator($val) as $value){
                    
                    foreach($value as $isi){
                        echo'-&nbsp;'.$isi.'<br>';
                    }
                }
            echo'</div></div>';
        }else{
            if($request->id=='0'){
                $data=Employe::UpdateOrcreate([
                    'nik'=>$request->nik,
                ],[
                    'nama'=>$request->nama,
                    'jabatan_id'=>$request->jabatan_id,
                    'role_id'=>$request->role_id,
                    
                    'active'=>1,
                ]);
                $user=User::UpdateOrcreate([
                    'username'=>$request->nik,
                ],[
                    'name'=>$request->nama,
                    'email'=>$request->nik.'@gmail.com',
                    'password'=>Hash::make($request->nik),
                    'role_id'=>$request->role_id,
                    'role_utama'=>$request->role_id,
                    'active'=>1,
                ]);
                echo'@ok';
            }else{
                $data=Employe::UpdateOrcreate([
                    'nik'=>$request->nik,
                ],[
                    'nama'=>$request->nama,
                    'jabatan_id'=>$request->jabatan_id,
                    'role_id'=>$request->role_id,
                ]);

                $user=User::UpdateOrcreate([
                    'username'=>$request->nik,
                ],[
                    'name'=>$request->nama,
                    'email'=>$request->nik.'@gmail.com',
                    'role_id'=>$request->role_id,
                    'active'=>1,
                ]);
                echo'@ok';
            }
           
        }
    }
}
