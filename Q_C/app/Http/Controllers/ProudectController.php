<?php

namespace App\Http\Controllers;

use App\Models\proudect;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;
use Symfony\Component\VarDumper\Caster\LinkStub;

use function PHPUnit\Framework\isNull;

class ProudectController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $proudect = proudect::withTrashed()->latest()->paginate('4');
        return view('prodect.index', compact('proudect'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prodect.create');
    }

    public function store(Request $request)
    {
        $t = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'info' => 'required'
        ]);

        proudect::create([
            'name' => $request->name,
            'price' => $request->price,
            'info' => $request->info,
            'is_buy' => 0
        ]);
        return redirect()->route('proudect.index')->with('status', "the created is successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\proudect  $proudect
     * @return \Illuminate\Http\Response
     */
    public function show(proudect $proudect)
    {
        return view('prodect.show', compact('proudect'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\proudect  $proudect
     * @return \Illuminate\Http\Response
     */
    public function edit(proudect $proudect)
    {
        return view('prodect.edit', compact('proudect'));
    }

    public function update(Request $request, proudect $proudect)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'info' => 'required'
        ]);

        if ($request->name)
            $proudect->name = $request->name;

        if ($request->price)
            $proudect->price = $request->price;

        if ($request->info)
            $proudect->info = $request->info;


        $proudect->save();

        return redirect()->route('proudect.index')->with('status', "the created is successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\proudect  $proudect
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        proudect::onlyTrashed()->where('id', '=', $id)->forceDelete();
        return redirect()->route('proudect.index')->with('status', "the deleted is successfully");
    }
}
