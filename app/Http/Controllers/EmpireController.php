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
    /**
     * Display a listing of the resource.
     */
    public function index(?string $col = 'id') : View
    {
        $empires = Empire::with('release')->orderBy($col)->paginate(8);
        return view('empire.list', ['empires' => $empires]);
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
        return redirect('/');
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
        $val = (int) ((int) $id / 8) + 1;
        return redirect("/?page={$val}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : RedirectResponse
    {
        Empire::destroy($id);
        return redirect("/?page=1");
    }
}
