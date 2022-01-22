<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all()->sortBy('name');
        return view('publishers.index',compact('publishers'));
    }

    public function show(Publisher $publisher)
    {
        return view('publishers.show', compact('publisher'));
    }

    public function create()
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('publishers.create');
    }

    public function store(StorePublisherRequest $request)
    {
        Publisher::create($request->validated());

        return redirect()->route('panel');
    }


    public function edit(Publisher $publisher)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('publishers.edit',compact('publisher'));
    }

    public function update(UpdatePublisherRequest $request, Publisher $publisher)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $publisher->update($request->validated());
        return redirect()->route('panel');
    }

    public function destroy(Publisher $publisher)
    {
        abort_if(Gate::denies('admin'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $publisher->delete();
        return redirect()->route('panel');
    }
}
