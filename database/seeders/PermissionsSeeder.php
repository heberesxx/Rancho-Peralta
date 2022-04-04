<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Permission::create(['name'  =>  'VER_ESTADOS GANADO']);
       // Permission::create(['name'  =>  'VER_LUGARES']);
       // Permission::create(['name'  =>  'VER_RAZAS']);
       // Permission::create(['name'  =>  'VER_ROLES']);
       // Permission::create(['name'  =>  'VER_USUARIOS']);
       // Permission::create(['name'  =>  'VER_PREGUNTAS']);
       // Permission::create(['name'  =>  'VER_OBJETOS']);
       // Permission::create(['name'  =>  'VER_PARAMETROS']);
       // Permission::create(['name'  =>  'VER_BITACORA']);
       // Permission::create(['name'  =>  'VER_BACKUP']);
       // Permission::create(['name'  =>  'VER_CLIENTES']);
       // Permission::create(['name'  =>  'VER_PROVEEDORES']);
       // Permission::create(['name'  =>  'VER_LOTES GANADO']);
       // Permission::create(['name'  =>  'VER_LOTES ESPERMA']);
       // Permission::create(['name'  =>  'VER_LOTES EMBRIONES']);
       // Permission::create(['name'  =>  'VER_VENTAS']);
       // Permission::create(['name'  =>  'VER_TRANSFERENCIAS EMBRION']);
       // Permission::create(['name'  =>  'VER_TRANSFERENCIAS ESPERMA']);
       // Permission::create(['name'  =>  'VER_MONTAS']);
       // Permission::create(['name'  =>  'VER_PRENADAS EMBRION']);
       // Permission::create(['name'  =>  'VER_PRENADAS ESPERMA']);
       // Permission::create(['name'  =>  'VER_PRENADAS MONTA']);
       // Permission::create(['name'  =>  'VER_NACIMIENTOS EMBRION']);
       // Permission::create(['name'  =>  'VER_NACIMIENTOS ESPERMA']);
       // Permission::create(['name'  =>  'VER_NACIMIENTOS MONTA']);
       // Permission::create(['name'  =>  'VER_PRODUCCION LECHE']);
       // Permission::create(['name'  =>  'VER_INVENTARIO MEDICAMENTOS']);
       // Permission::create(['name'  =>  'VER_ORDEN TRABAJO']);
       // Permission::create(['name'  =>  'VER_REPORTES']);
       Permission::create(['name'  =>  'VER_GANADO']);

       // Permission::create(['name'  =>  'INSERTAR_ESTADOS GANADO']);
       // Permission::create(['name'  =>  'INSERTAR_LUGARES']);
       // Permission::create(['name'  =>  'INSERTAR_RAZAS']);
       // Permission::create(['name'  =>  'INSERTAR_ROLES']);
       // Permission::create(['name'  =>  'INSERTAR_USUARIOS']);
       // Permission::create(['name'  =>  'INSERTAR_PREGUNTAS']);
       // Permission::create(['name'  =>  'INSERTAR_OBJETOS']);
       // Permission::create(['name'  =>  'INSERTAR_PARAMETROS']);
       // Permission::create(['name'  =>  'INSERTAR_BITACORA']);
       // Permission::create(['name'  =>  'INSERTAR_BACKUP']);
       // Permission::create(['name'  =>  'INSERTAR_CLIENTES']);
       // Permission::create(['name'  =>  'INSERTAR_PROVEEDORES']);
       // Permission::create(['name'  =>  'INSERTAR_LOTES GANADO']);
       // Permission::create(['name'  =>  'INSERTAR_LOTES ESPERMA']);
       // Permission::create(['name'  =>  'INSERTAR_LOTES EMBRIONES']);
       // Permission::create(['name'  =>  'INSERTAR_VENTAS']);
       // Permission::create(['name'  =>  'INSERTAR_TRANSFERENCIAS EMBRION']);
       // Permission::create(['name'  =>  'INSERTAR_TRANSFERENCIAS ESPERMA']);
       // Permission::create(['name'  =>  'INSERTAR_MONTAS']);
       // Permission::create(['name'  =>  'INSERTAR_NACIMIENTOS EMBRION']);
       // Permission::create(['name'  =>  'INSERTAR_NACIMIENTOS ESPERMA']);
       // Permission::create(['name'  =>  'INSERTAR_NACIMIENTOS MONTA']);
       // Permission::create(['name'  =>  'INSERTAR_PRODUCCION LECHE']);
       // Permission::create(['name'  =>  'INSERTAR_INVENTARIO MEDICAMENTOS']);
       // Permission::create(['name'  =>  'INSERTAR_ORDEN TRABAJO']);
       // Permission::create(['name'  =>  'INSERTAR_REPORTES']);
       Permission::create(['name'  =>  'INSERTAR_GANADO']);
        
       // Permission::create(['name'  =>  'EDITAR_ESTADOS GANADO']);
       // Permission::create(['name'  =>  'EDITAR_LUGARES']);
       // Permission::create(['name'  =>  'EDITAR_RAZAS']);
       // Permission::create(['name'  =>  'EDITAR_ROLES']);
       // Permission::create(['name'  =>  'EDITAR_USUARIOS']);
       // Permission::create(['name'  =>  'EDITAR_PREGUNTAS']);
       // Permission::create(['name'  =>  'EDITAR_OBJETOS']);
       // Permission::create(['name'  =>  'EDITAR_PARAMETROS']);
       // Permission::create(['name'  =>  'EDITAR_BITACORA']);
       // Permission::create(['name'  =>  'EDITAR_BACKUP']);
       // Permission::create(['name'  =>  'EDITAR_CLIENTES']);
       // Permission::create(['name'  =>  'EDITAR_PROVEEDORES']);
       // Permission::create(['name'  =>  'EDITAR_LOTES GANADO']);
       // Permission::create(['name'  =>  'EDITAR_LOTES ESPERMA']);
       // Permission::create(['name'  =>  'EDITAR_LOTES EMBRIONES']);
       // Permission::create(['name'  =>  'EDITAR_VENTAS']);
       // Permission::create(['name'  =>  'EDITAR_TRANSFERENCIAS EMBRION']);
       // Permission::create(['name'  =>  'EDITAR_TRANSFERENCIAS ESPERMA']);
       // Permission::create(['name'  =>  'EDITAR_MONTAS']);
       // Permission::create(['name'  =>  'EDITAR_PRENADAS EMBRION']);
       // Permission::create(['name'  =>  'EDITAR_PRENADAS ESPERMA']);
       // Permission::create(['name'  =>  'EDITAR_PRENADAS MONTA']);
       // Permission::create(['name'  =>  'EDITAR_NACIMIENTOS EMBRION']);
       // Permission::create(['name'  =>  'EDITAR_NACIMIENTOS ESPERMA']);
       // Permission::create(['name'  =>  'EDITAR_NACIMIENTOS MONTA']);
       // Permission::create(['name'  =>  'EDITAR_PRODUCCION LECHE']);
       // Permission::create(['name'  =>  'EDITAR_INVENTARIO MEDICAMENTOS']);
       // Permission::create(['name'  =>  'EDITAR_ORDEN TRABAJO']);
       // Permission::create(['name'  =>  'EDITAR_REPORTES']);
       Permission::create(['name'  =>  'EDITAR_GANADO']);

       // Permission::create(['name'  =>  'ELIMINAR_ESTADOS GANADO']);
       // Permission::create(['name'  =>  'ELIMINAR_LUGARES']);
       // Permission::create(['name'  =>  'ELIMINAR_RAZAS']);
       // Permission::create(['name'  =>  'ELIMINAR_ROLES']);
       // Permission::create(['name'  =>  'ELIMINAR_USUARIOS']);
       // Permission::create(['name'  =>  'ELIMINAR_PREGUNTAS']);
       // Permission::create(['name'  =>  'ELIMINAR_OBJETOS']);
       // Permission::create(['name'  =>  'ELIMINAR_PARAMETROS']);
       // Permission::create(['name'  =>  'ELIMINAR_BITACORA']);
       // Permission::create(['name'  =>  'ELIMINAR_BACKUP']);
       // Permission::create(['name'  =>  'ELIMINAR_CLIENTES']);
       // Permission::create(['name'  =>  'ELIMINAR_PROVEEDORES']);
       // Permission::create(['name'  =>  'ELIMINAR_LOTES GANADO']);
       // Permission::create(['name'  =>  'ELIMINAR_LOTES ESPERMA']);
       // Permission::create(['name'  =>  'ELIMINAR_LOTES EMBRIONES']);
       // Permission::create(['name'  =>  'ELIMINAR_VENTAS']);
       // Permission::create(['name'  =>  'ELIMINAR_TRANSFERENCIAS EMBRION']);
       // Permission::create(['name'  =>  'ELIMINAR_TRANSFERENCIAS ESPERMA']);
       // Permission::create(['name'  =>  'ELIMINAR_MONTAS']);
       // Permission::create(['name'  =>  'ELIMINAR_PRENADAS EMBRION']);
       // Permission::create(['name'  =>  'ELIMINAR_PRENADAS ESPERMA']);
       // Permission::create(['name'  =>  'ELIMINAR_PRENADAS MONTA']);
       // Permission::create(['name'  =>  'ELIMINAR_NACIMIENTOS EMBRION']);
       // Permission::create(['name'  =>  'ELIMINAR_NACIMIENTOS ESPERMA']);
       // Permission::create(['name'  =>  'ELIMINAR_NACIMIENTOS MONTA']);
       // Permission::create(['name'  =>  'ELIMINAR_PRODUCCION LECHE']);
       // Permission::create(['name'  =>  'ELIMINAR_INVENTARIO MEDICAMENTOS']);
       // Permission::create(['name'  =>  'ELIMINAR_ORDEN TRABAJO']);
       // Permission::create(['name'  =>  'ELIMINAR_REPORTES']);
       Permission::create(['name'  =>  'ELIMINAR_GANADO']);
        
        
    }
}
