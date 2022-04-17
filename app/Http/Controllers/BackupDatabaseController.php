<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackupDatabaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
      
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
            return view('backup.create');

    }

    public function backup()
    {
        $date = date("Y-m-d");
        $lugar = $_SERVER['SCRIPT_FILENAME'];
        $fecha = date('Ymd_hi');
        $filename = $fecha."_backup.sql";
        $path = dirname($lugar)."/".$filename;
        // Cabezeras para forzar al navegador a guardar el archivo
        header("Pragma: no-cache");
        header("Expires: 0");
        header("Content-Transfer-Encoding: binary");


        $bd="db_rancho_peralta";
        $usuario="root"; // Usuario de la base de datos, un ejemplo podria ser 'root'
        $passwd=""; // Contraseña asignada al usuario
        //$bd="all-tables"; // Nombre de la Base de Datos a exportar

        // Funciones para exportar la base de datos
        $executa = "C:\\xampp\\mysql\bin\mysqldump.exe --skip-lock-tables --user=$usuario --password=$passwd -R --opt $bd > C:\\xampp\\htdocs\\Proyecto_RanchoPeralta\\respaldos\\$filename";
        system($executa, $resultado);
       
        return redirect('/backup')->with('info', 'Backup Generado');
      
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
