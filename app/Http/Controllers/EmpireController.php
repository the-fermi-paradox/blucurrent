<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Requests\EmpireRequest;
use App\Models\Empire;
use App\Models\Release;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class EmpireController extends Controller
{
    public function welcome() : RedirectResponse
    {
        return redirect()->route('empire.list');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(?string $col = 'id', ?string $order = 'asc') : View
    {
        $empires = Empire::with('release')->orderBy($col, $order)->paginate(8);
        return view('empire.list', ['empires' => $empires, 'col' => $col, 'order' => $order]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $releases = Release::all();
        return view('empire.create', ['releases' => $releases]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpireRequest $request) : RedirectResponse
    {
        Empire::create($request->validated());
        return redirect()->route('empire.list');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : View
    {
        $empire = Empire::with('release')->findOrFail($id);
        $releases = Release::all();
        return view('empire.update', ['empire'=>$empire, 'releases'=>$releases]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmpireRequest $request, string $id) : RedirectResponse
    {
        $empire = Empire::findOrFail($id);
        $empire->update($request->validated());
        return redirect()->route('empire.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : RedirectResponse
    {
        Empire::destroy($id);
        return redirect()->route('empire.list');
    }
}
