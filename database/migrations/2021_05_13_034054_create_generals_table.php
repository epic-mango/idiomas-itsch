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
            $table->string('ID_SECRETARIAL', 30)->primary();
            $table->string('SECRETARIA_CLAVE', 30);
            $table->string('SECRETARIA_AP_PAT', 30);
            $table->string('SECRETARIA_AP_MAT', 30)->nullable();
            $table->string('SECRETARIA_NOMBRE', 30);
            $table->string('SECRETARIA_SEXO', 10);
            $table->string('SECRETARIA_TIPO_SANGRE', 5);
            $table->date('SECRETARIA_FECHA_NAC');
            $table->string('SECRETARIA_CALLE', 30);
            $table->string('SECRETARIA_COLONIA', 30);
            $table->string('SECRETARIA_MUNICIPIO', 30);
            $table->string('SECRETARIA_ESTADO', 30);
            $table->string('SECRETARIA_MOVIL', 30);
            $table->string('SECRETARIA_CASA', 30);
            $table->string('SECRETARIA_CORREO', 30);
            $table->string('SECRETARIA_CLAVE_PROFESIONAL', 30);
            $table->string('SECRETARIA_ESPECIALIDAD', 30);
            $table->date('SECRETARIA_FECHA_ING');
            $table->string('SECRETARIA_OBSERVACIONES', 500);
            $table->string('SECRETARIA_PWD', 30);
            $table->timestamps();
        });

        Schema::create('administradors', function (Blueprint $table) {
            $table->string('ID_ADMIN', 30)->primary();
            $table->string('ADMIN_CLAVE', 30);
            $table->string('ADMIN_AP_PAT', 30);
            $table->string('ADMIN_AP_MAT', 30)->nullable();
            $table->string('ADMIN_NOMBRE', 30);
            $table->string('ADMIN_SEXO', 10);
            $table->string('ADMIN_TIPO_SANGRE', 5);
            $table->date('ADMIN_FECHA_NAC');
            $table->string('ADMIN_CALLE', 30);
            $table->string('ADMIN_COLONIA', 30);
            $table->string('ADMIN_MUNICIPIO', 30);
            $table->string('ADMIN_ESTADO', 30);
            $table->string('ADMIN_MOVIL', 30);
            $table->string('ADMIN_CASA', 30);
            $table->string('ADMIN_CORREO', 30);
            $table->string('ADMIN_CLAVE_PROFESIONAL', 30);
            $table->string('ADMIN_ESPECIALIDAD', 30);
            $table->date('ADMIN_FECHA_ING');
            $table->string('ADMIN_OBSERVACIONES', 500);
            $table->string('ADMIN_PWD', 30);
            $table->timestamps();
        });

        Schema::create('alumnos', function (Blueprint $table) {
            $table->string('ID_ALUMNO', 30)->primary();
            $table->string('ALUMNO_APELLIDO_PAT', 30);
            $table->string('ALUMNO_APELLIDO_MAT', 30)->nullable();
            $table->string('ALUMNO_NOMBRE', 30);
            $table->string('ALUMNO_SEXO', 10);
            $table->string('ALUMNO_TIPO_SANGRE', 5);
            $table->date('ALUMNO_FECHA_NAC');
            $table->string('ALUMNO_CALLE', 30);
            $table->string('ALUMNO_COLONIA', 30);
            $table->string('ALUMNO_MUNICIPIO', 30);
            $table->string('ALUMNO_ESTADO', 30);
            $table->string('ALUMNO_TELEFONO_PER', 30);
            $table->string('ALUMNO_TELEFONO_CASA', 30);
            $table->string('ALUMNO_CORREO', 30);
            $table->string('ALUMNO_TUTOR_AR_PAT', 30);
            $table->string('ALUMNO_TUTOR_AR_MAT', 30);
            $table->string('ALUMNO_TUTOR_NOMBRE', 30);
            $table->string('ALUMNO_CARRERA', 30);
            $table->date('ALUMNO_FECHA_ING');
            $table->string('ALUMNO_OBSERVACIONES', 500);
            $table->string('ALUMNO_PWD', 30);
            $table->string('ALU_STA', 2);
            $table->string('ALU_ING_PER', 8);
            $table->smallInteger('ALU_ING_AN');
            $table->string('ALU_INS', 1);
            $table->string('ALU_FIN_PER', 8);
            $table->smallInteger('ALU_SEM');
            $table->smallInteger('ALU_FIN_AN');
            $table->string('ALU_MOT_BAJ', 40);
            $table->string('ALU_PER_BAJ', 8);
            $table->smallInteger('ALU_AN_BAJ');
        });

        Schema::create('docentes', function (Blueprint $table) {
            $table->string('ID_DOCENTE', 30)->primary();
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
            $table->string('DOCENTE_MOVIL', 30);
            $table->string('DOCENTE_CASA', 30);
            $table->string('DOCENTE_CORREO', 30);
            $table->string('DOCENTE_CLAVE_PROFESIONAL', 30);
            $table->string('DOCENTE_ESPECIALIDAD', 30);
            $table->date('DOCENTE_FECHA_ING');
            $table->string('DOCENTE_OBSERVACIONES', 500);
            $table->string('DOCENTE_PWD', 30);
            $table->string('CAT_EPR', 15);
        });


        Schema::create('idiomas', function (Blueprint $table) {
            $table->string('ID_IDIOMA', 30)->primary();
            $table->string('IDIOMA_NOMBRE', 30);
        });

        Schema::create('modulos', function (Blueprint $table) {
            $table->string('ID_MODULO', 30)->primary();
            $table->integer('MODULO_TIEMPO');
            $table->string('RET_NOM', 5);
            $table->smallInteger('RET_ORD');
        });


        Schema::create('ubicacions', function (Blueprint $table) {
            $table->string('ID_UBICACION', 30)->primary();
            $table->char('UBICACION_EDIFICIO', 1);
            $table->integer('UBICACION_SALON');
        });






        // NIVEL 1

        Schema::create('plan_estudios', function (Blueprint $table) {
            $table->string('ID_PLANESTUDIO', 30)->primary();
            $table->string('PLAN_CLAVE', 30);
            $table->string('PLAN_ID_IDIOMA', 30)->default('PLAN_ESTUDIO');
            $table->foreign('PLAN_ID_IDIOMA')->references('ID_IDIOMA')->on('idiomas')->onUpdate('restrict')->onDelete('restrict');
            $table->string('PLAN_IN', 30);
            $table->string('PLAN_FIN', 30);
            $table->string('PLAN_ESTADO', 30);
            $table->string('PLAN_CMOD', 30);
        });



        // NIVEL 2
        Schema::create('grupos', function (Blueprint $table) {
            $table->string('ID_GRUPO_NOMBRE', 30)->primary();
            $table->string('GRUPO_ID_PLANESTUDIO', 30)->default('GRUPO');
            $table->foreign('GRUPO_ID_PLANESTUDIO')->references('ID_PLANESTUDIO')->on('plan_estudios')->onUpdate('restrict')->onDelete('restrict');
            $table->string('GRUPO_ID_MODULO', 30)->default('GRUPO');
            $table->foreign('GRUPO_ID_MODULO')->references('ID_MODULO')->on('modulos')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('GRUPO_SEMESTRE');
            $table->string('GRUPO_TIPO', 30);
            $table->integer('GRUPO_NUM_ALUMNOS');
            $table->string('GRUPO_ID_DOCENTE', 30)->default('GRUPO');
            $table->foreign('GRUPO_ID_DOCENTE')->references('ID_DOCENTE')->on('docentes')->onUpdate('restrict')->onDelete('restrict');
            $table->string('GRUPO_ID_UBICACION', 30)->default('GRUPO');
            $table->foreign('GRUPO_ID_UBICACION')->references('ID_UBICACION')->on('ubicacions')->onUpdate('restrict')->onDelete('restrict');
            $table->string('GRUPO_DIA', 30);
            $table->time('GRUPO_HORA_IN');
            $table->time('GRUPO_HORA_FIN');
            $table->integer('GRUPO_HORA_TOTAL');
            $table->smallInteger('GRU_LIM');
            $table->string('GRU_HLU', 5);
            $table->string('GRU_ALU', 3);
            $table->string('GRU_HMA', 5);
            $table->string('GRU_AMA', 3);
            $table->string('GRU_HMI', 5);
            $table->string('GRU_AMI', 3);
            $table->string('GRU_HJU', 5);
            $table->string('GRU_AJU', 3);
            $table->string('GRU_HVI', 5);
            $table->string('GRU_AVI', 3);
            $table->string('GRU_HSA', 3);
            $table->string('GRU_ASA', 3);
            $table->string('GRU_DES', 50);
        });

        // NIVEL 3

        Schema::create('inscripcions', function (Blueprint $table) {
            $table->string('ID_INSCRIPCION', 30)->primary();
            $table->string('INSCRIPCION_ID_ALUMNO', 30)->default('inscripcions');
            $table->foreign('INSCRIPCION_ID_ALUMNO')->references('ID_ALUMNO')->on('alumnos')->onUpdate('restrict')->onDelete('restrict');
            $table->string('INSCRIPCION_ID_GRUPO_NOMBRE', 30)->default('inscripcions');
            $table->foreign('INSCRIPCION_ID_GRUPO_NOMBRE')->references('ID_GRUPO_NOMBRE')->on('grupos')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('INSCRIPCION_NUM_FOLIO');
            $table->integer('INSCRIPCION_MONTO');
            $table->date('ISCRIPCION_FECHA');
            $table->string('INS_PER', 8);
            $table->smallInteger('INS_AN');
        });


        Schema::create('asistencias', function (Blueprint $table) {


            $table->string('ID_ASISTENCIA', 30)->primary();
            $table->string('ASISTENCIA_ID_GRUPO_NOMBRE', 30)->default('asistencias');
            $table->foreign('ASISTENCIA_ID_GRUPO_NOMBRE')->references('ID_GRUPO_NOMBRE')->on('grupos')->onUpdate('restrict')->onDelete('restrict');
            $table->string('ASISTENCIA_ID_DOCENTE', 30)->default('asistencias');
            $table->foreign('ASISTENCIA_ID_DOCENTE')->references('ID_DOCENTE')->on('docentes')->onUpdate('restrict')->onDelete('restrict');
            $table->string('ASISTENCIA_ID_ALUMNO', 30)->default('asistencias');
            $table->foreign('ASISTENCIA_ID_ALUMNO')->references('ID_ALUMNO')->on('alumnos')->onUpdate('restrict')->onDelete('restrict');
            $table->date('ASISTENCIA_FECHA');
            $table->string('ASISTENCIA_CLASE', 30);
        });


        Schema::create('calificacions', function (Blueprint $table) {
            $table->string('ID_CALIFICACION', 30)->primary();
            $table->string('CALIFICACION_ID_ALUMNO', 30)->default('calificacions');
            $table->foreign('CALIFICACION_ID_ALUMNO')->references('ID_ALUMNO')->on('alumnos')->onUpdate('restrict')->onDelete('restrict');
            $table->string('CALIFICACION_ID_GRUPO_NOMBRE', 30)->default('calificacions');
            $table->foreign('CALIFICACION_ID_GRUPO_NOMBRE')->references('ID_GRUPO_NOMBRE')->on('grupos')->onUpdate('restrict')->onDelete('restrict');
            $table->string('CALIFICACION_ID_PLANESTUDIO', 30)->default('calificacions');
            $table->foreign('CALIFICACION_ID_PLANESTUDIO')->references('ID_PLANESTUDIO')->on('plan_estudios')->onUpdate('restrict')->onDelete('restrict');
            $table->string('CALIFICACION_ID_MODULO', 30)->default('calificacions');
            $table->foreign('CALIFICACION_ID_MODULO')->references('ID_MODULO')->on('modulos')->onUpdate('restrict')->onDelete('restrict');
            $table->string('CALIFICACION_ID_DOCENTE', 30)->default('calificaions');
            $table->foreign('CALIFICACION_ID_DOCENTE')->references('ID_DOCENTE')->on('docentes')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('CALIFICACION_CLASE');
            $table->float('P1');
            $table->float('P2');
            $table->float('P3');
            $table->float('P4');
            $table->float('PF');
            $table->timestamps();
        });

        //NIVEL 4

        Schema::create('adeudos', function (Blueprint $table) {
            $table->string('ID_ADEUDO', 30)->primary();
            $table->string('ADEUDO_ID_ALUMNO', 30)->default('adeudos');
            $table->foreign('ADEUDO_ID_ALUMNO')->references('ID_ALUMNO')->on('alumnos')->onUpdate('restrict')->onDelete('restrict');
            $table->string('DEU_NOM', 40);
            $table->string('ADEUDO_ID_INSCRIPCION', 30)->default('adeudos');
            $table->foreign('ADEUDO_ID_INSCRIPCION')->references('ID_INSCRIPCION')->on('inscripcions')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('ADEUDO_MONTO');
            $table->date('ADEUDO_FECHA');
            $table->integer('ADEUDO_MONTO_RES');
            $table->integer('ADEUDO_MONTO_ACTUAL');
            $table->date('ADEUDO_FECHA_NUE');
            $table->integer('ADEUDO_MONTO_RESTANTE');
            $table->string('DEU_CON', 80);
            $table->string('DEU_PER', 8);
            $table->string('DEU_AN', 50);
            $table->text('ADEUDO_OBSERVACIONES');
        });

        Schema::create('cardexes', function (Blueprint $table) {
            $table->string('ID_CARDEX', 30)->primary();
            $table->string('CARDEX_ID_ALUMNO', 30)->default('cadexes');
            $table->foreign('CARDEX_ID_ALUMNO')->references('ID_ALUMNO')->on('alumnos')->onUpdate('restrict')->onDelete('restrict');
            $table->string('CARDEX_ID_GRUPO_NOMBRE', 30)->default('cardexes');
            $table->foreign('CARDEX_ID_GRUPO_NOMBRE')->references('ID_GRUPO_NOMBRE')->on('grupos')->onUpdate('restrict')->onDelete('restrict');
            $table->string('CARDEX_ID_PLANESTUDIO', 30)->default('cardexes');
            $table->foreign('CARDEX_ID_PLANESTUDIO')->references('ID_PLANESTUDIO')->on('plan_estudios')->onUpdate('restrict')->onDelete('restrict');
            $table->string('CARDEX_ID_MODULO', 30)->default('cardexes');
            $table->foreign('CARDEX_ID_MODULO')->references('ID_MODULO')->on('modulos')->onUpdate('restrict')->onDelete('restrict');
            $table->string('CARDEX_ID_DOCENTE', 30)->default('cardexes');
            $table->foreign('CARDEX_ID_DOCENTE')->references('ID_DOCENTE')->on('docentes')->onUpdate('restrict')->onDelete('restrict');
            $table->date('CARDEX_FECHA');
            $table->string('CARDEX_ID_CALIFICACION', 30)->default('cardex');
            $table->foreign('CARDEX_ID_CALIFICACION')->references('ID_CALIFICACION')->on('calificacions')->onUpdate('restrict')->onDelete('restrict');
            $table->float('CAR_CAL');
            $table->string('CAR_PER_C', 8);
            $table->string('CAR_ACR', 1);
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
        Schema::dropIfExists('idiomas');
        Schema::dropIfExists('modulos');
        Schema::dropIfExists('ubicacions');



        //nivel1
        Schema::dropIfExists('plan_estudios');
        //nivel2
        Schema::dropIfExists('grupos');

        //NIVEL 3
        Schema::dropIfExists('inscripcions');
        Schema::dropIfExists('asistencias');
        Schema::dropIfExists('calificacions');
        //NIVEL4
        Schema::dropIfExists('adeudos');
        Schema::dropIfExists('cardexes');
    }
}
