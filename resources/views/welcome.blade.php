@extends('layouts.app')

@section('content')

    <section class="content-header">
      <h1>
        Advanced Form Elements
        <small>Preview</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol> -->
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-default">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-clone"></i> FEATURED NEWS</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{{url_plug()}}/icon/bgbg.jpg?v={{date('ymdhis')}}" alt="Los Angeles" style="width:100%;">
                                </div>

                                <div class="item">
                                    <img src="{{url_plug()}}/icon/bgbg.jpg?v={{date('ymdhis')}}" alt="Chicago" style="width:100%;">
                                </div>
                                
                                <div class="item">
                                    <img src="{{url_plug()}}/icon/bgbg.jpg?v={{date('ymdhis')}}" alt="New york" style="width:100%;">
                                </div>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="box-footer">
                    
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-default">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-clone"></i> FEATURED NEWS</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        
                    </div>
                    <div class="box-footer">
                    
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box box-default">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-clone"></i> APLICATION</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row" style="display: contents;">
                            <div class="col-md-2 col-xl-6 col-border text-center ">
                                <div class="box box-app">
                                    <div class="box-body box-profile">
                                        <img class="profile-user-img img-responsive" src="{{url_plug()}}/icon/eproc.png?v={{date('ymdhis')}}" alt="User profile picture">
                                        <p style="margin:0px" class="text-muted text-center">E-Procurement</p>

                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-2 col-xl-6 col-border text-center ">
                                <div class="box box-app">
                                    <div class="box-body box-profile">
                                        <img class="profile-user-img img-responsive" src="{{url_plug()}}/icon/eprom.png?v={{date('ymdhis')}}" alt="User profile picture">
                                        <p style="margin:0px" class="text-muted text-center">E-Project Management</p>

                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-2 col-xl-6 col-border text-center ">
                                <div class="box box-app">
                                    <div class="box-body box-profile">
                                        <img class="profile-user-img img-responsive img-circle" src="{{url_plug()}}/icon/hris.png?v={{date('ymdhis')}}" alt="User profile picture">
                                        <p style="margin:0px" class="text-muted text-center">H R I S</p>

                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="box-footer">
                    
                    </div>
                </div>
            </div>
        </div>
      
    </section>
@endsection
