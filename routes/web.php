<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('add-patient');
});


Route::get('/add-patient', [PatientController::class, 'addPatientForm']);
Route::post('/add-patient', [PatientController::class, 'addPatient']);
Route::get('/send-reminder', [PatientController::class, 'sendReminder']);
// Route::post('/send-medication-reminders', [PatientController::class, 'sendMedicationReminders'])->name('send-medication-reminders');

Route::get('/send-medication-reminders', [PatientController::class, 'sendMedicationReminders'])->name('send-medication-reminders');


// Define other routes as needed
