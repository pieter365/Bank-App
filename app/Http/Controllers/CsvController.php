<?php

namespace App\Http\Controllers;

use App\CsvData;
use App\Http\Requests\CsvImportRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\SessionsController;

class CsvController extends Controller
{
    /**
     * Display a listing of the CSV Form upload page.
     *
     */
    public function index() {
        return view('pages.csv');
    }

    /**
    * Handle the CSV import
    *
    */
    public function parseImport(CsvImportRequest $request)
    {

		$store = new SessionsController();

        $delimiter = ';';
        $enclosure = '"';
        $escape = '\\';
        $cardDetails = array();

        $path = $request->file('csv_file')->getRealPath();
        $imported = array();

        $data = array_map('str_getcsv', file($path));

        if (count($data) > 0) {

                $csv_header_fields = [];
                foreach ($data[0] as $key => $value) {
                    $csv_header_fields[] = $key;
                }

                unset($data[0]);

                foreach ($data as $key => $value) {

                    $columnValues = str_getcsv($value[0], $delimiter, $enclosure, $escape);

                    //format the cardNumber
    				$cardNumber = $store->sortCardDisplay($columnValues[1]);

    				//format the date
    				$cardStoreDate = date('M-Y', strtotime($columnValues[2]));
    				
                    $cardDetails[] = array(
                        "bank" => $columnValues[0],
                        "cardNumber" => $cardNumber,
                        "expiryDate" =>  $cardStoreDate
                    );
                }

		$store = new SessionsController();
        $store->sessionDetails($cardDetails);

        } else {
            return redirect()->back();
        }

        return redirect('/');

    }   


}
