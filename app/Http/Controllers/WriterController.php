<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWriterRequest;
use App\Http\Requests\UpdateWriterRequest;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class WriterController extends Controller
{

    public function show(Writer $writer)
    {
        return view('writers.show', compact('writer'));
    }

    public function create()
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('writers.create');
    }

    public function store(StoreWriterRequest $request)
    {
        Writer::create($request->validated());

        return redirect()->route('panel');
    }

    public function edit(Writer $writer)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('writers.edit',compact('writer'));
    }

    public function update(UpdateWriterRequest $request, Writer $writer)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $writer->update($request->validated());
        return redirect()->route('panel');
    }

    public function destroy(Writer $writer)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $writer->delete();
        return redirect()->route('panel');
    }
}
