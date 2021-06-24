@extends('layout.User_layout.layout')

@section('content')
                            <div class="row">
                                <div class="col-md-12 m-b-30">
                                    <!-- begin page title -->
                                    <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                        <div class="page-title mb-2 mb-sm-0">
                                            <h1>Personal Task</h1>
                                        </div>
                                    </div>
                                    <!-- end page title -->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <div class="datatable-wrapper table-responsive">
                                                <table id="datatable" class="display compact table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Task Name</th>
                                                            <th>Task Details</th>
                                                            <th>Time</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($Personal as $key)
                                                        @if ($key->status == 'Undone')
                                                            
                                                        
                                                            
                                                        
                                                        <form action="{{ route('personalDone') }}" method="POST">
                                                            @csrf
                                                            <tr>
                                                                <td>{{ $key->task_name }}</td>
                                                                <input type="hidden" name="id" value="{{ $key->id }}">
                                                                <td>{{ $key->task_detail }}</td>
                                                                <td>{{ $key->created_at->diffForHumans() }}</td>
                                                                
                                                                <td><button type="submit" class="btn btn-round btn-success">Done</button></td>
                                                            </tr>
                                                        </form>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Task Name</th>
                                                            <th>Task Details</th>
                                                            <th>Time</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- End  --}}

@endsection

                        