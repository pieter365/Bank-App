<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SessionsController;

class FormController extends Controller
{
    /**
     * Display a listing of the form page.
     *
     */
    public function index() {
        return view('pages.form');
    }

    /**
     * Submitted values from the form
     *
     */
    public function create(Request $input) {

    	$cardDetails = array();
    	$store = new SessionsController();

    	$bankName 		= request('bank');
    	$cardNumber 	= request('card_number');
    	$cardDate 		= request('card_date');
    	 
    	//format the date
    	$cardStoreDate = date('M-Y', strtotime($cardDate));

    	//format the cardNumber
    	$cardNumber = $store->sortCardDisplay($cardNumber);


        $cardDetails[] = array(
            "bank" => $bankName,
            "cardNumber" => $cardNumber,
            "expiryDate" =>  $cardDate
        );


    	$store->sessionDetails($cardDetails);

    	return redirect('/');
    } 
}
