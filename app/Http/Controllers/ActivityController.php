<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities=Activity::all();
        return view('Admin.activity_index')->with('activities',$activities);
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

            $activity =new Activity([
                'activity_code'=>$request->activity_code,
                'activity_name'=>$request->activity_name,
                'realization_date'=>$request->realization_date,
                'value'=>$request->value,
                'type_phase'=>$request->type_phase,
                "body" =>$request->body,
                "cover" =>$imageName,
            ]);
           $activity->save();
        }


            if($request->hasFile("activity_images")){
                $files=$request->file("activity_images");
                foreach($files as $file){
                    $imageName=time().'_'.$file->getClientOriginalName();
                    $request['activity_id']=$activity->id;
                    $request['activity_image']=$imageName;
                    $file->move(\public_path("/activity_images"),$imageName);
                    ActivityImage::create($request->all());

                }
            }

            return redirect("/activity_index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activities=Activity::findOrFail($id);
        return view('Admin.activity_ver')->with('activities',$activities);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activities=Activity::findOrFail($id);
        return view('Admin.activity_editar')->with('activities',$activities);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $activity=Activity::findOrFail($id);
        if($request->hasFile("cover")){
            if (File::exists("cover/".$activity->cover)) {
                File::delete("cover/".$activity->cover);
            }
            $file=$request->file("cover");
            $activity->cover=time()."_".$file->getClientOriginalName();
            $file->move(\public_path("/cover"),$activity->cover);
            $request['cover']=$activity->cover;
        }
   
           $activity->update([
            'activity_code'=>$request->activity_code,
            'activity_name'=>$request->activity_name,
            'realization_date'=>$request->realization_date,
            'value'=>$request->value,
            'type_phase'=>$request->type_phase,
            "body" =>$request->body,
            "cover"=>$activity->cover,

           ]);

           
            if($request->hasFile("activity_images")){
                $files=$request->file("activity_images");
                foreach($files as $file){
                    $imageName=time().'_'.$file->getClientOriginalName();
                    $request['activity_id']=$activity->id;
                    $request['activity_image']=$imageName;
                    $file->move(\public_path("/activity_images"),$imageName);
                    ActivityImage::create($request->all());

                }
            }

           return redirect("/activity_index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activities=Activity::findOrFail($id);

        if (File::exists("cover/".$activities->cover)) {
            File::delete("cover/".$activities->cover);
        }
        $activity_images=ActivityImage::where("activity_id",$activities->id)->get();
        foreach($activity_images as $activity_image){
        if (File::exists("activity_images/".$activity_image->activity_image)) {
           File::delete("activity_images/".$activity_image->activity_image);
       }
        }
        $activities->delete();
        return back();


   }

   public function deleteactivity_image($id){
    $activity_images=ActivityImage::findOrFail($id);
    if (File::exists("activity_images/".$activity_images->activity_image)) {
       File::delete("activity_images/".$activity_images->activity_image);
   }

   ActivityImage::find($id)->delete();
   return back();
}

  public function deletecover($id){
   $cover=Activity::findOrFail($id)->cover;
   if (File::exists("cover/".$cover)) {
      File::delete("cover/".$cover);
  }
  return back();
}

}
