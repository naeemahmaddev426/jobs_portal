<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function create()
    {
        if(auth()->user()->company)
        {
            return redirect()
                ->route('employer.company.show');
        }

        return view('employer.company.create');
    }
     public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'website' => 'nullable|url',
            'location' => 'nullable|max:255',
            'description' => 'nullable',
        ]);

        Company::create([
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'website' => $validated['website'] ?? null,
            'location' => $validated['location'] ?? null,
            'description' => $validated['description'] ?? null,
        ]);

        return redirect('/employer/dashboard')
            ->with('success', 'Company Created Successfully');
    }
    public function show()
    {
        $company = auth()->user()->company;

        return view('employer.company.show', compact('company'));
    }
    public function edit()
    {
        $company = auth()->user()->company;

        return view('employer.company.edit', compact('company'));
    }
    public function update(Request $request)
    {
        $company = auth()->user()->company;

        $validated = $request->validate([
            'name' => 'required|max:255',
            'website' => 'nullable|url',
            'location' => 'nullable|max:255',
            'description' => 'nullable',
        ]);

        $company->update($validated);

        return redirect()
            ->route('employer.company.show')
            ->with('success', 'Company Updated Successfully');
    }
    public function destroy()
    {
        $company = auth()->user()->company;

        $company->delete();

        return redirect()
            ->route('employer.dashboard');
    }
}
