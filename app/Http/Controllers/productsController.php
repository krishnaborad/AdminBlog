<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vinkla\Algolia\Facades\Algolia;
use App\product;
use App\category;

use App\company;
use App\order;
use DB;
use Image;
use Session;

class productsController extends Controller
{
    /**
     * Create a new controller instance.
     *

     * @return void
     */
        public function index()
        {
            $products = product::with('company','category')->get();

            return view('admin.products.index', compact('products'));

        }
        public function create()
        {

            $categorys = category::all();
            $companys = company::all();
            return view('admin.products.create', compact('categorys','companys'));

        }

        public function store(Request $request)
        {

                $this->validate($request, [

               'name'=>'required',
               'prise'=>'required',
               'product_code'=>'required|unique:product,product_code',
               'category_id'=>'required',

                ]);

                $product = new product;

                $product->name = $request->input('name');
                $product->prise = $request->input('prise');
                $product->product_code = $request->input('product_code');
                $product->category_id = $request->input('category_id');

                if( $request->hasFile('product_img') )
                {
                    $image  = $request->file('product_img');
                    $filename = time() . '.' . $image->getClientOriginalExtension();
                    $filename = $image->getClientOriginalName();
                    Image::make($image)->resize(600, 600)->save( public_path('/product_image/' . $filename ) );
                    $path = $request->product_img->hashName();
                    $product->product_img = $filename;
                }
                $product->save();

                  \Session::flash('flash_message','successfully saved.');
                return redirect('admin/products')->with('warning','Item created successfully!');
          }

            public function edit($id)
            {
                $product = product::find($id);
                $categorys = category::all();
                $companys = company::all();
                return view('admin.products.edit' ,compact ('product','categorys','companys'));

            }

            public function update(Request $request, $id)
            {

                $this->validate($request, [
                'name'=>'required',
                'prise'=>'required',
                'product_code'=>'required',
                'category_id'=>'required',


            ]);
            $product = product::find($id);
            $product->name = $request->input('name');
            $product->prise = $request->input('prise');
            $product->product_code = $request->input('product_code');
            $product->category_id = $request->input('category_id');
            if( $request->hasFile('product_img') )
            {
                $image  = $request->file('product_img');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $filename = $image->getClientOriginalName();
                Image::make($image)->resize(600, 600)->save( public_path('/product_image/' . $filename ) );
                // Set post-thumbnail url
                $path = $request->product_img->hashName();
                $product->product_img = $filename;
            }
            $product->save();

            \Session::flash('flash_message','Product successfully Updated.');
            return redirect('admin/products');

        }
        public function delete($id)
        {
            $product = product::findOrFail($id);
            $image_path = public_path().'/product_image/'.$product->product_img;
            unlink($image_path);
            $product->delete();
            return redirect('admin/products');
        }

         public function deleteall(Request $request)
         {
             if(!$request->has('delete_id') || empty($request->input('delete_id')))
              {
                   return back()->withError("Selection required!");
               }
            product::whereIn('id', $request->input('delete_id'))->delete();
            return back()->withMessage("Deleted successfully!");


        }

            // public function imagedelete($id,$product_id)
            // {
            //
            // $images = image::find($id);
            // unlink($images->image_path);
            // $images->delete();
            // return redirect('admin/product/edit/'.$product_id);
            // }

            public function watch($id)
            {
                $product = product::find($id);
                $order = order::all();
                return view('admin.products.order' ,compact ('product','order'));
            }


}
