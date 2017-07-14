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

class CollectController extends Controller {
    
    var $data;
    public function __construct(Request $req){
    	$this->data["type"]= "Gabungan";    	
    }

	public function index(Request $req){        
        $input= $req->input();         
        
        return view('collect.index', $this->data);
    }
}
    