<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//llamados para mostrar
Route::get('/', 'App\Http\Controllers\ControllerInicio@index');
Route::get('/consulta', 'App\Http\Controllers\ControllerAlumno@mostalumno');
Route::get('/grupo', 'App\Http\Controllers\ControllerGrupo@mostgrupo');
Route::get('/docente', 'App\Http\Controllers\ControllerDocente@mostdocente');
Route::get('/administrativo', 'App\Http\Controllers\ControllerAdministrador@mostadmin')->middleware('permission:Admin');
Route::get('/secretaria', 'App\Http\Controllers\ControllerSecre@mostsecre');

Route::get('/modulo', 'App\Http\Controllers\ControllerModulo@mostmodulo');

Route::get('/plan-estudio', 'App\Http\Controllers\ControllerPlan_Estudio@mostplan');
Route::get('/inscripcion', 'App\Http\Controllers\ControllerInscripcion@mostinscripcion');

Route::get('/calificacion', 'App\Http\Controllers\ControllerCalificacion@mostcalificacion');
Route::get('/adeudo', 'App\Http\Controllers\ControllerAdeudo@mostadeudo');
//Route::get('/cardex', 'App\Http\Controllers\ControllerCardex@mostcardex');

Route::get('/cardex2', 'App\Http\Controllers\ControllerInicio@cardex');
Route::get('/calificacion2', 'App\Http\Controllers\ControllerInicio@calificacion2');
Route::get('/docente-calif', 'App\Http\Controllers\ControllerInicio@docentecalif');





//Updates
//alumno
Route::get('/update/alumno/{id_alu}', 'App\Http\Controllers\ControllerAlumno@edit')->name('update.mostalumno_modificar');
Route::patch('/update/alumno/{id_alu}', 'App\Http\Controllers\ControllerAlumno@modificaralumno')->name('update.modoficar-alumno');
Route::get('/consulta', 'App\Http\Controllers\ControllerAlumno@mostalumno')->name('alumno.actualizado');
//admin
Route::get('/update/administrador/{id_alu}', 'App\Http\Controllers\ControllerAdministrador@edit')->name('update.mostadmin_modificar');
Route::patch('/update/administrador/{id_alu}', 'App\Http\Controllers\ControllerAdministrador@modificaradmin')->name('update.modoficar-admin');
Route::get('/administrativo', 'App\Http\Controllers\ControllerAdministrador@mostadmin')->name('admin.actualizado')->middleware('permission:Admin');
//secre
Route::get('/update/secretaria/{id_alu}', 'App\Http\Controllers\ControllerSecretaria@edit')->name('update.mostsecre_modificar');
Route::patch('/update/secretaria/{id_alu}', 'App\Http\Controllers\ControllerSecretaria@modificarsecre')->name('update.modoficar-secre');
Route::get('/secretaria', 'App\Http\Controllers\ControllerSecretaria@mostsecre')->name('secre.actualizado');
//docente
Route::get('/update/docente/{id_alu}', 'App\Http\Controllers\ControllerDocente@edit')->name('update.mostdocente_modificar');
Route::patch('/update/docente/{id_alu}', 'App\Http\Controllers\ControllerDocente@modificardocente')->name('update.modoficar-docente');
Route::get('/docente', 'App\Http\Controllers\ControllerDocente@mostdocente')->name('docente.actualizado');


//Modulo
Route::get('/update/modulo/{id_alu}', 'App\Http\Controllers\ControllerModulo@edit')->name('update.mostmodulo_modificar');
Route::patch('/update/modulo/{id_alu}', 'App\Http\Controllers\ControllerModulo@modificarmodulo')->name('update.modoficar-modulo');
Route::get('/modulo', 'App\Http\Controllers\ControllerModulo@mostmodulo')->name('modulo.actualizado');


//planestudio
Route::get('/update/plan-estudio/{id_alu}', 'App\Http\Controllers\ControllerPlan_Estudio@edit')->name('update.mostplan_modificar');
Route::patch('/update/plan-estudio/{id_alu}', 'App\Http\Controllers\ControllerPlan_Estudio@modificarplan')->name('update.modoficar-plan');
Route::get('/plan-estudio', 'App\Http\Controllers\ControllerPlan_Estudio@mostplan')->name('plan.actualizado');
//Grupo
Route::get('/update/grupo/{id_alu}', 'App\Http\Controllers\ControllerGrupo@edit')->name('update.mostgrupo_modificar');
Route::patch('/update/grupo/{id_alu}', 'App\Http\Controllers\ControllerGrupo@modificargrupo')->name('update.modoficar-grupo');
Route::get('/grupo', 'App\Http\Controllers\ControllerGrupo@mostgrupo')->name('grupo.actualizado');
//Inscripcion
Route::get('/update/inscripcion/{id_alu}', 'App\Http\Controllers\ControllerInscripcion@edit')->name('update.mostinscripcion_modificar');
Route::patch('/update/inscripcion/{id_alu}', 'App\Http\Controllers\ControllerInscripcion@modificarinscripcion')->name('update.modoficar-inscripcion');
Route::get('/inscripcion', 'App\Http\Controllers\ControllerInscripcion@mostinscripcion')->name('inscripcion.actualizado');

//Calificacion
Route::get('/update/calificacion/{id_alu}', 'App\Http\Controllers\ControllerCalificacion@edit')->name('update.mostcalificacion_modificar');
Route::patch('/update/calificacion/{id_alu}', 'App\Http\Controllers\ControllerCalificacion@modificarcalificacion')->name('update.modoficar-calificacion');
Route::get('/calificacion', 'App\Http\Controllers\ControllerCalificacion@mostcalificacion')->name('calificacion.actualizado');
//adeudo
Route::get('/update/adeudo/{id_alu}', 'App\Http\Controllers\ControllerAdeudo@edit')->name('update.mostadeudo_modificar');
Route::patch('/update/adeudo/{id_alu}', 'App\Http\Controllers\ControllerAdeudo@modificaradeudo')->name('update.modoficar-adeudo');
Route::get('/adeudo', 'App\Http\Controllers\ControllerAdeudo@mostadeudo')->name('adeudo.actualizado');
// cardex
Route::get('/update/cardex/{id_alu}', 'App\Http\Controllers\ControllerCardex@edit')->name('update.mostcardex_modificar');
Route::patch('/update/cardex/{id_alu}', 'App\Http\Controllers\ControllerCardex@modificarcardex')->name('update.modoficar-cardex');
Route::get('/cardex', 'App\Http\Controllers\ControllerCardex@mostcardex')->name('cardex.actualizado');





//deletes
Route::get('/consulta/{id_alu}', 'App\Http\Controllers\ControllerAlumno@eliminaralumno')->name('delete.alumno_eliminar');
Route::get('/administrativo/{id_alu}', 'App\Http\Controllers\ControllerAdministrador@eliminaradmin')->name('delete.admin_eliminar')->middleware('permission:Admin');
Route::get('/secretaria/{id_alu}', 'App\Http\Controllers\ControllerSecretaria@eliminarsecre')->name('delete.secre_eliminar');
Route::get('/docente/{id_alu}', 'App\Http\Controllers\ControllerDocente@eliminardocente')->name('delete.docente_eliminar');

Route::get('/modulo/{id_alu}', 'App\Http\Controllers\ControllerModulo@eliminarmodulo')->name('delete.modulo_eliminar');

Route::get('/plan-estudio/{id_alu}', 'App\Http\Controllers\ControllerPlan_Estudio@eliminarplan')->name('delete.plan_eliminar');
Route::get('/grupo/{id_alu}', 'App\Http\Controllers\ControllerGrupo@eliminargrupo')->name('delete.grupo_eliminar');
Route::get('/inscripcion/{id_alu}', 'App\Http\Controllers\ControllerInscripcion@eliminarinscripcion')->name('delete.inscripcion_eliminar');

Route::get('/calificacion/{id_alu}', 'App\Http\Controllers\ControllerCalificacion@eliminarcalificacion')->name('delete.calificacion_eliminar');
Route::get('/adeudo/{id_alu}', 'App\Http\Controllers\ControllerAdeudo@eliminaradeudo')->name('delete.adeudo_eliminar');
Route::get('/cardex/{id_alu}', 'App\Http\Controllers\ControllerCardex@eliminarcardex')->name('delete.cardex_eliminar');


//llamado para insertar
Route::post('/administrativo', 'App\Http\Controllers\ControllerAdministrador@agregaadmin')->name('insert.agregar-admin')->middleware('permission:Admin');
Route::post('/grupo', 'App\Http\Controllers\ControllerGrupo@agregagrupo')->name('insert.agregar-grupo');
Route::post('/consulta', 'App\Http\Controllers\ControllerAlumno@agregaalumno')->name('insert.agregar-alumno');
Route::post('/docente', 'App\Http\Controllers\ControllerDocente@agregadocente')->name('insert.agregar-docente');
Route::post('/secretaria', 'App\Http\Controllers\ControllerSecretaria@agregasecre')->name('insert.agregar-secre');

Route::post('/modulo', 'App\Http\Controllers\ControllerModulo@agregamodulo')->name('insert.agregar-modulo');

Route::post('/plan-estudio', 'App\Http\Controllers\ControllerPlan_Estudio@agregaplan')->name('insert.agregar-plan');
Route::post('/inscripcion', 'App\Http\Controllers\ControllerInscripcion@agregainscripcion')->name('insert.agregar-inscripcion');

Route::post('/calificacion', 'App\Http\Controllers\ControllerCalificacion@agregacalificacion')->name('insert.agregar-calificacion');
Route::post('/adeudo', 'App\Http\Controllers\ControllerAdeudo@agregaadeudo')->name('insert.agregar-adeudo');
Route::post('/cardex', 'App\Http\Controllers\ControllerCardex@agregacardex')->name('insert.agregar-cardex');




Route::get('busquedas', 'ControllerBusquedas@email')->name('busquedas');



Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
