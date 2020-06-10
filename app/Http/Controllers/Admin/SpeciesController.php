<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SpeciesRequest;
use App\Models\Species;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SpeciesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:species-list', ['only' => ['index']]);
        $this->middleware('permission:species-create', ['only' => ['index', 'store']]);
        $this->middleware('permission:species-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:species-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        try {
            $key = $request->input('key');
            $species = Species::search($key);
            $totalSpecies = $species->count();
            $data = [
                'species' => $species,
                'totalSpecies' => $totalSpecies,
                'key' => $key,
            ];

            return view('admin.species.index', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(SpeciesRequest $request)
    {
        Species::create([
            'name' => $request->input('name'),
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success', __('messages.create-successfully'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $species = Species::findOrFail($id);
        $species->update([
            'deleted_by' => Auth::user()->id,
        ]);
        $species->delete();
        return redirect()->back()->with('success', __('messages.delete-successfully'));
    }
}
