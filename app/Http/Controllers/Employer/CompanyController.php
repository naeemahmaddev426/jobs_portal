<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function create()
    {
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
}
