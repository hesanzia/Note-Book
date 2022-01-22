<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use App\Models\Translator;
use App\Models\User;
use App\Models\Writer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $writers = Writer::all()->sortBy('name');
        $books = Book::all()->sortBy('name');
        $translators = Translator::all();
        $publishers = Publisher::all();
        return view('home',compact('writers','books','publishers','translators'));
    }

    public function panel()
    {
        $writers = Writer::all();
        $books = Book::all();
        $translators = Translator::all();
        $publishers = Publisher::all();
        $users = User::all();

        return view('panel',compact('writers','books','publishers','translators','users'));
    }

    public function search()
    {
        $search = $_GET['search'];
        $writers = Writer::where('name','LIKE','%'.$search. '%')->get();
        $translators = Translator::where('name','LIKE','%'.$search. '%')->get();
        $publishers = Publisher::where('name','LIKE','%' .$search. '%')->get();
        $books = Book::where('name','LIKE','%' .$search. '%')->get();
        return view('search.search',compact('writers','translators','publishers','books'));
    }
}
