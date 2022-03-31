<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;

class AdministradoresTest extends TestCase
{
    
    use DatabaseTransactions;
    
    /**
     * @test
     */
    public function alumno_cant_add_administrador(){
        //Desactivar el ocultar los errores
        //$this->withoutExceptionHandling();
        
        //Agregar un nuevo usuario
        $user = User::create([
            'name' => 'Prueba',
            'email' => 'Prueba@gmail.com',
            'password' => bcrypt('1234567890'),
        ])->assignRole('Alum');

        //Verificar si se ha creado el nuevo usuario
        $this->assertCredentials([
            'email' => 'Prueba@gmail.com',
            'password' => '1234567890',
        ]);

        //Verificar que un usuario Alumno no puede añadir a un Administrador
        $this->actingAs($user)->post('/administrativo',[
            'ID_ADMIN'=> '1',
            'ADMIN_CLAVE' => 'Abcde54321',
            'ADMIN_NOMBRE' => 'Pruebas',
            'ADMIN_AP_PAT' => 'Prohibidio',
            'ADMIN_AP_MAT' => 'Prohibidencio',
            'ADMIN_SEXO' => 'Masculino',
            'ADMIN_TIPO_SANGRE' => '0+',
            'ADMIN_FECHA_NAC' => '1999-01-01',
            'ADMIN_CALLE' => 'La calle',
            'ADMIN_COLONIA' => 'La Colonia',
            'ADMIN_ESTADO' => 'Michoacan',
            'ADMIN_MUNICIPIO' => 'Hidalgo',
            'ADMIN_MOVIL' => '1234567880',
            'ADMIN_CASA' => '1234567690',
            'ADMIN_CORREO' => $user->id,
            'ADMIN_CLAVE_PROFESIONAL' => 'xD',
            'ADMIN_ESPECIALIDAD' => 'o.O',
            'ADMIN_FECHA_ING' => '2022-07-22',
            'ADMIN_OBSERVACIONES' => 'Nada',
        ])->assertForbidden();
    }

    
    /**
     * @test
     */
    public function notlogged_cant_add_administrador(){        

        //Verificar que un usuario Alumno no puede añadir a un Administrador
        $this->post('/administrativo',[
            'ID_ADMIN'=> '1',
            'ADMIN_CLAVE' => 'Abcde54321',
            'ADMIN_NOMBRE' => 'Pruebas',
            'ADMIN_AP_PAT' => 'Prohibidio',
            'ADMIN_AP_MAT' => 'Prohibidencio',
            'ADMIN_SEXO' => 'Masculino',
            'ADMIN_TIPO_SANGRE' => '0+',
            'ADMIN_FECHA_NAC' => '1999-01-01',
            'ADMIN_CALLE' => 'La calle',
            'ADMIN_COLONIA' => 'La Colonia',
            'ADMIN_ESTADO' => 'Michoacan',
            'ADMIN_MUNICIPIO' => 'Hidalgo',
            'ADMIN_MOVIL' => '1234567880',
            'ADMIN_CASA' => '1234567690',
            'ADMIN_CORREO' => '1',
            'ADMIN_CLAVE_PROFESIONAL' => 'xD',
            'ADMIN_ESPECIALIDAD' => 'o.O',
            'ADMIN_FECHA_ING' => '2022-07-22',
            'ADMIN_OBSERVACIONES' => 'Nada',
        ])->assertForbidden();
    }

    /**
     * @test
     */
    public function admin_can_add_administrador()
    {
        //Desactivar el ocultar los errores
        //$this->withoutExceptionHandling();

        //Agregar un nuevo usuario
        $user = User::create([
            'name' => 'Prueba',
            'email' => 'Prueba@gmail.com',
            'password' => bcrypt('1234567890'),
        ])->assignRole('Admin');

        //Verificar si se ha creado el nuevo usuario
        $this->assertCredentials([
            'email' => 'Prueba@gmail.com',
            'password' => '1234567890',
        ]);
        
        //Verificar que se le dio el Rol de Admin al administrador
        $this->assertTrue($user->hasRole('Admin'));

        //Verificar que un usuario con rol administrador puede agregar a otro administrador
        $this->actingAs($user)->post('/administrativo',[
            'ID_ADMIN'=> '1',
            'ADMIN_CLAVE' => 'Abcde54321',
            'ADMIN_NOMBRE' => 'Pruebas',
            'ADMIN_AP_PAT' => 'Prohibidio',
            'ADMIN_AP_MAT' => 'Prohibidencio',
            'ADMIN_SEXO' => 'Masculino',
            'ADMIN_TIPO_SANGRE' => '0+',
            'ADMIN_FECHA_NAC' => '1999-01-01',
            'ADMIN_CALLE' => 'La calle',
            'ADMIN_COLONIA' => 'La Colonia',
            'ADMIN_ESTADO' => 'Michoacan',
            'ADMIN_MUNICIPIO' => 'Hidalgo',
            'ADMIN_MOVIL' => '1234567880',
            'ADMIN_CASA' => '1234567690',
            'ADMIN_CORREO' => $user->id,
            'ADMIN_CLAVE_PROFESIONAL' => 'xD',
            'ADMIN_ESPECIALIDAD' => 'o.O',
            'ADMIN_FECHA_ING' => '2022-07-22',
            'ADMIN_OBSERVACIONES' => 'Nada',
        ])->assertRedirect();
        
    }
}
