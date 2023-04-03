<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\SpeacialtyUpdateRequest;

class SpecialtyController extends Controller
{

    public function __construct(){
        $this->middleware('can:specialties.index')->only('index');
        $this->middleware('can:specialties.create')->only('create');
        $this->middleware('can:specialties.store')->only('store');
        $this->middleware('can:specialties.show')->only('show');
        $this->middleware('can:specialties.update')->only('update');
        $this->middleware('can:specialties.edit')->only('edit');
        $this->middleware('can:specialties.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialties = Specialty::orderBy('name', 'asc')->get();
        return view('admin.specialties.index',compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $specialty = new Specialty();
       $btn = "create";
       $title="new Specialty";
       return view('admin.specialties.create',compact('specialty', 'btn','title'));
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
           'name' => 'required|unique:specialties,name',
       ]);
       $name = mb_strtolower($request->name);
       $slug = Str::slug($name);
       $specialty = Specialty::create([
           'name' => $name,
           'slug' => $slug,
           'description' => $request->description,
       ]);

       return redirect()->route('specialties.index')->with('success', 'Specialty created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function show(Specialty $specialty)
    {
       return view('admin.specialties.show',compact('specialty'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialty $specialty)
    {
        $btn = "update";
        $title="edit Specialty";
        return view('admin.specialties.edit', compact('specialty','btn','title'));//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function update(SpeacialtyUpdateRequest $request, Specialty $specialty)
    {
        $name = mb_strtolower($request->name);
        $slug = Str::slug($name);
        $specialty->update([
            'name' => $name,
            'slug' => $slug,
            'description' => $request->description,
        ]);
        $specialty->save();

        return redirect()->route('specialties.index')->with('success', 'Specialty updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialty $specialty)
    {
       if($specialty->id>71){
            $specialty->delete();
       return redirect()->route('specialties.index')->with('success', 'Specialty deleted');

       }else{
        return redirect()->route('specialties.index')->with('fail', 'Specialty is no deleted');

       }


    }
}
