<?php
use App\Models\Contacto;
use App\Models\Usuario;

test('crea un contacto válido', function () {
     $usuario=Usuario::factory()->create();
    $this->actingAs($usuario,'sanctum');

    $response = $this->postJson('/api/v1/contactos', [
        'nombre' => 'linda',   
        'telefono' => '0987654321',
    ]);
    $response->assertStatus(201);
});

test('devuelve 404 para un contacto ajeno', function () {
    $visitado = Usuario::factory()->create();
    $visitor = Usuario::factory()->create();
    $contact = Contacto::factory()->for($visitado)->create([
        'nombre' => 'Contacto privado',
    ]);
    $this->actingAs($visitor,'sanctum');
    $response = $this->getJson("/api/v1/contactos/{$contact->id}");
    $response->assertStatus(404);
});

it('solicitar contactos sin autenticacion', function () {
 
    $this->getJson('/api/v1/contactos')->assertStatus(401);
});

test('crear contacto sin telefono obligatorio', function () {
     $usuario=Usuario::factory()->create();
    $this->actingAs($usuario,'sanctum');

    $response = $this->postJson('/api/v1/contactos', [
        'nombre' => 'linda',   
       
    ]);
    $response->assertStatus(422);
});

test('repetir correo o telefono en una agenda', function () {
     $usuario=Usuario::factory()->create();
    $this->actingAs($usuario,'sanctum');

    $response = $this->postJson('/api/v1/contactos', [
        'nombre' => 'linda',   
        'telefono' => '0987654321',
    ]);
      $response->dump();
    $response->assertStatus(422);
  
});