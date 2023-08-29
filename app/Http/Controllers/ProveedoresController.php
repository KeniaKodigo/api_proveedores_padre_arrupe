<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proveedores;
use Dotenv\Validator;

class ProveedoresController extends Controller
{
    public function index(){
        //select * from proveedores => all()
        $proveedores = Proveedores::all();

        $json = array(
            "status" => 200, //exito la peticion
            "detalle" => $proveedores
        );

        //convirtiendo el arreglo en JSON
        //json_encode = metodo que convierte un elemento en json
        //json_decode = metodo que convierte un json en un arreglo
        return json_encode($json, true);
    }

    //metodo para registrar un proveedor
    public function store(Request $request){
        //convertimos los datos a un arreglo para enviarlo a la bd
        $datos = array(
            "nombre" => $request->input("nombre"),
            "apellido" => $request->input("apellido"),
            "direccion" => $request->input("direccion"),
            "telefono" => $request->input("telefono")
        );

        //validando si el arreglo no esta vacio
        if(!empty($datos)){
            //registrando al proveedor

            //insert into table(campos)..
            $proveedores = new Proveedores();
            $proveedores->nombre =  $datos["nombre"];
            $proveedores->apellido = $datos["apellido"];
            $proveedores->direccion = $datos["direccion"];
            $proveedores->telefono = $datos["telefono"];
            $proveedores->save();

            $json = array(
                "status" => 200,
                "detalles" => "Se ha registrado correctamente el proveedor"
            );

        }else{
            $json = array(
                "status" => 400,
                "detalles" => "Los campos no pueden estar vacios"
            );
        }

        return json_encode($json, true);
    }

    //metodo por proveedor by Id
    public function obtenerById($id){
        $proveedor = Proveedores::find($id);

        return response()->json($proveedor);
    }

    //metodo para actualizar un proveedor
    public function update(Request $request, $id){
        $datos = array(
            "nombre" => $request->input("nombre"),
            "apellido" => $request->input("apellido"),
            "direccion" => $request->input("direccion"),
            "telefono" => $request->input("telefono")
        );

        if(!empty($datos)){
            //select * from proveedores where id = ?
            $proveedores = Proveedores::find($id);
            $proveedores->nombre =  $datos["nombre"];
            $proveedores->apellido = $datos["apellido"];
            $proveedores->direccion = $datos["direccion"];
            $proveedores->telefono = $datos["telefono"];
            //update table set..
            $proveedores->update();

            $json = array(
                "status" => 200,
                "detalles" => "Se ha actualizado correctamente el proveedor"
            );
        }else{
            $json = array(
                "status" => 400,
                "detalles" => "Los campos no pueden estar vacios"
            );
        }

        return json_encode($json, true);
    }

    //metodo para eliminar un proveedor
    public function destroy($id){
        //delete from table where id = ?
        $proveedor = Proveedores::where("id", "=", $id)->delete();
        
        $json = array(
            "status" => 200,
            "detalles" => "Se ha eliminado el proveedor"
        );

        return json_encode($json, true);
    }
}
