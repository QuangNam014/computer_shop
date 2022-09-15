<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Specification_type_accessory;
use App\Models\Specification_type_laptop;
use Illuminate\Http\Request;

class AdminSpecificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $specifications = '';
        switch ($request->type_id) {
            case '1':
                $specifications = Specification_type_laptop::where('product_id',$request->product_id)->first();
                break;
            case '2':
                $specifications = Specification_type_accessory::where('product_id',$request->product_id)->first();
                break;
            default:break;
        }
        return view('backend.components.typeSpec.index', compact('specifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.components.typeSpec.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->fullUrl());
        switch ($request->type_id) {
            case '1':
                Specification_type_laptop::create([
                    'name' => $request->name,
                    'product_id' => $request->product_id,
                ]);
                break;
            case '2':
                Specification_type_accessory::create([
                    'name' => $request->name,
                    'product_id' => $request->product_id,
                ]);
                break;
            
            default:
                break;
        }
        return redirect($request->fullUrl());;
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
        // dd($request->all());
        // $specifications = '';
        // switch ($request->type_id) {
        //     case '1':
        //         $specifications = Specification_type_laptop::where('product_id',$request->product_id)->first();
        //         break;
        //     case '2':
        //         $specifications = Specification_type_accessory::where('product_id',$request->product_id)->first();
        //         break;
        //     default:break;
        // }
        // return view('backend.components.type.index', compact('specifications'));
        // return view('backend.components.type.edit');
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
