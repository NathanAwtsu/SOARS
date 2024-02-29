@extends('navbar.admin_nav')

@section('content')    
    <main >
        <Center>
            <div class="card-table-title"> <H1>ACADEMIC</H1> </div>
            <div class="card-table">
    
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center;  min-height: 185px;">
                        <img src="photos/acomms_logo.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="ACOMSSadmin.html" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; max-height: 100%; overflow: hidden; text-overflow: ellipsis; text-align: center;">
                                    Adamson Computer Science Students Society (ACOMSS) 
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center;  min-height: 185px;">
                        <img src="photos/svst-logo.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Adamson University and St. Vincent School of Theology (AdUSVST SOPHIA)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/aubs-logo.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="{{ route('rso_detail')}}" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; max-height: 100%; overflow: hidden; text-overflow: ellipsis; text-align: center;"> 
                                Adamson University Biology Society (AUBS)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/aduchess-logo.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center; ">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Adamson University Chemical Engineering Student Society (ADUCHESS)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/aucs-logo.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Adamson University Chemical Society (AUCS)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/adu-ispe_logo.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Adamson University College of Pharmacy Student Chapter of International Society for Pharmaceutical Engineering (AdU-ISPE)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/acoes-logo.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Adamson University Computer Engineering Society (ACOES)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/aducares-logo.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Adamson University Concerned Adamsonians for Responsible and Empathetic Support (AdU-CARES)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Adamson University Electrical Engineering Student Society (AUEESS)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Adamson University Electronics and Communications Engineering Students Society (AUECESS)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div> <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Adamson University Guild of Animation Makers and Esports (AdU-GAME)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div> <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Adamson University Information Technology and Management Society (AdU-IT & M Society)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div> <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Adamson University Junior Marketing Association (ADJMA)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div> <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Adamson University Mechanical Engineering Society (AUMES)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div> <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Adamson University Mining Engineering and Geology Association (AUMEGA)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div> <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Adamson University Psychological Society (AUPS)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div> <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Adamson University Student Nurses Association (AUSNA)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>  <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Adamson University Young Educators Association (AUYEA)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div> <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Adamson University-Association of Civil Engineering Students (ADU-ACES)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div> <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    AdU-PULITIKA
                                </h6>
                            </a>
                        </div>
                    </div>
                </div> <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Association of Hospitality Management Students (AHMS)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div> <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Creative Communicators Society of Adamson University (CreaComms) 
                                </h6>
                            </a>
                        </div>
                    </div>
                </div> <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Federation of Junior Chapters of the Philippine Pharmacists Association - Rho Chapter.
                                </h6>
                            </a>
                        </div>
                    </div>
                </div> <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Junior Financial Executives (JFINEX)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div> <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Junior Management Association (JMA)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div> <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Junior Philippine Institute of Accountants (JPIA)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div> <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Philippine Institute of Industrial Engineers - Operations Research Society of the Philippines (PIIE-ORSP)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div> <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Rotaract Club of Adamson University (RAC-AdU)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Society Petroleum Engineers - Adamson Univeristy Student Chapter (SPE-AdUSC)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Unified Customs Administration Society (UCAS)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    United Architects of the Philippines Students Auxillary (UAPSA)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>
                
                
            </div>

            
            <div class="card-table-title"> <H1>CO-ACADEMIC</H1></div>
        <div class="card-table">
            
        <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                    <img src="photos/aums-logo.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                    <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                        <a href="#" style="text-decoration: none; display: block;">
                            <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                Adamson University Mathematics Society
                            </h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                    <img src="photos/psau-logo.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                    <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                        <a href="#" style="text-decoration: none; display: block;">
                            <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                Physics Society of Adamson University (PSAU)
                            </h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                    <img src="photos/siliplente-logo.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                    <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                        <a href="#" style="text-decoration: none; display: block;">
                            <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                Silip@Lente - AdU
                            </h6>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="card-table-title"> <H1>SOCIO-CIVIC</H1><br> </div>
            <div class="card-table">
    
                
            <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/asa_adu-logo.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Academic Scholars Alliance of Adamson University (ASA-AdU)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/adu-rcyc-logo.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Adamson University Red Cross Youth Council (AdU-RCYC)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div><div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/enactus-logo.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Enactus of Adamson University (ENACTUS)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div><div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/gset-logo.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    GRAVITY SET
                                </h6>
                            </a>
                        </div>
                    </div>
                </div><div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/himig-adu_logo.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    HIMIG - Musicians Of Adamson University (HIMIG)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div><div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/mesau-logo.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Mountaineering and Explorations Society of Adamson University (MESAU)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div><div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/sao-logo.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    The Adamson University - Student Assistants Organization (AdU-SAO)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div><div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                        <img src="photos/tnt-adu_logo.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="#" style="text-decoration: none; display: block;">
                                <h6 class="card-title" style="color: white; margin: 0; padding: 10px; text-align: center;">
                                    Tinik ng Teatro (TNT)
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>
        </Center>
        </main>

    <script>
        let lastScrollTop = 0;
        window.addEventListener("scroll", () => {
            let st = window.pageYOffset || document.documentElement.scrollTop;
            if (st > lastScrollTop) {
                // Scrolling down, hide the header
                document.querySelector(".scroll-header").classList.add("hidden");
            } else {
                // Scrolling up, show the header
                document.querySelector(".scroll-header").classList.remove("hidden");
            }
            lastScrollTop = st;
        });
    </script>
    
    <script>
        function togglePopup() {
            var popup = document.getElementById("createOrganizationPopup");
            popup.style.display = (popup.style.display === "none") ? "block" : "none";
        }
    </script>

    <!-- Add Bootstrap JavaScript (optional) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
@endsection
