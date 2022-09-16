<?php

namespace App\Http\Controllers;
use App\Models\persons;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class UserController extends Controller
{
    public function index() {
        return view('list');
    }
    public function add()
    {
 
    return view('add');
    }

    public function getData(Request $request) {

        $draw 				= 		$request->get('draw'); // Internal use
        $start 				= 		$request->get("start"); // where to start next records for pagination
        $rowPerPage 		= 		$request->get("length"); // How many recods needed per page for pagination

        $orderArray 	   = 		$request->get('order');
        $columnNameArray 	= 		$request->get('columns'); // It will give us columns array
                            
        $searchArray 		= 		$request->get('search');
        $columnIndex 		= 		$orderArray[0]['column'];  // This will let us know,
                                                            // which column index should be sorted 
                                                            // 0 = id, 1 = name, 2 = email , 3 = created_at

        $columnName 		= 		$columnNameArray[$columnIndex]['data']; // Here we will get column name, 
                                                                        // Base on the index we get

        $columnSortOrder 	= 		$orderArray[0]['dir']; // This will get us order direction(ASC/DESC)
        $searchValue 		= 		$searchArray['value']; // This is search value 


        $persons = \DB::table('persons');
        $total = $persons->count();

        $totalFilter = \DB::table('persons');
        if (!empty($searchValue)) {
            $totalFilter = $totalFilter->where('name','like','%'.$searchValue.'%');
            $totalFilter = $totalFilter->orWhere('email','like','%'.$searchValue.'%');
            $totalFilter = $totalFilter->orWhere('fathername','like','%'.$searchValue.'%');
        }
        $totalFilter = $totalFilter->count();
       $per = persons::all();
       foreach($per as $per){
        $data['id']="<input  type='checkbox' class='checkbox' data-id='{$per->id}' value=''  id='person'>";
          $data['ids']=$per->id;
          $data['name']=$per->name;
          $data['fathername']=$per->fathername;
          $data['address']=$per->address;
          $data['email']=$per->email;
          $data['edit']="<a class='toggle' href='edit/$per->id'>edit</a>";
          $arr [] =$data;
          
       }
       

        $arrData = \DB::table('persons');
        $arrData = $arrData->skip($start)->take($rowPerPage);
        $arrData = $arrData->orderBy($columnName,$columnSortOrder);

        if (!empty($searchValue)) {
            $arrData = $arrData->where('name','like','%'.$searchValue.'%');
            $arrData = $arrData->orWhere('email','like','%'.$searchValue.'%');
            $arrData = $arrData->orWhere('fathername','like','%'.$searchValue.'%');
        }

        $arrData = $arrData->get();

        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $total,
            "recordsFiltered" => $totalFilter,
            "data" => $arr,
        );

        return response()->json($response);
    }
    public function insert(Request $request)
   {
    
    $person = new persons();
   
        $person->name = $request->input('name');
        $person->fathername = $request->input('fathername');
        $person->address= $request->input('address');
        $person->email = $request->input('name');
      
        $person->save();
       
        return response()->json(['return' => 'some data']);
   }
   public function delete(Request $request)
    {
        $idss = $request->ids;
        persons::whereIn('id',explode(",",$idss))->delete();
        return response()->json(
            
        );
    }
    public function edit($id,Request $request)
    { 
        $person = persons::find($id);
       return view('edit',compact('person'));
    }
    public function update(request $request,$id)
    {    
        $person =persons::find($id);
        $person->name = $request->input('name');
        $person->fathername = $request->input('fathername');
        $person->address= $request->input('address');
        $person->email = $request->input('name');
      
        $person->update();

        return view('list');
       
    }
}
