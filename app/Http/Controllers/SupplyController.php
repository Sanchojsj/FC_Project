<?php

namespace App\Http\Controllers;

use App\Models\Supply;
use App\Models\SupplyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplies=Supply::all();
        return view('Admin.supply_index')->with('supplies',$supplies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile("cover")){
            $file=$request->file("cover");
            $imageName=time().'_'.$file->getClientOriginalName();
            $file->move(\public_path("cover/"),$imageName);

            $supply =new Supply([
                'supply_code'=>$request->supply_code,
                'supply_name'=>$request->supply_name,
                'price'=>$request->price,
                'amount'=>$request->amount,
                'expiration_date'=>$request->expiration_date,
                "body" =>$request->body,
                "cover" =>$imageName,
            ]);
           $supply->save();
        }


            if($request->hasFile("supply_images")){
                $files=$request->file("supply_images");
                foreach($files as $file){
                    $imageName=time().'_'.$file->getClientOriginalName();
                    $request['supply_id']=$supply->id;
                    $request['supply_image']=$imageName;
                    $file->move(\public_path("/supply_images"),$imageName);
                    SupplyImage::create($request->all());

                }
            }

            return redirect("/supply_index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplies  $supplies
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplies=Supply::findOrFail($id);
        return view('Admin.supply_ver')->with('supplies',$supplies);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplies  $supplies
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplies=Supply::findOrFail($id);
        return view('Admin.supply_editar')->with('supplies',$supplies);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supply  $supplies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $supply=Supply::findOrFail($id);
        if($request->hasFile("cover")){
            if (File::exists("cover/".$supply->cover)) {
                File::delete("cover/".$supply->cover);
            }
            $file=$request->file("cover");
            $supply->cover=time()."_".$file->getClientOriginalName();
            $file->move(\public_path("/cover"),$supply->cover);
            $request['cover']=$supply->cover;
        }
   
           $supply->update([
            'supply_code'=>$request->supply_code,
            'supply_name'=>$request->supply_name,
            'price'=>$request->price,
            'amount'=>$request->amount,
            'expiration_date'=>$request->expiration_date,
            "body" =>$request->body,
            "cover"=>$supply->cover,

           ]);

           
            if($request->hasFile("supply_images")){
                $files=$request->file("supply_images");
                foreach($files as $file){
                    $imageName=time().'_'.$file->getClientOriginalName();
                    $request['supply_id']=$supply->id;
                    $request['supply_image']=$imageName;
                    $file->move(\public_path("/supply_images"),$imageName);
                    SupplyImage::create($request->all());

                }
            }

           return redirect("/supply_index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplies  $supplies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplies=Supply::findOrFail($id);

        if (File::exists("cover/".$supplies->cover)) {
            File::delete("cover/".$supplies->cover);
        }
        $supply_images=SupplyImage::where("supply_id",$supplies->id)->get();
        foreach($supply_images as $supply_image){
        if (File::exists("supply_images/".$supply_image->supply_image)) {
           File::delete("supply_images/".$supply_image->supply_image);
       }
        }
        $supplies->delete();
        return back();


   }

   public function deletesupply_image($id){
    $supply_images=SupplyImage::findOrFail($id);
    if (File::exists("supply_images/".$supply_images->supply_image)) {
       File::delete("supply_images/".$supply_images->supply_image);
   }

   SupplyImage::find($id)->delete();
   return back();
}

  public function deletecover($id){
   $cover=Supply::findOrFail($id)->cover;
   if (File::exists("cover/".$cover)) {
      File::delete("cover/".$cover);
  }
  return back();
}
    
}
