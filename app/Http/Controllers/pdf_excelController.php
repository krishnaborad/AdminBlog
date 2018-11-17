<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Excel;
use Input;
use DB;
use App\users;
use App\order;
use App\product;
class pdf_excelController extends Controller
{

    public function pdf()
    {
        $user = users::all();

        $pdf = PDF::loadView('admin.pdf.users', compact('user'));
        return $pdf->download('USERS DETAILS.pdf');
    }
    public function excel()
    {
        $user = users::get()->toArray();


        return Excel::create('UsertDetails',function($excel) use ($user){
           $excel->sheet('UserDetails',function($sheet) use($user) {

                $sheet->fromArray($user);

       });
   })->export('xlsx');
   }

   public function import_excel()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$user = Excel::load($path, function($reader) {
			})->get();
			if(!empty($user) && $user->count()){
				foreach ($user as $key => $value) {
					$insert[] = ['name' => $value->name,
                                'email' => $value->email,
                                'birthday' => $value->birthday,
                                'gender' => $value->gender,
                                'marital_status' => $value->marital_status,
                                'phone_no' => $value->phone_no,
                                'contry' => $value->contry,
                                'state' => $value->state,
                                'city' => $value->city,
                                'type_id' => $value->type_id,
                            ];
				}
				if(!empty($insert)){
					DB::table('users')->insert($insert);
					\Session::flash('flash_message','Product successfully saved.');
				}
			}
		}
		return back();
	}
    public function order_pdf($id)
    {
        $order = order::find($id);
        $products = product::all();
        $pdf = PDF::loadView('admin.orders.order_pdf', compact('order','products'));
        return $pdf->download('ORDERDETAILS.pdf');
    }
    public function formate(Request $request,$id)
    {
        $multi = order ::find($id);
        Mail;
    }

}
