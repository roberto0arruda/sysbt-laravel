<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreUpdatePlan;
use App\Models\Admin\Plan;
use App\Support\Http\Controllers\Controller;

class PlanController extends Controller
{
    protected $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|resource
     */
    public function index()
    {
        $plans = $this->repository->latest()->paginate();

        return view('admin.pages.plans.index', [
            'plans' => $plans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pages.plans.create-or-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUpdatePlan $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(StoreUpdatePlan $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('plans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Plan $plan
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show(Plan $plan)
    {
        if (!$plan)
            return redirect()->back();

        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Admin\Plan $plan
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Plan $plan)
    {
        return view('admin.pages.plans.create-or-edit', ['plan' => $plan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreUpdatePlan $request
     * @param \App\Models\Admin\Plan $plan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreUpdatePlan $request, Plan $plan)
    {
        if (!$plan)
            return redirect()->back();

        $plan->update($request->all());

        return redirect()->route('plans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $url
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan)
            return redirect()->back();

        $plan->delete();

        return redirect()->route('plans.index');
    }
}
