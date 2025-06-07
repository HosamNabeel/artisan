<?php

namespace App\Http\Controllers;


class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('index');
    }

    // public function register() {
    //     return view('auth.register');
    // }

    // public function login() {
    //     return view('auth.login');
    // }
}
