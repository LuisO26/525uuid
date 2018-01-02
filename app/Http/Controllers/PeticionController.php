<?php

namespace App\Http\Controllers;

use App\peticion;

use DB;
use Illuminate\Http\Request;

class PeticionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "hola";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $resultado = '';
        $idUnico = $this->getRandomId();
        $idUnico2 = $this->getRandomId();
            $resultado=DB::select("select * from generadorid where idUnico='$idUnico'"); 
              
            while(count($resultado) !=0) 
            { 
                echo "si entro";
            $idUnico = $this->getRandomId();
            $resultado=DB::select("select * from generadorid where idUnico='$idUnico'"); 
            }


        $data=DB::table('generadorid')->insert(
                            [
                                'id_deal'=> $idUnico ,
                            'id_person' => $idUnico2

                        ]
                        ); 
                        if ($data) {
                             $resp = array('idUnico' =>$idUnico, 'idNoTanUnico' =>$idUnico2, "mensaje"=> "dato guardado" );    
                    return json_encode($resp);
                          }  else{
                            $resp = array('idUnico' =>$idUnico, 'idNoTanUnico' =>$idUnico2, "mensaje"=> "Problema al guradar, no deberia pasar..." );    
                    return json_encode($resp);
                          }
                        
    }
    private function getRandomId(){
        $an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ-";
        $su = strlen($an) - 1;
        return substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1);
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
     * @param  \App\peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    public function show(peticion $peticion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    public function edit(peticion $peticion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, peticion $peticion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    public function destroy(peticion $peticion)
    {
        //
    }
}
