<?php

namespace App\Http\Controllers;

class ContentController extends Controller
{
    public function content1()
    {
        return view('pages.domain.content1');
    }

    public function content2()
    {
        return view('pages.domain.content2');
    }

    public function content2Step1()
    {
        return view('pages.domain.content2.step1');
    }

    public function content2Step2()
    {
        return view('pages.domain.content2.step2');
    }
}
