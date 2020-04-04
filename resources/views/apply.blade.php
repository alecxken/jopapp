@extends('layouts.templates')



@section('content')
<BR>
<H1><center>JOB APPLICATION </center></H1>
<br>



          <div class="col-md-16" width="100%">        

           @if(!empty($token))
            @include('apps.person')
           @else
            <div id="erros" class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>Alert!</h4>
        <p>Please  select the application  </p>
        <p> <a href="{{url('home')}}" class="btn btn-primary">Select Job Position First</a></p>
      </div>
            
           @endif
   
                
                </div>
        </table> 


      

@endsection







