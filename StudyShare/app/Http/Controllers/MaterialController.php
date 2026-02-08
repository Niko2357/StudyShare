<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::with(['user', 'subject', 'category', 'files'])
            ->latest()
            ->get();
        return response()->json($materials);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id', 
            'file' => 'required|file|max:10240', 
        ]);

        if ($request->hasFile('file')) {
            $uploadedFile = $request->file('file');
            $path = $uploadedFile->store('uploads', 'public'); 

            $material = Material::create([
                'title' => $validatedData['title'],
                'subject_id' => $validatedData['subject_id'],
                'category_id' => $validatedData['category_id'],
                'user_id' => $validatedData['user_id'],
                'description' => $request->description, 
                'grade_level' => $request->grade_level,
            ]);
            File::create([
                'material_id' => $material->id,
                'file_name' => $uploadedFile->getClientOriginalName(),
                'file_url' => Storage::url($path), 
                'file_type' => $uploadedFile->extension(),
                'file_size' => $uploadedFile->getSize(),
            ]);

            return response()->json([
                'message' => 'Materiál byl úspěšně nahrán!',
                'material' => $material
            ], 201);
        }

        return response()->json(['message' => 'Soubor nebyl nahrán'], 400);
    }

    public function show($id)
    {
        $material = Material::with(['user', 'subject', 'files'])->find($id);
        if (!$material) {
            return response()->json(['message' => 'Materiál nenalezen'], 404);
        }
        return response()->json($material);
    }
}
