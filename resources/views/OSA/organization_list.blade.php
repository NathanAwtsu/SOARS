@extends('navbar.navbar_osa')

@section('content')

<div class="container-tbl-up">
            
            
    <table class="table"> <br>
        
        <div class="btn-group">
            <a class="btn btn-create" type="button" id="createUserButton" style="margin-right: 20px;" href="{{url('/osaemp/organization_list/new_organization')}}">Create New Organization</a>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Organization Category
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Academic</a></li>
                    <li><a class="dropdown-item" href="#">Co-Academic</a></li>
                    <li><a class="dropdown-item" href="#">Socio-Civic</a></li>
                </ul>
            </div>
        </div>
           
        <Center>
            @if($pendings != null)
                <div class="card-table-title">
                    <h1>PENDING</h1><br>
                </div>
                <div class="card-table">
                    @foreach ($pendings as $pend)
                        @if($pend != Null)
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    @if ($pend->requirement_status != "100")
                                        <progress id="file" value="{{$pend->requirement_status}}" max="100"></progress>
                                    @endif
                                    <img src="{{ asset('storage/app/public/'.$pend->logo) }}" alt="Image">
                                    <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                        <a href="{{url('')}}" style="text-decoration: none; display: block;">
                                            <h5 class="card-title" style="color: white; margin: 0; padding: 10px; max-height: 100%; overflow: hidden; text-overflow: ellipsis; text-align: center;">
                                                {{$pend->name}}
                                            </h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif

            <div class="card-table-title"> <H1>ACADEMIC</H1><br> </div>
                <div class="card-table">
                    @foreach ($organizationAcademic as $key => $orgAcads)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            @if ($orgAcads->requirement_status != "100")
                            <progress id="file" value="{{$orgAcads->requirement_status}}" max="100"></progress>
                            @endif
                            <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                <a href="{{url('')}}" style="text-decoration: none; display: block;">
                                    <h5 class="card-title" style="color: white; margin: 0; padding: 10px; max-height: 100%; overflow: hidden; text-overflow: ellipsis; text-align: center;">
                                        
                                    </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                
            
            <div class="card-table-title"> <H1>CO-ACADEMIC</H1><br> </div>
            <div class="card-table">
                @foreach ($organizationCoAcademic as $key => $orgCoAcad)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                        
                        @if ($orgCoAcads->logo = null)
                        <img src="" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        @endif
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="{{url('')}}" style="text-decoration: none; display: block;">
                                <h5 class="card-title" style="color: white; margin: 0; padding: 10px; max-height: 100%; overflow: hidden; text-overflow: ellipsis; text-align: center;">
                                    {{$orgCoAcads->name}}
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="card-table-title"> <H1>SOCIO-CIVIC</H1><br> </div>
            <div class="card-table">
                @foreach ($organizationSocioCivic as $key => $orgSocioCivic)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                        
                        @if ($orgSocioCivic->logo = null)
                        <img src="" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        @endif
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="{{url('')}}" style="text-decoration: none; display: block;">
                                <h5 class="card-title" style="color: white; margin: 0; padding: 10px; max-height: 100%; overflow: hidden; text-overflow: ellipsis; text-align: center;">
                                    {{$orgCivic->name}}
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="card-table-title"> <H1>RELIGIOUS</H1><br> </div>
            <div class="card-table">
                @foreach ($organizationReligious as $key => $orgRel)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                        
                        @if ($orgRel->logo = null)
                        <img src="" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        @endif
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="{{url('')}}" style="text-decoration: none; display: block;">
                                <h5 class="card-title" style="color: white; margin: 0; padding: 10px; max-height: 100%; overflow: hidden; text-overflow: ellipsis; text-align: center;">
                                    {{$orgRel->name}}
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </Center>
        
    </table>
    
     </div>
     

</div>



</div>

<script>
    // Show the modal when the button is clicked
    document.getElementById("createUserButton").addEventListener("click", function() {
        $('#createUserModal').modal('show');
    });
</script>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection

@extends('layouts.footer')