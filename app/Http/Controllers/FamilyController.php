<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Family;


class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $family = Family::paginate(30);

        return response()->json([
            'status' => true,
            'posts' => $family
        ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showByName(Request $request)
    {   
        $name = $request->route('name');
        $include = $request->include;
        $items_per_page=$request->items_per_page;
        

        if(empty($include))
        {
            $names = Family::where('name', 'LIKE', '%'.$name.'%')->with('images')->paginate($items_per_page);
            return response()->json([
                'status' => true,
                'names' => $names
            ]
            );
        }
        else
        {   
            $includes= explode(',',$include);
            $names = Family::select($includes)->where('name', 'LIKE', '%'.$name.'%')->with('images')->paginate($page_max);
            return response()->json([
                'status' => true,
                'names' => $names
            ]
            );

        }
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
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
        //
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
