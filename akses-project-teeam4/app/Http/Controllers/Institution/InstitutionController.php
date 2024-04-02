<?php

namespace App\Http\Controllers\Institution;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

use App\Models\Institution;


class InstitutionController extends Controller
{
    public function showInstitutionForm() 
    {
        return view('Institution.create-institution');
    }

    public function creatingImageName($hashedName) 
    {
        $imageName = explode('/', $hashedName);
        return $imageName[1];
    }

    public function showVerificationInfo() 
    {
        return view('Institution.information-page-institution');
    }

    public function showVerificationStatus() 
    {
        return view('Institution.check-status');
    }

    public function VerificationStatus(Request $request) 
    {
        $institution = Institution::where('institution_ticket_code', $request->institution_ticket)->first();
        return view('Institution.status-result')->with(compact('institution'));
    }

    public function store(Request $request) 
    {
        try {

            $institutionData = $request->validate([
                'institution_name' => 'required|unique:institutions',
                'institution_phone' => 'required|unique:institutions',
                'institution_address' => 'required',
                'institution_chairman' => 'required',
                'institution_status' => 'nullable',
                'institution_evidence' => 'required|file|mimes:png,jpg|max:2048',
            ]);
    
            $hashedName = $request->file('institution_evidence')->store('verification-evidence');
    
            $institution = new Institution;
            $institution->institution_name = $institutionData['institution_name'];
            $institution->institution_phone = $institutionData['institution_phone'];
            $institution->institution_address = $institutionData['institution_address'];
            $institution->institution_chairman = $institutionData['institution_chairman'];
            $institution->institution_evidence = $this->creatingImageName($hashedName);
            $institution->institution_ticket_code = Str::random(8) . uniqid();;
            $institution->institution_status = 'pending';
            $institution->save();

            Session::flash('ticket-request-success', 'Proses Pengajuan Verifikasi Institutasi Berhasil!');

            $requestTicket = $institution->institution_ticket_code;

            $resultData = [
                'ticket' => $requestTicket,
                'institution_name' => $institutionData['institution_name'],
                'institution_address' => $institutionData['institution_address'],
                'institution_phone' => $institutionData['institution_phone']
            ];

            return redirect(url('/health-institution/verification'))->with('resultData', $resultData);

        } catch (\Illuminate\Validation\ValidationException $error) {
            dd($error);
        }
    }
}
