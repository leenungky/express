<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PHPExcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Helpers\Helpers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use \URL;
use \PHPExcel_IOFactory, \PHPExcel_Style_Fill, \PHPExcel_Cell, \PHPExcel_Cell_DataType, \SiteHelpers;

class AgentController extends Controller {
    
    var $data;
    public function __construct(Request $req){
    	$this->data["type"]= "master_perwakilan";    	
    	$this->data["request"]= $req;    	
    }

	public function getList(){  
		$req = $this->data["request"];      
        $input= $req->input();     
        $dbagent = $this->_get_index_filter($input);
        $this->data["agent"] = $dbagent->get();
        return view('agent.index', $this->data);
    }

    public function getAdd(){		
		return view('agent.new', $this->data);  
	}

	public function getEdit($id){
		$city = DB::table("tb_cities")->where("id", $id)->first();
		$this->data["city"] = $city;
		return view('city.edit', $this->data);  
	}

	public function postCreate(){	
		$req = $this->data["request"];
	 	$validator = Validator::make($req->all(), [            
            'code' => 'required|unique:tb_cities|max:100',
            'name' => 'required|unique:tb_cities'
        ]);

        if ($validator->fails()) {            
            return Redirect::to(URL::previous())->withInput(Input::all())->withErrors($validator);            
        }
        $arrInsert = $req->input();
        $arrInsert["created_at"] = date("Y-m-d h:i:s");
        unset($arrInsert["_token"]);        
        DB::table("tb_cities")->insert($arrInsert);        
        return redirect('/cities/list')->with('message', "Successfull create");			
	}
	
	public function postUpdate($id){	
		$req = $this->data["request"];
        $validator = Validator::make($req->all(), [            
            'code' => 'required|max:100',
            'name' => 'required|'
        ]);

        if ($validator->fails()) {            
            return Redirect::to(URL::previous())->withInput(Input::all())->withErrors($validator);            
        }
        $arrUpdate = $req->input();
        
        unset($arrUpdate["_token"]);        
        DB::table("tb_cities")->where("id", $id)->update($arrUpdate);        
        return redirect('/cities/list')->with('message', "Successfull update");			
	}

	private function _get_index_filter($filter){
        $dbcust = DB::table("agent");
        if (isset($filter["name"])){
            $dbcust = $dbcust->where("name", "like", "%".$filter["name"]."%");
        }        
        return $dbcust;
    }

}
    