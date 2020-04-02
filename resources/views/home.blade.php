@extends('layouts.templates')

@section('content')
    
       <!-- banner outer start -->
      <div  class="col-sm-16 banner-outer wow fadeInLeft animated" data-wow-delay="1s" data-wow-offset="50">

        <div class="container">

    <div class="row">
      
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="fa fa-bookmark"></span> MENU</h3>
                </div>
                <div class="panel-body">
                    <a href="http://www.jquery2dotnet.com/" class="btn btn-success btn-sm btn-block" role="button"><span class="fa fa-globe"></span> Home</a>
                    
                    <a href="http://www.jquery2dotnet.com/" class="btn btn-primary btn-sm btn-block" role="button"><span class="fa fa-globe"></span> Opportunities</a>
                  
                    <a href="http://www.jquery2dotnet.com/" class="btn btn-danger btn-sm btn-block" role="button"><span class="fa fa-globe"></span> Website</a>
                </div>
            </div>
        </div>

        <div class="col-md-12">
          
          <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="fa fa-bookmark"></span> Welcome  to {{Auth::user()->name}}
                      Dashboard</h3>
                </div>
                <div class="panel-body">
                    
                </div>
            </div>

        </div>
    </div>
</div>
        
      </div>
      <!-- banner outer end --> 
@endsection
