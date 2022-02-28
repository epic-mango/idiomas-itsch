<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // NIVEL INDEPENDIENTE
        Schema::create('secretarias', function (Blueprint $table) {
            $table->string('ID_SECRETARIAL', 10)->primary();
            $table->string('SECRETARIA_CLAVE', 30);
            $table->string('SECRETARIA_AP_PAT', 30);
            $table->string('SECRETARIA_AP_MAT', 30)->nullable();
            $table->string('SECRETARIA_NOMBRE', 30);
            $table->string('SECRETARIA_SEXO', 10);
            $table->string('SECRETARIA_TIPO_SANGRE', 5)->nullable();
            $table->date('SECRETARIA_FECHA_NAC');
            $table->string('SECRETARIA_CALLE', 30);
            $table->string('SECRETARIA_COLONIA', 30);
            $table->string('SECRETARIA_MUNICIPIO', 30);
            $table->string('SECRETARIA_ESTADO', 30);
            $table->string('SECRETARIA_MOVIL', 30)->nullable();
            $table->string('SECRETARIA_CASA', 30)->nullable();
            $table->unsignedBigInteger('SECRETARIA_CORREO')->unique();
            $table->foreign('SECRETARIA_CORREO')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->string('SECRETARIA_CLAVE_PROFESIONAL', 30)->nullable();
            $table->string('SECRETARIA_ESPECIALIDAD', 30)->nullable();
            $table->date('SECRETARIA_FECHA_ING');
            $table->string('SECRETARIA_OBSERVACIONES', 500);
        });

        Schema::create('administradors', function (Blueprint $table) {

            $table->string('ID_ADMIN', 10)->primary();
            $table->string('ADMIN_CLAVE', 30);
            $table->string('ADMIN_AP_PAT', 30);
            $table->string('ADMIN_AP_MAT', 30)->nullable();
            $table->string('ADMIN_NOMBRE', 30);
            $table->string('ADMIN_SEXO', 10);
            $table->string('ADMIN_TIPO_SANGRE', 5)->nullable();
            $table->date('ADMIN_FECHA_NAC');
            $table->string('ADMIN_CALLE', 30);
            $table->string('ADMIN_COLONIA', 30);
            $table->string('ADMIN_MUNICIPIO', 30);
            $table->string('ADMIN_ESTADO', 30);
            $table->string('ADMIN_MOVIL', 30)->nullable();
            $table->string('ADMIN_CASA', 30)->nullable();
            $table->unsignedBigInteger('ADMIN_CORREO')->unique();
            $table->foreign('ADMIN_CORREO')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->string('ADMIN_CLAVE_PROFESIONAL', 30)->nullable();
            $table->string('ADMIN_ESPECIALIDAD', 30)->nullable();
            $table->date('ADMIN_FECHA_ING');
            $table->string('ADMIN_OBSERVACIONES', 500)->nullable();
        });

        Schema::create('alumnos', function (Blueprint $table) {
            $table->string('ID_ALUMNO', 15)->primary();
            $table->string('ALUMNO_APELLIDO_PAT', 30);
            $table->string('ALUMNO_APELLIDO_MAT', 30)->nullable();
            $table->string('ALUMNO_NOMBRE', 30);
            $table->string('ALUMNO_SEXO', 10);
            $table->string('ALUMNO_TIPO_SANGRE', 5)->nullable();
            $table->date('ALUMNO_FECHA_NAC');
            $table->string('ALUMNO_CALLE', 30);
            $table->string('ALUMNO_COLONIA', 30);
            $table->string('ALUMNO_MUNICIPIO', 30);
            $table->string('ALUMNO_ESTADO', 30);
            $table->string('ALUMNO_TELEFONO_PER', 30)->nullable();
            $table->string('ALUMNO_TELEFONO_CASA', 30)->nullable();
            $table->foreignId('ALUMNO_CORREO')->references('id')->on('users')->onUpdate('restrict')->onDelete('restrict')->unique();
            $table->string('ALUMNO_TUTOR_AR_PAT', 30)->nullable();
            $table->string('ALUMNO_TUTOR_AR_MAT', 30)->nullable();
            $table->string('ALUMNO_TUTOR_NOMBRE', 30)->nullable();
            $table->string('ALUMNO_CARRERA', 30);
            $table->string('ALUMNO_OBSERVACIONES', 500);
            $table->string('ALUMNO_STATUS', 20);

            $table->integer('ALUMNO_ING_ANIO');
        });

        Schema::create('docentes', function (Blueprint $table) {
            $table->string('ID_DOCENTE', 6)->primary();
            $table->string('DOCENTE_CLAVE', 30);
            $table->string('DOCENTE_AP_PAT', 30);
            $table->string('DOCENTE_AP_MAT', 30)->nullable();
            $table->string('DOCENTE_NOMBRE', 30);
            $table->string('DOCENTE_SEXO', 10);
            $table->string('DOCENTE_TIPO_SANGRE', 5);
            $table->date('DOCENTE_FECHA_NAC');
            $table->string('DOCENTE_CALLE', 30);
            $table->string('DOCENTE_COLONIA', 30);
            $table->string('DOCENTE_MUNICIPIO', 30);
            $table->string('DOCENTE_ESTADO', 30);
            $table->string('DOCENTE_MOVIL', 30)->nullable();
            $table->string('DOCENTE_CASA', 30)->nullable();
            $table->foreignId('DOCENTE_CORREO')->references('id')->on('users')->onUpdate('restrict')->onDelete('restrict')->unique();
            $table->string('DOCENTE_GRADO_ESCOLAR', 30)->nullable();
            $table->string('DOCENTE_ESPECIALIDAD', 30)->nullable();
            $table->date('DOCENTE_FECHA_ING');
            $table->string('DOCENTE_OBSERVACIONES', 500);
        });












        // NIVEL 1

        Schema::create('planestudios', function (Blueprint $table) {
            $table->string('ID_PLANESTUDIO', 5)->primary();
            $table->string('PLAN_CLAVE', 30);
            $table->string('PLAN_ID_IDIOMA', 20);
            $table->date('PLAN_IN');
            $table->date('PLAN_FIN');
            $table->string('PLAN_ESTADO', 10);
            $table->integer('PLAN_CMOD');
        });



        // NIVEL 2


        Schema::create('modulos', function (Blueprint $table) {
            $table->string('ID_MODULO', 8)->primary();
            $table->string('RETICULA_NOMBRE', 5);
            $table->string('MODULO_ID_PLANESTUDIO', 5);
            $table->foreign('MODULO_ID_PLANESTUDIO')->references('ID_PLANESTUDIO')->on('planestudios')->onUpdate('restrict')->onDelete('restrict');
        });

        Schema::create('grupos', function (Blueprint $table) {
            $table->id('ID_GRUPO');
            $table->string('GRUPO_ID_MODULO', 6);
            $table->foreign('GRUPO_ID_MODULO')->references('ID_MODULO')->on('modulos')->onUpdate('restrict')->onDelete('restrict');
            $table->string('GRUPO_TIPO', 6);
            $table->string('GRUPO_CLA', 6);
            $table->integer('GRUPO_NUM_GRUPO');
            $table->string('GRUPO_DES', 50);
            $table->integer('GRUPO_NUM_ALUMNOS');
            $table->integer('GRUPO_LIMITE');
            $table->string('GRUPO_ID_DOCENTE', 6);
            $table->foreign('GRUPO_ID_DOCENTE')->references('ID_DOCENTE')->on('docentes')->onUpdate('restrict')->onDelete('restrict');
            $table->string('GRUPO_DIAS', 30);
            $table->string('GRUPO_HORAS', 30);
            $table->string('GRUPO_UBICACION', 6);
        });

        // NIVEL 3

        Schema::create('inscripcions', function (Blueprint $table) {
            $table->id('ID_INSCRIPCION');
            $table->foreignId('INSCRIPCION_ID_GRUPO')->references('ID_GRUPO')->on('grupos')->onUpdate('restrict')->onDelete('restrict');
            $table->string('ISCRIPCION_ID_ALUMNO', 15);
            $table->foreign('ISCRIPCION_ID_ALUMNO')->references('ID_ALUMNO')->on('alumnos')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('INSCRIPCION_NUM_FOLIO');
            $table->integer('INSCRIPCION_MONTO');
            $table->date('ISCRIPCION_FECHA');
            $table->string('ISCRIPCION_ PERIODO', 10);
            $table->integer('INSCRIPCION_ANIO');
            $table->float('P1');
            $table->float('P2');
            $table->float('P3');
            $table->float('P4');
            $table->float('PF');
            $table->date('CALIFICACION_FECHA');
        });






        //NIVEL 4

        Schema::create('adeudos', function (Blueprint $table) {
            $table->id('ID_ADEUDO');
            $table->string('ADEUDO_ID_ALUMNO', 15)->default('adeudos');
            $table->foreign('ADEUDO_ID_ALUMNO')->references('ID_ALUMNO')->on('alumnos')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('ADEUDO_MONTO');
            $table->date('ADEUDO_FECHA');
            $table->string('ADEUDO_PERIODO', 10);
            $table->integer('ADEUDO_ANIO');
            $table->text('ADEUDO_OBSERVACIONES');
            $table->string('ADEUDO_DESCRIPCION', 30);
        });

        Schema::create('cardexes', function (Blueprint $table) {
            $table->id('ID_CARDEX');
            $table->string('CARDEX_ID_ALUMNO', 15);
            $table->foreign('CARDEX_ID_ALUMNO')->references('ID_ALUMNO')->on('alumnos')->onUpdate('restrict')->onDelete('restrict');
            $table->string('CARDEX_ID_MODULO', 6);
            $table->foreign('CARDEX_ID_MODULO')->references('ID_MODULO')->on('modulos')->onUpdate('restrict')->onDelete('restrict');
            $table->string('CARDEX_ID_DOCENTE', 6);
            $table->foreign('CARDEX_ID_DOCENTE')->references('ID_DOCENTE')->on('docentes')->onUpdate('restrict')->onDelete('restrict');
            $table->float('CARDEX_ID_CALIFICACION');
            $table->string('CARDEX_PERIODO', 8);
            $table->integer('CARDEX_ANIO');
            $table->string('CARDEX_ACREDITADO', 3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //nivel idependiente
        Schema::dropIfExists('secretarias');
        Schema::dropIfExists('administradors');
        Schema::dropIfExists('alumnos');
        Schema::dropIfExists('docentes');

        //nivel1
        Schema::dropIfExists('planestudios');
        Schema::dropIfExists('modulos');
        //nivel2
        Schema::dropIfExists('grupos');

        //NIVEL 3
        Schema::dropIfExists('inscripcions');


        //NIVEL4
        Schema::dropIfExists('adeudos');
        Schema::dropIfExists('cardexes');
    }
}
