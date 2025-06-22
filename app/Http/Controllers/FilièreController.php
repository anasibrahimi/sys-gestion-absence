<?php

namespace App\Http\Controllers;

use App\Models\Filière;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FilièreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $filières = Filière::all();
        return view('absence.filiere-page', compact('filières'));
    }
} 