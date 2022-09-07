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

    public function sameElements($a, $b)
    {
    sort($a);
    sort($b);
    return $a == $b;
    }

    function in_array_all($needles, $haystack) {
        return empty(array_diff($needles, $haystack));
     }

    public function showByName(Request $request)
    {   
        $name = $request->route('name');
        $include = strtolower($request->include);
        $arrayInclude = explode(",", $include);
        //$includes = array_map('strtolower', $arrayInclude);
        $items_per_page=$request->items_per_page;
        $history = ["history"];
        $crests = ["crests"];
        $products = ["products"];
        $historyandcrests = ["history", "crests"];
        $crestsandproducts = ["crests", "products"];
        $historyandproducts = ["history", "products"];
        $all = ["history", "crests", "products"];
        $lowercaseallowed = array_map('strtolower', $all);

        if(empty($include))
        {
            $names = Family::select('name_id', 'name', 'country', 'clan')->where('name', 'LIKE', '%'.$name.'%')->with('crests', 'images')->paginate($items_per_page);
            return response()->json([
                'status' => true,
                'names' => $names
            ]
            );
        }

        else if($this->in_array_all($arrayInclude, $lowercaseallowed ) == true && count($arrayInclude)<=3) 
        {   
                switch(true)
                {
                    case $this->sameElements($arrayInclude, $history)==1:
                        $names = Family::select('name_id', 'name', 'country', 'clan', 'info')->where('name', 'LIKE', '%'.$name.'%')->paginate($items_per_page);
                        return response()->json([
                            'status' => true,
                            'names' => $names
                        ]
                        );
                    break;

                    case $this->sameElements($arrayInclude, $crests)==1:
                    $names = Family::select('name_id', 'name', 'country', 'clan')->where('name', 'LIKE', '%'.$name.'%')
                    ->with('crests:crest_id,crest_url,caption,clan,name_id')->paginate($items_per_page);
                        return response()->json([
                            'status' => true,
                            'names' => $names
                        ]
                        );
                    break;

                    case $this->sameElements($arrayInclude, $products)==1:
                        $names = Family::select('name_id', 'name', 'country', 'clan')->where('name', 'LIKE', '%'.$name.'%')
                        ->with('images:img_id,image_url,image_info,type,name_id')->paginate($items_per_page);
                        return response()->json([
                            'status' => true,
                            'names' => $names
                        ]
                        );
                    break;

                    case $this->sameElements($arrayInclude, $historyandcrests)==1:
                        $names = Family::select('name_id', 'name', 'country', 'clan', 'info')->where('name', 'LIKE', '%'.$name.'%')
                        ->with('crests:crest_id,crest_url,caption,clan,name_id')->paginate($items_per_page);
                        return response()->json([
                            'status' => true,
                            'names' => $names
                        ]
                        );
                    break;

                    case $this->sameElements($arrayInclude, $crestsandproducts)==1:
                        $names = Family::select('name_id', 'name', 'country', 'clan', 'info')->where('name', 'LIKE', '%'.$name.'%')
                        ->with('crests:crest_id,crest_url,caption,clan,name_id', 'images:img_id,image_url,image_info,type,name_id' )->paginate($items_per_page);
                        return response()->json([
                            'status' => true,
                            'names' => $names
                        ]
                        );
                    break;
                    
                    case $this->sameElements($arrayInclude, $historyandproducts)==1:
                        $names = Family::select('name_id', 'name', 'country', 'clan', 'info')->where('name', 'LIKE', '%'.$name.'%')
                        ->with('images:img_id,image_url,image_info,type,name_id')->paginate($items_per_page);
                        return response()->json([
                            'status' => true,
                            'names' => $names
                        ]
                        );
                    break;

                    case $this->sameElements($arrayInclude, $all)==1:
                        $names = Family::select('name_id', 'name', 'country', 'clan', 'info')->where('name', 'LIKE', '%'.$name.'%')
                        ->with('crests:crest_id,crest_url,caption,clan,name_id', 'images:img_id,image_url,image_info,type,name_id' )->paginate($items_per_page);
                        return response()->json([
                            'status' => true,
                            'names' => $names
                        ]
                        );
                    break;       
                }
        }
        else 
        {
            echo "Pusiste cualquier cosa";
        }
    }


    public function showById(Request $request)
    {   
        $id = $request->route('id');
        $include = strtolower($request->include);
        $arrayInclude = explode(",", $include);
        $items_per_page=$request->items_per_page;
        $history = ["history"];
        $crests = ["crests"];
        $products = ["products"];
        $historyandcrests = ["history", "crests"];
        $crestsandproducts = ["crests", "products"];
        $historyandproducts = ["history", "products"];
        $all = ["history", "crests", "products"];
        $lowercaseallowed = array_map('strtolower', $all);

        if(empty($include))
        {
            $names = Family::select('name', 'clan', 'country')->where('name_id', $id)->with('crests', 'images')->paginate($items_per_page);
            return response()->json([
                'status' => true,
                'names' => $names
            ]
            );
        }

        else if($this->in_array_all($arrayInclude, $lowercaseallowed ) == true && count($arrayInclude)<=3) 
        {   
            switch(true)
            {
                case $this->sameElements($arrayInclude, $history)==1:
                    $names = Family::select('name_id', 'name', 'country', 'clan', 'info')->where('name_id', $id)->paginate($items_per_page);
                    return response()->json([
                        'status' => true,
                        'names' => $names
                    ]
                    );
                break;
            
                case $this->sameElements($arrayInclude, $crests)==1:
                $names = Family::select('name_id', 'name', 'country', 'clan')->where('name_id', $id)
                ->with('crests:crest_id,crest_url,caption,clan,name_id')->paginate($items_per_page);
                    return response()->json([
                        'status' => true,
                        'names' => $names
                    ]
                    );
                break;
            
                case $this->sameElements($arrayInclude, $products)==1:
                    $names = Family::select('name_id', 'name', 'country', 'clan')->where('name_id', $id)
                    ->with('images:img_id,image_url,image_info,type,name_id')->paginate($items_per_page);
                    return response()->json([
                        'status' => true,
                        'names' => $names
                    ]
                    );
                break;
            
                case $this->sameElements($arrayInclude, $historyandcrests)==1:
                    $names = Family::select('name_id', 'name', 'country', 'clan', 'info')->where('name_id', $id)
                    ->with('crests:crest_id,crest_url,caption,clan,name_id')->paginate($items_per_page);
                    return response()->json([
                        'status' => true,
                        'names' => $names
                    ]
                    );
                break;
            
                case $this->sameElements($arrayInclude, $crestsandproducts)==1:
                    $names = Family::select('name_id', 'name', 'country', 'clan', 'info')->where('name_id', $id)
                    ->with('crests:crest_id,crest_url,caption,clan,name_id', 'images:img_id,image_url,image_info,type,name_id' )->paginate($items_per_page);
                    return response()->json([
                        'status' => true,
                        'names' => $names
                    ]
                    );
                break;
                
                case $this->sameElements($arrayInclude, $historyandproducts)==1:
                    $names = Family::select('name_id', 'name', 'country', 'clan', 'info')->where('name_id', $id)
                    ->with('images:img_id,image_url,image_info,type,name_id')->paginate($items_per_page);
                    return response()->json([
                        'status' => true,
                        'names' => $names
                    ]
                    );
                break;
            
                case $this->sameElements($arrayInclude, $all)==1:
                    $names = Family::select('name_id', 'name', 'country', 'clan', 'info')->where('name_id', $id)
                    ->with('crests:crest_id,crest_url,caption,clan,name_id', 'images:img_id,image_url,image_info,type,name_id' )->paginate($items_per_page);
                    return response()->json([
                        'status' => true,
                        'names' => $names
                    ]
                    );
                break;       
            }
            }
            else 
            {
            echo "Pusiste cualquier cosa";
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
