<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class PlanSearchController extends PlanController
{
    public function __invoke(Request $request)
    {
        $filters = $request->except('_token');
        $plans = $this->repository->search($request->input('filter'));

        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters
        ]);
    }

}
