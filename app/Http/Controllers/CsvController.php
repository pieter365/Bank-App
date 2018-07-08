<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CsvController extends Controller
{
    /**
     * Display a listing of the CSV Form upload page.
     *
     */
    public function index() {
        return view('views.csv');
    }

    /**
     * Submitted values from the form
     *
     */
    public function store() {

    	return true;
    }    
}
