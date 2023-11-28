<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentOrganization;

class StudentOrganizationController extends Controller
{
    public function index()
    {
        
    }


    public function showRSOList()
{
    // Assuming $categories is an array of categories with their respective organizations
    $categories = [
        [
            'title' => 'Academic',
            'organizations' => [
                ['id' => '1', 'name' => 'Organization 1'],
                ['id' => '2', 'name' => 'Organization 2'],
                // Other organizations
            ]
        ],
        [
            'title' => 'Co-Academic',
            'organizations' => [
                ['id' => '3', 'name' => 'Organization 3'],
                ['id' => '4', 'name' => 'Organization 4'],
                // Other organizations
            ]
        ],
        // Other categories
    ];

    return view('student_orgs.rso_list', compact('categories'));
}

public function showRSODetail(Request $request)
    {
        $content = $request->query('content');

    
    $organizations = [];

    if ($content === 'academic') {
        $organizations = [
            ['id' => '1', 'name' => 'Organization A'],
            ['id' => '2', 'name' => 'Organization B'],
           
        ];
    } elseif ($content === 'co-academic') {
        $organizations = [
            ['id' => '3', 'name' => 'Organization C'],
            ['id' => '4', 'name' => 'Organization D'],
            
        ];
    }
    

    return view('student_orgs.rso_detail', compact('content', 'organizations'));
    }

}


