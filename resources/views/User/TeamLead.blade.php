@extends('layout.User_layout.layout')

@section('content')


    <div class="row">
        <div class="col-xxl-5 m-b-30">
            <div class="card card-statistics tab nav-border mb-0 h-100">
                <div class="card-header d-block d-sm-flex align-items-center justify-content-between p-3">
                    <div class="card-heading mb-3 mb-sm-0">
                        <h4 class="card-title">Property overview </h4>
                    </div>
                    <div class="dropdown">
                        <ul class="nav nav-tabs mb-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link py-2 active show" id="sell-02-tab" data-toggle="tab" href="#sell-02" role="tab" aria-controls="sell-02" aria-selected="true">Sell</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link py-2" id="rent-02-tab" data-toggle="tab" href="#rent-02" role="tab" aria-controls="rent-02" aria-selected="false">Rent </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="sell-02" role="tabpanel" aria-labelledby="sell-02-tab">
                            <div class="row align-items-center m-b-20">
                                <div class="col-xs-2 mb-2 mb-xs-0">
                                    <img class="img-fluid" src="assets/img/real-estate/01.jpg" alt="">
                                </div>
                                <div class="col-xs-7">
                                    <h5 class="mb-1"> <a href="#">Atrium Apartments, St John's Wood, NW8 </a></h5>
                                    <span>05, Jun 2019, St John's Wood</span>
                                </div>
                                <div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
                                    <a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
                                </div>
                            </div>
                            <div class="row align-items-center m-b-20">
                                <div class="col-xs-2 mb-2 mb-xs-0">
                                    <img class="img-fluid" src="assets/img/real-estate/02.jpg" alt="">
                                </div>
                                <div class="col-xs-7">
                                    <h5 class="mb-1"> <a href="#">Old Church Street, Chelsea, London, SW3 </a></h5>
                                    <span>12, Jun 2019, Chelsea, London, SW3</span>
                                </div>
                                <div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
                                    <a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
                                </div>
                            </div>
                            <div class="row align-items-center m-b-20">
                                <div class="col-xs-2 mb-2 mb-xs-0">
                                    <img class="img-fluid" src="assets/img/real-estate/03.jpg" alt="">
                                </div>
                                <div class="col-xs-7">
                                    <h5 class="mb-1"> <a href="#">Wilton Place, Knightsbridge, London, SW1X 8RL </a></h5>
                                    <span>30, Jun 2019, London, SW1X 8RL</span>
                                </div>
                                <div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
                                    <a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
                                </div>
                            </div>
                            <div class="row align-items-center m-b-20">
                                <div class="col-xs-2 mb-2 mb-xs-0">
                                    <img class="img-fluid" src="assets/img/real-estate/04.jpg" alt="">
                                </div>
                                <div class="col-xs-7">
                                    <h5 class="mb-1"> <a href="#">Wilton Place, Knightsbridge, London, SW1X 8RL </a></h5>
                                    <span>30, Jun 2019, London, SW1X 8RL</span>
                                </div>
                                <div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
                                    <a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-xs-2 mb-2 mb-xs-0">
                                    <img class="img-fluid" src="assets/img/real-estate/05.jpg" alt="">
                                </div>
                                <div class="col-xs-7">
                                    <h5 class="mb-1"> <a href="#">Ebury Square, Belgravia, London, SW1W </a></h5>
                                    <span>20, Sep 2019, London, SW1W </span>
                                </div>
                                <div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
                                    <a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="rent-02" role="tabpanel" aria-labelledby="rent-02-tab">
                            <div class="row align-items-center m-b-20">
                                <div class="col-xs-2 mb-2 mb-xs-0">
                                    <img class="img-fluid" src="assets/img/real-estate/04.jpg" alt="">
                                </div>
                                <div class="col-xs-7">
                                    <h5 class="mb-1"> <a href="#">Wapping High Street, London, E1W </a></h5>
                                    <span>10, Sep 2019, St London, E1W</span>
                                </div>
                                <div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
                                    <a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
                                </div>
                            </div>
                            <div class="row align-items-center m-b-20">
                                <div class="col-xs-2 mb-2 mb-xs-0">
                                    <img class="img-fluid" src="assets/img/real-estate/05.jpg" alt="">
                                </div>
                                <div class="col-xs-7">
                                    <h5 class="mb-1"> <a href="#">Ebury Square, Belgravia, London, SW1W </a></h5>
                                    <span>20, Sep 2019, London, SW1W </span>
                                </div>
                                <div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
                                    <a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
                                </div>
                            </div>
                            <div class="row align-items-center m-b-20">
                                <div class="col-xs-2 mb-2 mb-xs-0">
                                    <img class="img-fluid" src="assets/img/real-estate/06.jpg" alt="">
                                </div>
                                <div class="col-xs-7">
                                    <h5 class="mb-1"> <a href="#">Elm Walk, Hampstead, NW3 </a></h5>
                                    <span>25, Sep 2019, Hampstead, NW3</span>
                                </div>
                                <div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
                                    <a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
                                </div>
                            </div>
                            <div class="row align-items-center m-b-20">
                                <div class="col-xs-2 mb-2 mb-xs-0">
                                    <img class="img-fluid" src="assets/img/real-estate/05.jpg" alt="">
                                </div>
                                <div class="col-xs-7">
                                    <h5 class="mb-1"> <a href="#">Ebury Square, Belgravia, London, SW1W </a></h5>
                                    <span>20, Sep 2019, London, SW1W </span>
                                </div>
                                <div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
                                    <a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-xs-2 mb-2 mb-xs-0">
                                    <img class="img-fluid" src="assets/img/real-estate/05.jpg" alt="">
                                </div>
                                <div class="col-xs-7">
                                    <h5 class="mb-1"> <a href="#">Ebury Square, Belgravia, London, SW1W </a></h5>
                                    <span>20, Sep 2019, London, SW1W </span>
                                </div>
                                <div class="col-xs-3 mt-2 mt-xs-0 text-left text-xs-center">
                                    <a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-14 col-xxl-4 m-b-30">
            <div class="card card-statistics h-100 mb-0">
                <div class="card-header">
                    <h4 class="card-title">Agent list</h4>
                </div>
                <div class="card-body scrollbar scroll_dark" style="height: 380px;">
                    <div class="row align-items-center m-b-20">
                        <div class="col-4 col-xs-2">
                            <div class="bg-img">
                                <img class="img-fluid" src="assets/img/avtar/01.jpg" alt="user">
                            </div>
                        </div>
                        <div class="col-8 col-xs-6">
                            <h5 class="mb-0">Jon Watson</h5>
                            <span>Sales and Retail</span>
                        </div>
                        <div class="col-xs-4 mt-3 mt-xs-0">
                            <b class="text-dark d-block">25 Job done</b>
                            <div class="ratings">
                                <small><i class="fe fe-star-on text-warning"></i> (4.55) 9 reviews </small>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center m-b-20">
                        <div class="col-4 col-xs-2">
                            <div class="bg-img">
                                <img class="img-fluid" src="assets/img/avtar/02.jpg" alt="user">
                            </div>
                        </div>
                        <div class="col-8 col-xs-6">
                            <h5 class="mb-0">Smithdro</h5>
                            <span>Sales and Retail</span>
                        </div>
                        <div class="col-xs-4 mt-3 mt-xs-0">
                            <b class="text-dark d-block">12 Job done</b>
                            <div class="ratings">
                                <small><i class="fe fe-star-on text-warning"></i> (4.01) 5 reviews </small>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center m-b-20">
                        <div class="col-4 col-xs-2">
                            <div class="bg-img">
                                <img class="img-fluid" src="assets/img/avtar/03.jpg" alt="user">
                            </div>
                        </div>
                        <div class="col-8 col-xs-6">
                            <h5 class="mb-0">Brian</h5>
                            <span>Sales and Retail</span>
                        </div>
                        <div class="col-xs-4 mt-3 mt-xs-0">
                            <b class="text-dark d-block">23 Job done</b>
                            <div class="ratings">
                                <small><i class="fe fe-star-on text-warning"></i> (3.45) 8 reviews </small>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center m-b-20">
                        <div class="col-4 col-xs-2">
                            <div class="bg-img">
                                <img class="img-fluid" src="assets/img/avtar/04.jpg" alt="user">
                            </div>
                        </div>
                        <div class="col-8 col-xs-6">
                            <h5 class="mb-0">Garydro</h5>
                            <span>Sales and Retail</span>
                        </div>
                        <div class="col-xs-4 mt-3 mt-xs-0">
                            <b class="text-dark d-block">06 Job done</b>
                            <div class="ratings">
                                <small><i class="fe fe-star-on text-warning"></i> (2.55) 2 reviews </small>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-4 col-xs-2">
                            <div class="bg-img">
                                <img class="img-fluid" src="assets/img/avtar/05.jpg" alt="user">
                            </div>
                        </div>
                        <div class="col-8 col-xs-6">
                            <h5 class="mb-0">Alice Williams</h5>
                            <span>Sales and Retail</span>
                        </div>
                        <div class="col-xs-4 mt-3 mt-xs-0">
                            <b class="text-dark d-block">30 Job done</b>
                            <div class="ratings">
                                <small><i class="fe fe-star-on text-warning"></i> (5.0) 10 reviews </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection