<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File as ModelFile;

class FileController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function add(Request $request)
    {
        $request->validate([
            // 'file_gallery' => 'required|file|mimes:jpg,png,pdf,audio/mp3,pdf|max:2048', // Defina as validações apropriadas para o seu caso
            'name' => 'required|string', // Defina as validações apropriadas para o seu caso
            // 'description' => 'string', // Defina as validações apropriadas para o seu caso
        ]);

        $file = $request->file('file_gallery');
        $name = $request->input('name');
        $description = $request->input('description');

        // Obtém as informações do arquivo
        $fileMimeType = $file->getClientMimeType(); // Mimetype do arquivo
        $fileExtension = $file->getClientOriginalExtension(); // Extensão do arquivo
        $fileSize = $file->getSize(); // Tamanho do arquivo em bytes

        $user = auth()->user();
        // $fileName = $file->getClientOriginalName();
        $fileName = $user->id . '_' . uniqid() . '.' . $fileExtension;

        // Mova o arquivo para a pasta desejada
        if ($file->move(public_path('gallery'), $fileName))
        {
            $file = new ModelFile();
            $file->path = 'gallery';
            $file->name = $name;
            $file->file_name = $fileName;
            $file->description = $description;
            $file->mime_type = $fileMimeType;
            $file->extension = $fileExtension;
            $file->size = $fileSize;
            $file->save();
        }

        return json_encode($file);
    }

    public function list()
    {
        $file = new ModelFile();
        $file = $file->all();

        return $file;
    }
}
