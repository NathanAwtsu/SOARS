@extends('navbar.navbar_osa')
@section('content')

<main>
    <div class="container-report-list">
    
        <div class="table-responsive"> <!-- Add this div to make the table responsive -->
            <table class="table table-bordered table-center"> <!-- Added table-center class -->
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Organization Name</th>
                        <th>Organization Type</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($org_activation as $org)
                        
                    
                    <tr>
                        <td>
                            @if ($org->requirement_status != 'Approved')
                            @php
                                $rounded = round($org->requirement_status);
                            @endphp
                            {{$rounded}}% out of 100
                            @endif

                            @if ($org->requirement_status == 'Approved')
                            Approved
                            @endif
                        </td>
                        <td>{{$org->name}}</td>
                        <td>{{$org->type_of_organization}}</td>
                        <td>

                            <a href="{{url('/osaemp/organization_list/pending_edit/'.$org->id)}}">Edit</a>
                            <a href="{{url('/')}}">Delete</a>
                        </td>
                    </tr>
                   
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

  
</main>
  


@extends('layouts.footer')
@endsection