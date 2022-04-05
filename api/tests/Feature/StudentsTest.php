<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Students;


class StudentsTest extends TestCase
{

    use RefreshDatabase;

    
    public function test_get_all_students()
    {


        $students = Students::factory()->count(30)->create();

        foreach($students as $student){

            $this->postJson('/api/students',
                [                
                    'cpf'=>$student->cpf,
                    'nome'=>$student->nome,
                    'email'=>$student->email,
                ]
        
            );
        }

        $response = $this->getJson('/api/students');

        $response->assertStatus(200);
    }

    public function test_get_one_student()
    {
        $students = Students::factory()->count(1)->create();

        $response = $this->getJson('/api/students/' . $students[0]->ra );
        $response->assertStatus(200);
            

    }

    public function test_insert_students()
    {
        $students = Students::factory()->count(1)->create();

        $response = $this->postJson('/api/students',
            [                
                'cpf'=>$students[0]->cpf,
                'nome'=>$students[0]->nome,
                'email'=>$students[0]->email,
            ]
    
        );

        $response->assertStatus(200);
    }


    public function test_update_students()
    {

        $students = Students::factory()->count(1)->create();

        $this->postJson('/api/students',
            [                
                'cpf'=>$students[0]->cpf,
                'nome'=>$students[0]->nome,
                'email'=>$students[0]->email,
            ]
    
        );
        


        $studentsNewObj = Students::factory()->count(1)->create();

        $this->putJson('/api/students/' . $students[0]->ra,
            [                               
                'cpf'=>$students[0]->cpf,
                'nome'=>$studentsNewObj[0]->nome,
                'email'=>$studentsNewObj[0]->email,
            ]
    
        );

        $response = $this->getJson('/api/students/' . $studentsNewObj[0]->ra );
       
        $response->assertStatus(200);
    }

    public function test_delete_students()
    {
        $students = Students::factory()->count(1)->create();

        $response = $this->deleteJson('/api/students/' . $students[0]->ra );
        
        $response->assertStatus(200);


    }


}
