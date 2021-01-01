<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use PHPUnit\Framework\TestCase;

use App\TestModel;




class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $mahasiswa = TestModel::create(["id" => "0000066","name" => "Handayani"]);
        $this->assertDatabaseHas('person', [
         'id' => '0000066','name' => "Handayani"
        ]);
        TestModel::find($mahasiswa->id)->update(["name" => "Ahayyy"]);
        $this->assertDatabaseHas('person', [
         'name' => 'Ahayyy'
        ]);
TestModel::destroy($mahasiswa->id);
$this->assertDatabaseMissing('person', [
         'name' => 'Ahayyy'
      ]);
    }
}
