<?php

namespace App\Http\Controllers\Site\Unionize;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unionized;
use App\Models\UnionizedFile;
use Barryvdh\DomPDF\Facade\Pdf;


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
        $cpf = preg_replace('/[^0-9]/', '', $request->input('personalData')['cpf']['value']);
        $unionized = new Unionized();

        $checkUnionized = Unionized::where('cpf', $cpf)->first();
        if ($checkUnionized) {
            if ($checkUnionized->status !== 'started') {
                abort(500, 'Not possible update register');
            }
            $unionized = $checkUnionized;
        }

        $unionized->bank = $request->input('commercialData')['bank']['value'];
        $unionized->code_bank = $request->input('commercialData')['codeBank']['value'];
        $unionized->agency = $request->input('commercialData')['agency']['value'];
        $unionized->admission_date = $this->convertToValidDate($request->input('commercialData')['admissionDate']['value']);
        $unionized->commercial_phone = preg_replace('/[^0-9]/', '', $request->input('commercialData')['phone']['value']);

        $unionized->extension = $request->input('commercialData')['extension']['value'];
        $unionized->already_associated = $request->input('commercialData')['alreadyAssociated']['value'];
        $unionized->registration = $request->input('commercialData')['registration']['value'];
        $unionized->position = $request->input('commercialData')['position']['value'];
        $unionized->commercial_email = $request->input('commercialData')['commercialEmail']['value'];

        $unionized->name = $request->input('personalData')['name']['value'];
        $unionized->cpf = preg_replace('/[^0-9]/', '', $request->input('personalData')['cpf']['value']);
        $unionized->rg = $request->input('personalData')['rg']['value'];
        $unionized->issuing_authority = $request->input('personalData')['issuingAuthority']['value'];
        $unionized->birth = $this->convertToValidDate($request->input('personalData')['birth']['value']);
        $unionized->gender = $request->input('personalData')['gender']['value']['value'];
        $unionized->color = $request->input('personalData')['color']['value']['value'];
        $unionized->marital_status = $request->input('personalData')['maritalStatus']['value'];
        $unionized->email = $request->input('personalData')['email']['value'];
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
        $unionized->auth_account = $request->input('authorizationData')['account']['value'];

        $unionized->save();

        return $unionized;
    }

    public function registerPdfFile(Request $request)
    {
        if (! $request->file('pdf_file')) {
            abort(500, 'File not found');
        }
        $cpf = $request->input('cpf');
        $unionized = new Unionized();
        $findUnionized = $unionized->where('cpf', $cpf)->where('status', 'started')->first();
        if (!$findUnionized) {
            abort(500, 'Not found');
        }

        if ($findUnionized->unionized_file_id) {
            $findUnionized = $this->deleteFile($findUnionized);
        }

        $file = $this->addUnionizeFile($request, $findUnionized->id);
        $findUnionized->unionized_file_id = $file->id;
        $findUnionized->status = 'completed';
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

    public function getByCpf(Request $request)
    {
        $cpf = preg_replace('/[^0-9]/', '', $request->input('cpf'));
        $unionized = new Unionized();
        $findUnionized = $unionized->where('cpf', $cpf)->where('status', 'started')->first();
        if (!$findUnionized) {
            abort(500, 'Not found');
        }

        return $findUnionized;
    }

    public function print(Request $request, string $cpf)
    {
        $unionized = new Unionized();
        // $unionized = $unionized->where('cpf', $cpf)->where('status', 'started')->get()->toArray()[0] ?? null;
        $unionized = $unionized->where('cpf', $cpf)->get()->toArray()[0] ?? null;
        if (!$unionized) {
            abort(500, 'Not found');
        }

        $commercial_phone = $unionized['commercial_phone'];
        if (strlen($commercial_phone) >= 10)
            $unionized['commercial_phone'] = "({$commercial_phone[0]}{$commercial_phone[1]}) {$commercial_phone[2]}{$commercial_phone[3]}{$commercial_phone[4]}{$commercial_phone[5]} {$commercial_phone[6]}{$commercial_phone[7]}{$commercial_phone[8]}{$commercial_phone[9]}";
        $cpf = $unionized['cpf'];
        if (strlen($cpf) >= 11)
            $unionized['cpf'] = "{$cpf[0]}{$cpf[1]}{$cpf[2]}.{$cpf[3]}{$cpf[4]}{$cpf[5]}.{$cpf[6]}{$cpf[7]}{$cpf[8]}.{$cpf[9]}{$cpf[10]}";
        $admission_date = $unionized['admission_date'];
        if (strlen($admission_date) >= 10) {
            $admission_date = explode('-', $admission_date);
            $unionized['admission_date'] = "{$admission_date[2]}/{$admission_date[1]}/{$admission_date[0]}";
        }
        $birth = $unionized['birth'];
        if (strlen($birth) >= 10)
            $birth = explode('-', $birth);
            $unionized['birth'] = "{$birth[2]}/{$birth[1]}/{$birth[0]}";
        $phone = $unionized['phone'];
        if (strlen($phone) >= 10)
            $unionized['phone'] = "({$phone[0]}{$phone[1]}) {$phone[2]}{$phone[3]}{$phone[4]}{$phone[5]} {$phone[6]}{$phone[7]}{$phone[8]}{$phone[9]}";
        $cellphone = $unionized['cellphone'];
        if (strlen($cellphone) >= 11)
            $unionized['cellphone'] = "({$cellphone[0]}{$cellphone[1]}) {$cellphone[2]}{$cellphone[3]}{$cellphone[4]}{$cellphone[5]}{$cellphone[6]} {$cellphone[7]}{$cellphone[8]}{$cellphone[9]}{$cellphone[10]}";

        $pdf = Pdf::setPaper('A4')
        //          ->setOption(['dpi' => 150])
                    ->setOption(['dpi' => 300])
                    ->loadView('unionize', $unionized);
        $pdf->render();
        // preg_replace('/[^a-zA-Z0-9]/', '_', $string)
        $file = preg_replace('/[^a-zA-Z0-9]/', '_', $unionized['name']);
        $fileName = "Sindbancarios_-_Ficha_de_Sindicalização_-_{$file}.pdf";
        return $pdf->download($fileName);
        // return view('unionize');
    }
}

//
