<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\category;
use App\company;
use Alert;

class categorysController extends Controller
{
/**
 * Create a new controller instance.
 *
 * @return void
 */
        public function index()
        {
          $companys = company::all();

            $categorys = category::all();
            return view('admin.categorys.index',compact('categorys','companys'));
        }

        public function store(Request $request)
        {

                $this->validate($request, [
                'name'=>'required',


            ]);
            $data = $request->all();

            $category = new category;
            $category->name = $request->input('<name></name>');

            $category->company_id = (!empty($request->input('company_id'))) ? $request->input('company_id'):"0";
            $category->save();
            // return response()->json($category);
            // Alert::message('Message', 'Optional Title');
            return 1;
        }

        public function show()
        {
            $category = Category::all();
            return view('categorys.show', compact('categorys'));
        }
            public function edit($id)
            {
                $category = category::find($id);
                $companys = company::all();
                return view('admin.categorys.edit', compact('category','companys'));

            }

            public function update(Request $request, $id)
            {
                $this->validate($request, [
                'name'=>'required',

            ]);
            $category = category::find($id);
            $category->name = $request->input('name');
            $category->company_id = (!empty($request->input('company_id'))) ? $request->input('company_id'):"0";
            $category->save();
            \Session::flash('flash_message','successfully  Updated.');
            return redirect('admin/categorys');
        }

        public function delete($id)
        {
            $category = category::find($id);
            $category->delete();
            return redirect('admin/categorys');
        }

        public function deleteall(Request $request)
        {
            if(!$request->has('delete_id') || empty($request->input('delete_id')))
             {
                  return back()->withError("Selection required!");
              }
           category::whereIn('id', $request->input('delete_id'))->delete();
           return back()->withMessage("Deleted successfully!");


       }

}
