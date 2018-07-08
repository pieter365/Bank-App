<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Lib\Controllers\PHPSessionXHandler;

class SessionsController extends Controller
{
    /**
     * Display a listing of the Sessions page.
     *
     */
    public function index() {
        //this is were we are going to check for the sessions
        $sessionData = 'dummy data';
        return view('views.home', compact('sessionData'));
    }

    /**
     * Session deatils for the user
     *
     */
    public function sessionDetails() {

    	return true;
    }    

}
