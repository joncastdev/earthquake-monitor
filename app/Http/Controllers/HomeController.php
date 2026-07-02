<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Services\ModuleService;

class HomeController extends Controller
{

    protected $moduleService;


    public function __construct(ModuleService $moduleService){

      $this->moduleService = $moduleService;  

  }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {       

        // $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime=2026-06-28');

        // $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime=2026-06-24&endtime=2026-06-28&minmagnitude=7.5');

       // $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime=2026-06-24&endtime=2026-06-28&minmagnitude=7');


        $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime=2026-06-24&endtime=2026-06-28&minmagnitude=7.5');

        // return response()->json($data);


        // properties te deja la info es un array
        // print_r($data->features[0]->properties->place);

         // geometry te deja las coordenadas es un array
        // print_r($data->features[0]->geometry->type);

       // print_r($data->features[0]->properties);

       // gettype($data->features[0]->properties)

       // print_r(gettype($data->features[0]->properties));

        // exit;

        return view('home', [          
          'datas' => $data
         // 'datas' => $data->features[0]->properties
      // 'categorys2' => $category2     
      ]);

        // return view('home');
    }

    public function getdata()
    { 

        // $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime=2026-06-24&endtime=2026-06-28&minmagnitude=7.5');

        $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime=2026-06-24&endtime=2026-06-28&minmagnitude=7.5');

        // return response()->json($data);

        // return response()->json($data->features);

        // return response()->json($data->features[0]->properties);

         // return response()->json($data->features[0]->geometry);

          // return response()->json($data->features[0]->geometry->coordinates[0]);

          // print_r($data->features[0]->geometry->type);

         return response()->json([$data->features[0]->properties,$data->features[0]->geometry]);


        // properties te deja la info es un array
        // print_r($data->features[0]->properties->place);

         // geometry te deja las coordenadas es un array
        // print_r($data->features[0]->geometry->type);

       // print_r($data->features[0]->properties);

       // gettype($data->features[0]->properties)

       // print_r(gettype($data->features[0]->properties));

        // exit;


    }

   public function getdatapost(Request $request)
    {

    // $request->magnitude
    // $request->starttime 

    // return response()->json([$request->magnitude,$request->starttime]); 
      

        // $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime=2026-06-24&endtime=2026-06-28&minmagnitude=7.5');

         $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime='.$request->starttime.'&minmagnitude='.$request->magnitude);
       

         return response()->json([$data->features[0]->properties,$data->features[0]->geometry]);


    }

    public function catalogs()
    {       

        $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/catalogs');

        print_r($data);

        exit;
        return view('home');
    }

//consultas tienen query en parametros
    public function consultas()
    {       

        $data = $this->moduleService->responseGetByPlayerName('/fdsnws/event/1/query?format=geojson&starttime=2026-06-24&endtime=2026-06-28&minmagnitude=7.5');

        return response()->json($data);


        print_r($data);

        exit;
        return view('home');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
