<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LeapYearController extends Controller
{

    public function index(Request $request)
    {
        //Validation Logic---------
        $validator = $this->validateDate($request->all());
        if($validator["errors"]){
            return $validator;
        }

        //Date Logic ---------------
        $inputDate = $request->input('date');
        $data = $this->leapYear($inputDate);
        return $data;
    }


    private  function validateDate($request = null){

        $rules = array(
            'date'   => 'required|date_format:d-m-Y'
        );
        $messages = array(
            'date.date_format' => ":attribute  format is not correct, use dd-mm-YYYY"
        );

        //Laravel Validator logic here:
        //Docs https://laravel.com/docs/5.6/validation
        $validation = Validator::make($request, $rules, $messages);

        if( $validation->fails() ){
            $errors = $validation->errors()->getMessages();
            return array('errors'=>$errors);
        }

        return true;
    }


    private function leapYear($inputDate = null){
        //Docs https://carbon.nesbot.com/
        $carbon = Carbon::parse($inputDate);
        $date_valid = $carbon->toDateString();

        //get day name in ES
        setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
        $data["day_es"] =  ucfirst($carbon->formatLocalized("%A"));

        //get day name in CAT
        setlocale(LC_TIME, 'ca_ES', 'Catalan_Spain', 'Catalan');
        Carbon::setLocale('ca_ES');
        $data["day_cat"] = ucfirst($carbon->formatLocalized("%A"));

        //get year for given date
        $data["year"] = $carbon->year;

        //get is leap year
        $data["leapyear"] = $carbon->isLeapYear();

        //date converted
        $data["date"] = $date_valid;

        return $data;
    }

}
