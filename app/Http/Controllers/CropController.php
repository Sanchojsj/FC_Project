<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\CropImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crops=Crop::all();
        return view('Admin.crop_index')->with('crops',$crops);
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

            $crop =new Crop([
                'crop_code'=>$request->crop_code,
                'crop_name'=>$request->crop_name,
                'start_date'=>$request->start_date,
                'finish_date'=>$request->finish_date,
                'land_area'=>$request->land_area,
                'type_phase'=>$request->type_phase,
                'type_crop'=>$request->type_crop,
                "body" =>$request->body,
                "cover" =>$imageName,
            ]);
           $crop->save();
        }


            if($request->hasFile("crop_images")){
                $files=$request->file("crop_images");
                foreach($files as $file){
                    $imageName=time().'_'.$file->getClientOriginalName();
                    $request['crop_id']=$crop->id;
                    $request['crop_image']=$imageName;
                    $file->move(\public_path("/crop_images"),$imageName);
                    CropImage::create($request->all());

                }
            }

            return redirect("/crop_index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crop  $crop
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $crops=Crop::findOrFail($id);
        return view('Admin.crop_ver')->with('crops',$crops);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crop  $crop
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crops=Crop::findOrFail($id);
        return view('Admin.crop_editar')->with('crops',$crops);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crop  $crop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $crop=Crop::findOrFail($id);
        if($request->hasFile("cover")){
            if (File::exists("cover/".$crop->cover)) {
                File::delete("cover/".$crop->cover);
            }
            $file=$request->file("cover");
            $crop->cover=time()."_".$file->getClientOriginalName();
            $file->move(\public_path("/cover"),$crop->cover);
            $request['cover']=$crop->cover;
        }
   
           $crop->update([
            'crop_code'=>$request->crop_code,
            'crop_name'=>$request->crop_name,
            'start_date'=>$request->start_date,
            'finish_date'=>$request->finish_date,
            'land_area'=>$request->land_area,
            'type_phase'=>$request->type_phase,
            'type_crop'=>$request->type_crop,
            "body" =>$request->body,
            "cover"=>$crop->cover,

           ]);

           
            if($request->hasFile("crop_images")){
                $files=$request->file("crop_images");
                foreach($files as $file){
                    $imageName=time().'_'.$file->getClientOriginalName();
                    $request['crop_id']=$crop->id;
                    $request['crop_image']=$imageName;
                    $file->move(\public_path("/crop_images"),$imageName);
                    CropImage::create($request->all());

                }
            }

           return redirect("/crop_index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crop  $crop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crops=Crop::findOrFail($id);

        if (File::exists("cover/".$crops->cover)) {
            File::delete("cover/".$crops->cover);
        }
        $crop_images=CropImage::where("crop_id",$crops->id)->get();
        foreach($crop_images as $crop_image){
        if (File::exists("crop_images/".$crop_image->crop_image)) {
           File::delete("crop_images/".$crop_image->crop_image);
       }
        }
        $crops->delete();
        return back();


   }

   public function deletecrop_image($id){
    $crop_images=CropImage::findOrFail($id);
    if (File::exists("crop_images/".$crop_images->crop_image)) {
       File::delete("crop_images/".$crop_images->crop_image);
   }

   CropImage::find($id)->delete();
   return back();
}

  public function deletecover($id){
   $cover=Crop::findOrFail($id)->cover;
   if (File::exists("cover/".$cover)) {
      File::delete("cover/".$cover);
  }
  return back();
}

}
