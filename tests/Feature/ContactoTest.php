<?php

use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;


uses(RefreshDatabase::class);
test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});



it('obtener contactos por usuario', function () {
    
    
       $usuario=Usuario::factory()->create([
        'nombre'=>"linda",
        "apellido"=>"atencio",
        'email'=>"linda69@gmail.com",
        'password'=>"12345",
        
    ]);
    $this->actingAs($usuario,'sanctum');
    $usuario->contactos()->create([
        "nombre"=>"mariana",
        "apellido"=>"alvis",
        "email"=>"coreo@gmail.com",
        "telefono"=>"0987654321",
        
    ]);

    $this->getJson('/api/v1/contactos')->assertStatus(200);
});


it('creamos contactos', function () {
    $usuario=Usuario::factory()->create([
        'nombre'=>"linda",
        "apellido"=>"atencio",
        'email'=>"linda69@gmail.com",
        'password'=>"12345",
        
    ]);
    $this->actingAs($usuario,'sanctum');
    $this->postJson('/api/v1/contactos', [
        'nombre' => 'linda',
        'apellido' => 'atencio',
        
        'email' => 'linda@gmail.com',
        'telefono' => '1234567890',
    ])->assertStatus(201);
});



it('eliminamos el contacto', function () {
     $usuario=Usuario::factory()->create([
        'nombre'=>"linda",
        "apellido"=>"atencio",
        'email'=>"linda69@gmail.com",
        'password'=>"12345",
        
    ]);
    $contacto=$usuario->contactos()->create([
        'nombre'=>"linda",
        "apellido"=>"atencio",
        'email'=>"linda39@gmail.com",
        'telefono'=>'434334434',
    ]);
    $this->actingAs($usuario,'sanctum');
    $this->deleteJson('/api/v1/contactos/{$contacto->id}', ['id' => $contacto->id])->assertStatus(200);

});

it('editamos el contacto', function () {
    $usuario=Usuario::factory()->create([
        'nombre'=>"linda",
        "apellido"=>"atencio",
        'email'=>"linda69@gmail.com",
        'password'=>"12345",
        
    ]);
    $contacto=$usuario->contactos()->create([
        'nombre'=>"linda",
        "apellido"=>"atencio",
        'email'=>"linda39@gmail.com",
        'telefono'=>'434334434',
    ]);
    $this->actingAs($usuario,'sanctum');
    $this->patchJson('/api/v1/contactos/{$contacto->id}', [
    'id' => $contacto->id,
    'nombre'=>"linda",
    "apellido"=>"atencio",
    ])->assertStatus(200);

});

it('ver un solo contacto',function(){
    $usuario=Usuario::factory()->create([
        'nombre'=>"linda",
        "apellido"=>"atencio",
        'email'=>"linda69@gmail.com",
        'password'=>"12345",
        
    ]);
    $this->actingAs($usuario,'sanctum');
    
    $contacto=$usuario->contactos()->create([
        'nombre'=>"linda",
        "apellido"=>"atencio",
        'email'=>"linda39@gmail.com",
        'telefono'=>'434334434',
    ]);
   $this->getJson("/api/v1/contactos/{$contacto->id}")->assertOk();
   
    
    
});



