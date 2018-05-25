<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Partner;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.partners.index')->with('partners', Partner::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'site' => 'required|url',
            'email' => 'required|email',
        ]);

        $partner = New Partner;
            $partner->name = $request->name;
            $partner->site = $request->site;
            $partner->email = $request->email;
            if ($request->logo){
                $partner->logo = $request->logo->store('public/partners');
            }
        $partner->save();

        flash('The partner has been successfully created')->success();
        return redirect()->route('admin.partners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'site' => 'required|url',
            'email' => 'required|email',
        ]);

        $partner->name = $request->name;
        $partner->site = $request->site;
        $partner->email = $request->email;
        if ($request->logo){
            $partner->logo = $this->upload($partner->logo, $request->logo, 'public/partners');
        }
        $partner->save();

        flash('The partner has been successfully updated')->success();
        return redirect()->route('admin.partners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $partner->logo ? Storage::delete($partner->logo) : true;
        $partner->delete();

        flash('The partner has been successfully deleted')->success();
        return redirect()->route('admin.partners.index');
    }

    private function upload($avatar, $existingAvatar, $path)
    {
        if ($avatar != $existingAvatar) 
        {
            Storage::delete($avatar);
        }
        $filePath = $existingAvatar->store($path);
        return $filePath;
    }
}
