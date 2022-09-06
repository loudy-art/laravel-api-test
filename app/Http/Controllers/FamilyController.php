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
            $names = Family::select('name_id', 'name', 'clan')->where('name', 'LIKE', '%'.$name.'%')->with('crests', 'images')->paginate($items_per_page);
            return response()->json([
                'status' => true,
                'names' => $names
            ]
            );
        }
        else
        {   

            /*$results = Product::orderBy('id','desc')->with(['menus','categories' => function ($query){
    $query->where('slug', request()->sub_category);
}])->paginate(24);*/
           // $includes= explode(',',$include);
          //  $includes = explode(",", $include); 
            $history = "history";
            $crests = "crests";
            $products = "products";
            $historyandcrests = "history,crests";
            $crestsandproducts = "crests,products";
            $historyandproducts ="history,products";

         //   $includes= explode(',',$include);
           /* echo var_dump($include);
            die();
            foreach ($includes as $queryData) {*/

                switch(true)
                {
                    case strpos($history, $include) >= 0:
                        $names = Family::select('name_id', 'name', 'clan', 'info')->where('name', 'LIKE', '%'.$name.'%')->paginate($items_per_page);
                    
                    case strpos($crests, $include) >= 0:
                        $names = Family::select('name_id', 'name', 'clan')->where('name', 'LIKE', '%'.$name.'%')->with('crests')->paginate($items_per_page);

                    case strpos($history, $queryData) >= 0:
                        
                    case strpos($history, $queryData) >= 0:

                    case strpos($history, $queryData) >= 0:

                    case strpos($history, $queryData) >= 0:


                }

            /*    if (strpos($history, $queryData) !== FALSE) { 
                    $names = Family::select('name_id', 'name', 'clan', 'info')->where('name', 'LIKE', '%'.$name.'%')->paginate($items_per_page);
                }
                else if (strpos($crests, $queryData) !== FALSE) { 
                    $names = Family::select($includes)->where('name', 'LIKE', '%'.$name.'%')->with('crests', 'images')->paginate($items_per_page);
                    /*foreach //que recorra el query anterior y gatheree los name id
                    {
                        

                    }
                    
                    
                }
                else if (strpos($products, $queryData) !== FALSE) { 
                    echo "Match products found"; 
                }
            }*/


           return response()->json([
                'status' => true,
                'names' => $names
            ]
            );

           // echo var_dump($includes);
           //die();

           /* $names = Family::select($includes)->where('name', 'LIKE', '%'.$name.'%')->with('crests', 'images')->paginate($items_per_page);
          // $names =Family::select($includes->with(['crests' => function($q) use ($campaign_id){$q->where('campaign_id', $campaign_id);
            return response()->json([
                'status' => true,
                'names' => $names
            ]
            );*/

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
