<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTranslatorRequest;
use App\Http\Requests\UpdateTranslatorRequest;
use App\Models\Translator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TranslatorController extends Controller
{
    public function index()
    {
        $translators = Translator::all()->sortBy('name');
        return view('translators.index',compact('translators'));
    }

    public function show(Translator $translator)
    {
        return view('translators.show', compact('translator'));
    }

    public function create()
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('translators.create');
    }

    public function store(StoreTranslatorRequest $request)
    {
        Translator::create($request->validated());

        return redirect()->route('panel');
    }


    public function edit(Translator $translator)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('translators.edit',compact('translator'));
    }

    public function update(UpdateTranslatorRequest $request, Translator $translator)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $translator->update($request->validated());
        return redirect()->route('panel');
    }

    public function destroy(Translator $translator)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $translator->delete();
        return redirect()->route('panel');
    }
}
