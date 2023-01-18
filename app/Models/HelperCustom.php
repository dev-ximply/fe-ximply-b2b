<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HelperCustom extends Model
{
    use HasFactory;

    public static function exhange_format_date($date)
    {
        if (count(explode("/", $date)) > 1) {
            $explode = explode("/", $date);
            $day = $explode[0];
            $month = $explode[1];
            $year = $explode[2];
            return $year . "-" . $month . "-" . $day;
        } else {
            return $date;
        }
    }
        
    public static function upload_file_document(Request $request, $directory, $field, $nameofdoc)
    {
        $request->validate([
            $field => 'required|mimes:xlx,csv,jpg,png,pdf',
        ]);

        $fileName = time() . "_" . $nameofdoc . "." . $request[$field]->extension();

        $request[$field]->move(public_path('uploads/'.$directory), $fileName);

        return $fileName;
    }

    public static function generate_password($val1, $val2){
        $pass = Hash::make(time().$val1.$val2);
        return substr(str_shuffle($pass), 0, 8);
    }

    public static function number_normal($value){
        return str_replace(",", "", $value);
    }

}
