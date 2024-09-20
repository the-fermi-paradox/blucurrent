<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Requests\UpdateEmpireRequest;
use App\Models\Empire;
use App\Models\Release;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class EmpireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $empires = Empire::with('release')?->paginate(8);
        if (sizeof($empires) <= 0) {
            return view('errors::404');
        }
        return view('welcome', ['empires' => $empires]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        $empire = Empire::with('release')->findOrFail($id);
        $releases = Release::all();
        return view('empire.update', ['empire'=>$empire, 'releases'=>$releases]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmpireRequest $request, string $id) : Application|Redirector|RedirectResponse
    {
        $empire = Empire::findOrFail($id);
        $empire->update($request->validated());
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
