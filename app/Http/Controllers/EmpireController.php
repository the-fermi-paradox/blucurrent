<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Requests\EmpireRequest;
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
        return view('empire.list', ['empires' => $empires]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $releases = Release::all();
        return view('empire.create', ['releases' => $releases]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpireRequest $request)
    {
        Empire::create($request->validated());
        return redirect('/');
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
    public function update(EmpireRequest $request, string $id) : Application|Redirector|RedirectResponse
    {
        $empire = Empire::findOrFail($id);
        $empire->update($request->validated());
        $val = (int) ((int) $id / 8) + 1;
        return redirect("/?page={$val}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empire = Empire::findOrFail($id);
        $empire->delete();
        return redirect("/?page=1");
    }
}
