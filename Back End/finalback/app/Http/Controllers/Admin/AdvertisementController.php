<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertisements = Advertisement::latest('id')->paginate(10);

        return view('admin.advertisements.index', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $advertisement = new Advertisement();
        return view('admin.advertisements.create', compact('advertisement'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'link' => 'required'
        ]);

        $path = $request->file('image')->store('images', 'files');

        Advertisement::create([
            'path' => $path,
            'link' => $request->link
        ]);

        return redirect()
        ->route('admin.advertisements.index')
        ->with('msg', 'Advertisement created successfully')
        ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advertisement $advertisement)
    {
        return view('admin.advertisements.edit', compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        $request->validate([
            'image' => 'nullable',
            'link' => 'required'
        ]);

        if($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'files');
        }

        $advertisement->update([
            'path' => $path??$advertisement->path,
            'link' => $request->link
        ]);

        return redirect()
        ->route('admin.advertisements.index')
        ->with('msg', 'Advertisement updated successfully')
        ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advertisement $advertisement)
    {
        File::delete(public_path($advertisement->path));
        $advertisement->delete();

        return redirect()
        ->route('admin.advertisements.index')
        ->with('msg', 'Advertisement deleted successfully')
        ->with('type', 'danger');
    }
}
