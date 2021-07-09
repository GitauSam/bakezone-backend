<?php

namespace App\Http\Controllers\pastry;

use App\Http\Controllers\Controller;
use App\Models\pastry\Pastry;
use App\Models\pastry\PastryImage;
use App\Traits\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PastryController extends Controller
{

    use UploadImages;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pastry.index', ["pastries" => Pastry::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pastry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{
            $pastry = new Pastry();

            $pastry->pastry_name = $request->name;
            $pastry->ingredients = $request->ingredients;
            $pastry->cost_1kg = $request->cost_1kg;
            $pastry->cost_2kg = $request->cost_2kg;
            $pastry->cost_3kg = $request->cost_3kg;
            $pastry->in_stock = 1;
            $pastry->status = 1;
            $pastry->created_by = "admin";

            $pastry->save();
            Log::debug("---------------------------------------------------------------------------------------------------");
            Log::debug("Saved pastry: '" . $pastry->pastry_name . "' successfully.");

            foreach($request->photos as $img) {
                $imageUrls = $this->uploadImages($img);

                $pastryImage = new PastryImage();
                $pastryImage->pastry_id = $pastry->id;
                $pastryImage->status = 1;
                $pastryImage->image_name = $img->getClientOriginalName();
                $pastryImage->image_url = $imageUrls["storage_path"];
                $pastryImage->saved_image_name = $imageUrls["saved_image_name"];
                $pastryImage->created_by = "admin";

                $pastryImage->save();

                Log::debug("---------------------------------------------------------------------------------------------------");
                Log::debug("Saved pastry image: '" . $img->getClientOriginalName() . "' successfully.");

            }

        } catch (\Exception $e) {
            Log::debug("Exception occurred while creating new pastry.");
            Log::debug($e->getMessage());
            Log::debug($e->getTraceAsString());
        }

        return redirect()->route('pastry.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
