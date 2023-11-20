<?php

namespace App\Http\Controllers\Site\Unionize;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unionized;
use App\Models\UnionizedFile;


class UnionizeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api'
    }

    private function convertToValidDate(string $data): string
    {
        $data =  str_replace(' ', '', $data);
        $data = explode('/', $data);
        $data = "{$data[2]}-{$data[1]}-{$data[0]}";
        return $data;
    }

    public function register(Request $request)
    {
        $email = $request->input('personalData')['email']['value'];
        $unionized = new Unionized();

        $checkUnionized = Unionized::where('email', $email)->first();
        if ($checkUnionized) {
            if ($checkUnionized->status !== 'started') {
                abort(500, 'Not possible update register');
            }
            $unionized = $checkUnionized;
        }

        $unionized->bank = $request->input('commercialData')['bank']['value'];
        $unionized->code_bank = $request->input('commercialData')['codeBank']['value'];
        $unionized->agency = $request->input('commercialData')['agency']['value'];
        $unionized->commercial_phone = preg_replace('/[^0-9]/', '', $request->input('commercialData')['phone']['value']);

        $unionized->extension = $request->input('commercialData')['extension']['value'];
        $unionized->already_associated = $request->input('commercialData')['alreadyAssociated']['value'];
        $unionized->registration = $request->input('commercialData')['registration']['value'];
        $unionized->position = $request->input('commercialData')['position']['value'];
        $unionized->commercial_email = $request->input('commercialData')['commercialEmail']['value'];

        $unionized->name = $request->input('personalData')['name']['value'];
        $unionized->cpf = preg_replace('/[^0-9]/', '', $request->input('personalData')['cpf']['value']);
        $unionized->rg = $request->input('personalData')['rg']['value'];
        $unionized->birth = $this->convertToValidDate($request->input('personalData')['birth']['value']);
        $unionized->sex = $request->input('personalData')['sex']['value'];
        $unionized->marital_status = $request->input('personalData')['maritalStatus']['value'];
        $unionized->email = $email;
        $unionized->phone = preg_replace('/[^0-9]/', '', $request->input('personalData')['phone']['value']);
        $unionized->cellphone = preg_replace('/[^0-9]/', '', $request->input('personalData')['cellphone']['value']);
        $unionized->home_address = $request->input('personalData')['homeAddress']['value'];
        $unionized->number = $request->input('personalData')['number']['value'];
        $unionized->complement = $request->input('personalData')['complement']['value'];
        $unionized->neighborhood = $request->input('personalData')['neighborhood']['value'];
        $unionized->city = $request->input('personalData')['city']['value'];
        $unionized->state = $request->input('personalData')['state']['value']['value'];

        $unionized->auth_agree = $request->input('authorizationData')['confirm']['value'];
        $unionized->auth_bank = $request->input('authorizationData')['bank']['value'];
        $unionized->auth_code_bank = $request->input('authorizationData')['codeBank']['value'];
        $unionized->auth_agency = $request->input('authorizationData')['agency']['value'];

        $unionized->save();

        return $unionized;
    }

    public function registerPdfFile(Request $request)
    {
        if (! $request->file('pdf_file')) {
            abort(500, 'File not found');
        }
        $email = $request->input('email');
        $unionized = new Unionized();
        $findUnionized = $unionized->where('email', $email)->where('status', 'started')->first();
        if (!$findUnionized) {
            abort(500, 'Not found');
        }

        if ($findUnionized->unionized_file_id) {
            $findUnionized = $this->deleteFile($findUnionized);
        }

        $file = $this->addUnionizeFile($request, $findUnionized->id);
        $findUnionized->unionized_file_id = $file->id;
        $findUnionized->save();

        return $findUnionized;
    }

    private function deleteFile($unionized)
    {
        $file = new UnionizedFile();
        $file = $file->find($unionized->unionized_file_id);
        $unionized->unionized_file_id = null;
        $unionized->save();

        $path = public_path($file->path) . '/' . $file->file_name;
        if (unlink($path)) {
            $file->delete();
        }

        return $unionized;
    }

    private function addUnionizeFile(Request $request, $id)
    {
        $file = $request->file('pdf_file');
        $name = 'document_agree';
        $description = 'Signed document';

        // Obtém as informações do arquivo
        $fileMimeType = $file->getClientMimeType(); // Mimetype do arquivo
        $fileExtension = $file->getClientOriginalExtension(); // Extensão do arquivo
        $fileSize = $file->getSize(); // Tamanho do arquivo em bytes

        // $fileName = $file->getClientOriginalName();
        $fileName = $id . '_' . uniqid() . '.' . $fileExtension;

        // Mova o arquivo para a pasta desejada
        if ($file->move(public_path('unionize'), $fileName))
        {
            $file = new UnionizedFile();
            $file->path = 'unionize';
            $file->name = $name;
            $file->file_name = $fileName;
            $file->description = $description;
            $file->mime_type = $fileMimeType;
            $file->extension = $fileExtension;
            $file->size = $fileSize;
            $file->save();
        }

        return $file;
    }

    public function getByEmail(Request $request)
    {
        $email = $request->input('email');
        $unionized = new Unionized();
        $findUnionized = $unionized->where('email', $email)->where('status', 'started')->first();
        if (!$findUnionized) {
            abort(500, 'Not found');
        }

        return $findUnionized;
    }
}
