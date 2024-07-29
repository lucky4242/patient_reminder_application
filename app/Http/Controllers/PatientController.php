<?php

namespace App\Http\Controllers;


use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;

class PatientController extends Controller
{
    public function addPatientForm()
    {
        return view('add-patient');
    }

    public function addPatient(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'drug_name' => 'required|string|max:255',
            'dosage' => 'required|string|max:255',
            'reminder_time' => 'required|date_format:H:i',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new patient
        $patient = new Patient();
        $patient->name = $request->name;
        $patient->phone_number = $request->phone_number;
        $patient->email = $request->email;
        $patient->gender = $request->gender;
        $patient->drug_name = $request->drug_name;
        $patient->dosage = $request->dosage;
        $patient->reminder_time = $request->reminder_time;
        $patient->save();

        // $this->sendMedicationReminders();
        return redirect()->back()->with('success', 'Patient added successfully.');
        // return redirect()->route("send-medication-reminders")->with('success', 'Patient added successfully.');
    }



    public function sendMedicationReminders(Request $request)
    {

        // Get patients whose medication is due and reminder time is equal to or before the current time
        $currentTime = now()->format('H:i') . ":00";
        $patients = Patient::where('reminder_time', '<=', $currentTime)->get();
        echo now()->format('H:i');

        // Send reminders to each patient
        foreach ($patients as $patient) {
            $this->placeCallReminder($patient);
            echo "your call";
        }
        // return redirect()->route('send-medication-reminders');

    }

    private function placeCallReminder($patient)
    {
        $twilioAccountSid = env('TWILIO_SID');
        $twilioAuthToken = env('TWILIO_TOKEN');
        $twilioPhoneNumber = env('TWILIO_PHONE_NUMBER');

        $client = new Client($twilioAccountSid, $twilioAuthToken);

        // Adjust the message according to your requirements
        $message = "Hi $patient->name, this is a reminder to take your medication: $patient->drug_name. Dosage: $patient->dosage.";

        // Initiate a call
        $client->calls->create(
            $patient->phone_number,
            $twilioPhoneNumber,
            ['twiml' => '<Response><Say>  ' . $message  . '.</Say></Response>']
        );
    }
}
