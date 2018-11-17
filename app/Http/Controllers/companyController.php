<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Html\HtmlBuilder;
use App\product;
use App\category;
use App\company;
use DB;
use Image;
use Session;
use Illuminate\Support\Facades\Input;

class companyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
        public function index()
        {
            $companys = company::all();
            return view('admin.companys.index', compact('companys'));
        }

        public function create()
        {

            return view('admin.companys.create');
        }

        public function store(Request $request)
        {
                $this->validate($request, [
                'name'=>'required',
                'email'=>'required|email|unique:users,email',
                'phone'=>'required|min:10|numeric',
                'location'=>'required',
                'logo'=>'required|mimes:jpeg,jpg,png|max:1000',

            ]);
            $company = new company;
            $company->name = $request->input('name');
            $company->email = $request->input('email');
            $company->phone = $request->input('phone');
            $company->location = $request->input('location');
            $company->save();
            \Session::flash('flash_message','successfully saved.');
            return redirect('admin/companys')->withFlashMessage('successfully saved');
        }
        public function show()
        {
            $company = company::all();
            return view('companys.show', compact('companys'));
        }
        public function product($id)
        {

            $product = product::whereRaw("find_in_set('".$id."',companys)")->get();
            return view('companys.product', compact('company'));
        }

        public function edit($id)
        {

            $company = company::find($id);
            return view('admin.companys.edit' ,compact ('company'));
        }

        public function update(Request $request, $id)
        {
                $this->validate($request, [
                'name'=>'required',

            ]);


            $company = company::find($id);
            $company->name = $request->input('name');
            $company->email = $request->input('email');
            $company->phone = $request->input('phone');
            $company->location = $request->input('location');
            if( $request->hasFile('logo') ) {
                $logo  = $request->file('logo');
                $filename = time() . '.' . $logo->getClientOriginalExtension();
                $filename = $logo->getClientOriginalName();
                Image::make($logo)->resize(600, 600)->save( public_path('/company_logos/' . $filename ) );
                // Set post-thumbnail url
                 $path = $request->logo->hashName();
                $company->logo = $filename;
            }
            $company->save();
            \Session::flash('flash_message','successfully Updated.');
            return redirect('admin/companys');
        }

        public function delete($id)
        {
            $company = company::find($id);
            $company->delete();
            return redirect('admin/companys');
        }

        public function view( $id)
        {
            $company = company::findOrFail($id);
            return view('admin.companys.view', ['company' => $company]);
        }



}
