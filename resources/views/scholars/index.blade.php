@extends('main')

@section('titlle','| scholars')

@section('stylesheets')


    {!! Html::style('css/dataTables.bootstrap4.css') !!} 

@endsection

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item active">
        <a href="#">Scholars Details</a>
    </li>
    
    </ol>

    <!-- Icon Cards-->
    <div class="row ">
            <div class="col-md-2">
                    <a href="{{ route('scholars.create') }}" class="btn btn-primary btn-lg ">New Scholar's Entry</a>
            </div>    
            <div class="col-md-12">
                    <hr>
                </div>
    
    </div>

    <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Scholars</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Name</th>
                      <th>Position</th>
                      <th>Office</th>
                      <th>Age</th>
                      <th>Start date</th>
                      <th>Salary</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                    </tr>
                    <tr>
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011/07/25</td>
                      <td>$170,750</td>
                    </tr>
                    <tr>
                      <td>Ashton Cox</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>66</td>
                      <td>2009/01/12</td>
                      <td>$86,000</td>
                    </tr>
                    <tr>
                      <td>Cedric Kelly</td>
                      <td>Senior Javascript Developer</td>
                      <td>Edinburgh</td>
                      <td>22</td>
                      <td>2012/03/29</td>
                      <td>$433,060</td>
                    </tr>
                    <tr>
                      <td>Airi Satou</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>33</td>
                      <td>2008/11/28</td>
                      <td>$162,700</td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>

@endsection

@section('scripts')
    <!-- Page level plugin JavaScript-->
    {!! Html::script('js/jquery.dataTables.js') !!} 
    {!! Html::script('js/dataTables.bootstrap4.js') !!} 
      
    <!-- Demo scripts for this page-->
    
    {!! Html::script('js/datatables-demo.js') !!}  
@endsection
