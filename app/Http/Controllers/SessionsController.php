<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class SessionsController extends Controller
{
    /**
     * Display a listing of the Sessions page.
     *@return session variable to blade page view
     */
    public function index() {

        //session()->flush('user'); //f//or testin to flash the sessions:: FOR TESTING ONLY 
		if(session()->has('user'))
		{
			//empty
		} else {
			session()->getId();
			session()->put('user', session()->getId());
		}

		if (session()->has('user.cards')) {
			$sessionData = session()->get('user.cards');
			$sessionData = array_filter(array_map('array_filter', $sessionData));
			//dd($sessionData);

			 foreach ($sessionData as $key => $part) {
			       $sort[$key] = strtotime($part[0]['expiryDate']);
			  }
			  array_multisort($sort, SORT_DESC, $sessionData);

		} else {
			$sessionData = false;
		}

        return view('pages.home', compact('sessionData'));
    }

    /**
     * Session details for the user
     *
     */
    public function sessionDetails($values) {

		session()->push('user.cards', $values);

    }    

    /**
     * Format the card number and send to the display
     *@return string new card number masked
     */
    public function sortCardDisplay ($creditCard, $maskFrom = 0, $maskTo = 4, $maskChar = 'x', $maskSpacer = '-') {

	    $creditCard       = str_replace(array('-', ' '), '', $creditCard);
	    $creditCardLength = strlen($creditCard);


	    if (empty($maskFrom) && $maskTo == $creditCardLength) {
	        $creditCard = str_repeat($maskChar, $creditCardLength);
	    } else {
	        $creditCard = substr($creditCard, 0, $maskFrom) . str_repeat($maskChar, $creditCardLength - $maskFrom - $maskTo) . substr($creditCard, -1 * $maskTo);
	    }

	    if ($creditCardLength > 4) {
	        $newNumber = substr($creditCard, -4);
	        for ($i = $creditCardLength - 5; $i >= 0; $i--) {
	            if ((($i + 1) - $creditCardLength) % 4 == 0) {
	                $newNumber = $maskSpacer . $newNumber;
	            }

	            $newNumber = $creditCard[$i] . $newNumber;
	        }
	    } else {
	        $newNumber = $creditCard;
	    }

	    return $newNumber;
	}


}
