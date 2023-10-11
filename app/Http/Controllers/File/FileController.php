<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File as ModelFile;
use App\Models\News;

class FileController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function list()
    {
        $file = new ModelFile();
        $file = $file->orderBy('id', 'desc')->get();

        return $file;
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

    public function update(Request $request)
    {
        $id = $request->input('id');

        $update = ModelFile::find($id);
        $update->name = $request->input('name');
        $update->description =$request->input('description');

        $file = $request->file('file_gallery');
        if ($file) {
            $filePath = public_path($update->path) . '/' . $update->file_name;
            unlink($filePath);
            // Obtém as informações do arquivo
            $fileMimeType = $file->getClientMimeType(); // Mimetype do arquivo
            $fileExtension = $file->getClientOriginalExtension(); // Extensão do arquivo
            $fileSize = $file->getSize(); // Tamanho do arquivo em bytes

            $user = auth()->user();
            // $fileName = $file->getClientOriginalName();
            $fileName = $user->id . '_' . uniqid() . '.' . $fileExtension;
            $file->move(public_path('gallery'), $fileName);

            $update->file_name = $fileName;
            $update->mime_type = $fileMimeType;
            $update->extension = $fileExtension;
            $update->size = $fileSize;
        }

        $update->save();

        return $update;
    }

    public function delete(Request $request)
    {
        $return = [
            'error' => []
        ];
        $id = $request->input('id');

        $fileFounded = new News();
        $fileFounded = $fileFounded->where('banner_desktop_id', $id)
                                    ->orWhere('banner_mobile_id', $id)
                                    ->orWhere('image_news_id', $id)
                                    ->orWhere('audio_news_id', $id)
                                    ->get()->toArray();

        foreach ($fileFounded as $value)
        {
            $return['error'][] = $value['title'];
        }

        if (count($return['error']))
        {
            return $return;
        }


        $file = ModelFile::find($id);

        $path = public_path($file->path) . '/' . $file->file_name;
        if (unlink($path)) {
            $file->delete();
        }

        return $return;
    }
}
