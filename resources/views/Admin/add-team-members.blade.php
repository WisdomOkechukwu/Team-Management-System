@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-statistics clients-contant">
            <div class="card-header">
                <div class="d-xxs-flex justify-content-between align-items-center">
                    <div class="card-heading">
                        <h4 class="card-title">Add Team Members</h4>
                    </div>
                    
                </div>
            </div>
            <div class="card-body py-0 table-responsive">
                <table class="table clients-contant-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Employee Name</th>
                            
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-img mr-4">
                                        <img src="assets/img/avtar/01.jpg" class="img-fluid" alt="Clients-01">
                                    </div>
                                    <p class="font-weight-bold">Adrian Demiandro</p>
                                </div>
                            </td>
                            
                            <td>
                                <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary btn-round mr-2 mb-2 mb-sm-0 ">
                                    <i class="ti ti-plus"></i></a>
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#teamModal" aria-haspopup="true" aria-expanded="false">
                Procced
            </a>
    </div>
        
</div>
@endsection