<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Translator;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }
    public function create()
    {
        $writers = Writer::all()->sortBy('name');
        $translators = Translator::all()->sortBy('name');
        $publishers = Publisher::all()->sortBy('name');
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('books.create', compact('writers','translators','publishers'));
    }

    public function store(StoreBookRequest $request)
    {
        Book::create($request->validated());

        return redirect()->route('panel');
    }

    public function edit(Book $book)
    {
        $writers = Writer::all()->sortBy('name');
        $translators = Translator::all()->sortBy('name');
        $publishers = Publisher::all()->sortBy('name');
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('songs.edit',compact('writers','translators','publishers','book'));
    }

    public function update(UpdateBookRequest $request , Book $book)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $book->update($request->validated());
        return redirect()->route('panel');
    }

    public function destroy(Book $book)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $book->delete();
        return redirect()->route('panel');
    }
}
