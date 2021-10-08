@extends('layout.User_layout.layout')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-statistics clients-contant">
            <div class="card-header">
                <div class="d-xxs-flex justify-content-between align-items-center">
                    <div class="card-heading">
                        <h4 class="card-title">Task Management</h4>
                    </div>
                    
                </div>
            </div>
            <div class="card-body py-0 table-responsive">
                <table class="table clients-contant-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Member Name</th>
                            <th scope="col">Member Task</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="bg-img mr-4">
                                        <img src="{{ secure_asset('assets/img/avtar/01.jpg') }}" class="img-fluid" alt="Clients-01">
                                    </div>
                                    <p class="font-weight-bold"><a href="#">Adrian Demiandro</a></p>
                                </div>
                            </td>
                            <td>Fry dodo</td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-icon btn-outline-primary btn-round mr-2 mb-2 mb-sm-0 ">
                                    <i class="ti ti-pencil"></i></a>
                                <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger btn-round mr-2 mb-2 mb-sm-0 ">
                                    <i class="ti ti-close"></i></a>
                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
            
    </div>
        
</div>
@endsection