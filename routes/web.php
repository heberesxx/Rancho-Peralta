<?php

use App\Http\Controllers\ChartsController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\GanadoGeneralController;
use App\Http\Controllers\VacasChartController;
use App\Http\Controllers\CompraMedicamentoController;
use App\Http\Controllers\ObjetosController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\RazasController;
use App\Http\Controllers\LugaresController;
use App\Http\Controllers\CompraGController;
use App\Http\Controllers\ParametrosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\LoteCompraController;
use GuzzleHttp\Middleware;
use App\Http\Controllers\TranferenciaEmbrionesController;
use App\Http\Controllers\TransEspermaController;
use App\Http\Controllers\TransMontaController;
use App\Http\Controllers\VacasPrenadasController;
use App\Http\Controllers\PrenadasEspermaController;
use App\Http\Controllers\PrenadaMontaController;
use App\Http\Controllers\NacimientosController;
use App\Http\Controllers\NacimientosEspermaController;
use App\Http\Controllers\NacimientosMontaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerBitacoraController;
use  Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\LoteMedicamentoController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\BitaController;
use App\Http\Controllers\ReporteCompraController;

/*
|--------------------------------------------------------------------------
| Web Routes
 |--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('',function () {
    return view('auth.login');
})->name('inicio');

Route::get('/pag403',function () {
    return view('pag403');
});

// Route::get('/',  'App\Http\Controllers\LoginController@login');

Route::middleware(['auth:sanctum'])->get('/dashboard', 'App\Http\Controllers\LoginController@login')->name('dashboard');
//Route::get('/dashboard', 'App\Http\Controllers\LoginController@graficos')->name('dashboard');

// Route::middleware(['auth:sanctum'])->get('/dashboard',function () {
//     return view('dashboard');
// })->name('dashboard');


Route::group(attributes:['middleware'=>'auth'], routes:function(){
   
    Route::get('clientes/pdf', [App\Http\Controllers\ClientesController::class,'pdf'])->name('clientes.pdf');
    Route::get('bita/pdf', [App\Http\Controllers\BitaController::class,'pdf'])->name('bita.pdf');
    Route::get('exportar/bitacora/', [BitaController::class, 'export'])->name('exportar.bitacora');
    Route::get('proveedores/pdf', [App\Http\Controllers\ProveedoresController::class,'pdf'])->name('proveedores.pdf');
    Route::get('ganado/pdf', [App\Http\Controllers\GanadoGeneralController::class,'pdf'])->name('ganado.pdf');
    Route::get('compra_medicamento/pdf', [App\Http\Controllers\CompraMedicamentoController::class,'pdf'])->name('compra_medicamento.pdf');
    Route::get('estados/pdf', [App\Http\Controllers\EstadosController::class,'pdf'])->name('estados.pdf');
    Route::get('lugares/pdf', [App\Http\Controllers\LugaresController::class,'pdf'])->name('lugares.pdf');
    Route::get('razas/pdf', [App\Http\Controllers\RazasController::class,'pdf'])->name('razas.pdf');
    Route::get('roles/pdf', [App\Http\Controllers\RolesController::class,'pdf'])->name('seguridad.roles.pdf');
    Route::get('usuarios/pdf', [App\Http\Controllers\UsuariosController::class,'pdf'])->name('seguridad.usuarios.pdf');
    Route::get('objetos/pdf', [App\Http\Controllers\ObjetosController::class,'pdf'])->name('seguridad.objetos.pdf');
    Route::get('preguntas/pdf', [App\Http\Controllers\PreguntasController::class,'pdf'])->name('seguridad.preguntas.pdf');
    Route::get('parametros/pdf', [App\Http\Controllers\ParametrosController::class,'pdf'])->name('seguridad.parametros.pdf');
    Route::get('bitacoras/pdf', [App\Http\Controllers\VerBitacoraController::class,'pdf'])->name('seguridad.bitacora.pdf');
    Route::get('ventas/pdf', [App\Http\Controllers\VentasController::class,'pdf'])->name('ventas.pdf');
    Route::get('orden_trabajo/pdf', [App\Http\Controllers\OrdenTrabajoController::class,'pdf'])->name('orden_trabajo.pdf');
    Route::get('produccion_leche/pdf', [App\Http\Controllers\ProduccionLeche_controller::class,'pdf'])->name('produccion_leche.pdf');
    Route::get('embrion/pdf', [App\Http\Controllers\EmbrionController::class,'pdf'])->name('embrion.pdf');
    Route::get('esperma/pdf', [App\Http\Controllers\espermaController::class,'pdf'])->name('esperma.pdf');
    Route::get('medicamento/pdf', [App\Http\Controllers\MedicamentoController::class,'pdf'])->name('medicamento.pdf');
    Route::get('backup/', [App\Http\Controllers\BackupDatabaseController::class,'index'])->name('backup');
    Route::get('restore/', [App\Http\Controllers\RestoreController::class,'index'])->name('restore');
    Route::get('backup/create', [App\Http\Controllers\BackupDatabaseController::class,'backup'])->name('backup.create');
    Route::get('restore/{id}', [App\Http\Controllers\RestoreController::class,'restore'])->name('restore.create');
    Route::get('exportar/ganado/', [GanadoGeneralController::class, 'export'])->name('exportar.ganado');
    Route::get('exportar/clientes/', [ClientesController::class, 'export'])->name('exportar.clientes');
    Route::get('reportes_comprag/', [ReporteCompraController::class, 'store'])->name('reportes_comprasg');
   // Route::get('reportes_comprag/store', [ReporteCompraController::class, 'store'])->name('reportes_comprasg.store');

    Route::get('lotesventa/pdf', [App\Http\Controllers\InsertarventaController::class,'pdf'])->name('lotesventa.pdf');
    Route::get('lotescompras/pdf', [App\Http\Controllers\LoteCompraController::class,'pdf'])->name('lotescompras.pdf');
    Route::get('lotescompras_esperma/pdf', [App\Http\Controllers\LoteCompraEspermaController::class,'pdf'])->name('lotescompras_esperma.pdf');
    Route::get('lotescompras_embrion/pdf', [App\Http\Controllers\LoteCompraEmbrionController::class,'pdf'])->name('lotescompras_embrion.pdf');
    Route::get('transembriones/pdf', [App\Http\Controllers\TranferenciaEmbrionesController::class,'pdf'])->name('transembriones.pdf');
    Route::get('transesperma/pdf', [App\Http\Controllers\TransEspermaController::class,'pdf'])->name('transesperma.pdf');
    Route::get('transmonta/pdf', [App\Http\Controllers\TransMontaController::class,'pdf'])->name('transmonta.pdf');
    Route::get('vaca_prenada/pdf', [App\Http\Controllers\VacasPrenadasController::class,'pdf'])->name('vaca_prenada.pdf');
    Route::get('prenadas_esperma/pdf', [App\Http\Controllers\PrenadasEspermaController::class,'pdf'])->name('prenadas_esperma.pdf');
    Route::get('prenadasmonta/pdf', [App\Http\Controllers\PrenadaMontaController::class,'pdf'])->name('prenadasmonta.pdf');
    Route::get('nacimientos/pdf', [App\Http\Controllers\NacimientosController::class,'pdf'])->name('nacimientos.pdf');
    Route::get('nacimientos_esperma/pdf', [App\Http\Controllers\NacimientosEspermaController::class,'pdf'])->name('nacimientos_esperma.pdf');
    Route::get('nacimientos_monta/pdf', [App\Http\Controllers\NacimientosMontaController::class,'pdf'])->name('nacimientos_monta.pdf');
    Route::get('compras/pdf', [App\Http\Controllers\CompraGController::class,'pdf'])->name('compras.pdf');
    Route::resource('/medicamento', 'App\Http\Controllers\MedicamentoController');
    Route::resource('/clientes','App\Http\Controllers\ClientesController');
    Route::resource('/proveedores','App\Http\Controllers\ProveedoresController');
    Route::resource('/confirmarlote','App\Http\Controllers\ConfirmarLoteCompraController');
    Route::resource('/confirmarlote_embrion','App\Http\Controllers\ConfirmarLoteEmbrionController');
    Route::resource('/confirmarlote_esperma','App\Http\Controllers\ConfirmarLoteEspermaController');
    Route::resource('/confirmarlote_venta','App\Http\Controllers\ConfirmarLoteVenta');
    Route::resource('/confirmarlote_medicamento','App\Http\Controllers\ConfirmarLoteMedicamentoController');
    Route::resource('/nacimientos','App\Http\Controllers\NacimientosController');
    Route::resource('/nacimientos_esperma','App\Http\Controllers\NacimientosEspermaController');
    Route::resource('/nacimientos_monta','App\Http\Controllers\NacimientosMontaController');
    Route::resource('/lote_medicamento', 'App\Http\Controllers\CompraMedicamentoController');
    Route::resource('/agregarlote_medicamento', 'App\Http\Controllers\LoteMedicamentoController');
    Route::resource('/ganado_muerto', 'App\Http\Controllers\GanadoMuertoController');
    Route::resource('/reportes','App\Http\Controllers\ReportesController');
    Route::resource('/compras','App\Http\Controllers\CompraGController');
    Route::resource('/esperma','App\Http\Controllers\espermaController');
    Route::resource('/embrion','App\Http\Controllers\EmbrionController');
    Route::resource('/produccion_leche','App\Http\Controllers\ProduccionLeche_controller');
    Route::resource('/ganado','App\Http\Controllers\GanadoGeneralController');
    Route::resource('/ventas','App\Http\Controllers\VentasController');
    Route::resource('/lotesventa','App\Http\Controllers\Insertarventacontroller');
    Route::resource('/verlotes_medicamentos','App\Http\Controllers\VerLotesMedicamentosController');
    Route::resource('/perfil','App\Http\Controllers\PerfilController');
    

    Route::resource('/transembriones','App\Http\Controllers\TranferenciaEmbrionesController');
    Route::resource('/transesperma','App\Http\Controllers\TransEspermaController');
    Route::resource('/vacas-sincronizadas','App\Http\Controllers\TranferenciaEmbrionesController');
    Route::resource('/orden_trabajo','App\Http\Controllers\OrdenTrabajoController');
    Route::resource('/vaca_prenada','App\Http\Controllers\VacasPrenadasController');
    Route::resource('/prenadas_esperma','App\Http\Controllers\PrenadasEspermaController');
    Route::resource('/transmonta','App\Http\Controllers\TransMontaController');
    Route::resource('/prenadasmonta','App\Http\Controllers\PrenadaMontaController');
    Route::resource('/transaccionales','App\Http\Controllers\TransaccionalesGanadoController');
    Route::resource('/estados','App\Http\Controllers\EstadosController');
    Route::resource('/lugares','App\Http\Controllers\LugaresController');
    Route::resource('/razas','App\Http\Controllers\RazasController');
    Route::resource('/lotescompras','App\Http\Controllers\LoteCompraController');
    Route::resource('/lotescompras_embrion','App\Http\Controllers\LoteCompraEmbrionController');
    Route::resource('/lotescompras_esperma','App\Http\Controllers\LoteCompraEspermaController');
    Route::resource('/reportesventas','App\Http\Controllers\VentasReportesController');
    Route::resource('/exportarventa','App\Http\Controllers\ExportarReporteVentaController');
    Route::resource('/verpreguntas','App\Http\Controllers\VerPreguntasController');
    Route::resource('/anularlote','App\Http\Controllers\AnularLoteVentaController');


    Route::resource('usuarios', UsuariosController::class)->names('usuarios');
    Route::resource('roles',RolesController::class)->names('roles');
    Route::resource('parametros', ParametrosController::class)->names('parametros');
    Route::resource('objetos',ObjetosController::class)->names('objetos');
    Route::resource('preguntas','App\Http\Controllers\PreguntasController');
    Route::get('/bitacora','App\Http\Controllers\CrearBitacoraController@index');
   // Route::get('/dashboard', [ChartsController::class,'index']);
    //Route::get('dashboard', [VacasChartController::class,'index'], [ChartsController::class,'index']);
    Route::get('/bitacora/tabla/{tabla}/accion/{accion}/descripcion{descripcion}/ruta/{ruta}/msj/{msj}','App\Http\Controllers\BitacoraController@index');
    Route::resource('permissions',App\Http\Controllers\PermissionController::class);
    route::post('update_password', 'App\Http\Controllers\LoginController@update_password');
    Route::get('configurar-pregunta', 'App\Http\Controllers\LoginController@configurar_pregunta')->name('configurar-pregunta');

   

   


    

    
    

});

Route::get('/olvido_pass', function () {
    return view('auth.email-questions');
})->name('olvido_pass');

Route::get('metodo', 'App\Http\Controllers\LoginController@metodo');

Route::get('verificar_pregunta', 'App\Http\Controllers\LoginController@verificar_pregunta')
    ->name('verificar_pregunta');

Route::get('update-password', 'App\Http\Controllers\LoginController@restablecer_password')
    ->name('update-password');

