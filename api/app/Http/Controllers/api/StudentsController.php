<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Students;

class StudentsController extends Controller
{
   
    public function index()
    {
        return Students::all();
    }

    
    public function store(Request $request)
    {
        Students::create($request->all());
    }

  
    public function show($id)
    {
        return Students::findOrFail($id);
    }

   
    public function update(Request $request, $id)
    {
        $alunos = Students::findOrFail($id);
        $alunos->update($request->all());
    }

    
    public function destroy($id)
    {
        $alunos = Students::findOrFail($id);
        $alunos->delete();
    }
}
