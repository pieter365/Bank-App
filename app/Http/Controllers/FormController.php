<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the form page.
     *
     */
    public function index() {
        return view('views.form.index');
    }

    /**
     * Submitted values from the form
     *
     */
    public function store() {

    	return true;
    } 
}
