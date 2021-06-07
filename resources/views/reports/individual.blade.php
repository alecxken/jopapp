  @extends('layouts.template')
@section('content')

  <div class="box box-success ">
              <div class="box-heading">
                <h3><a href="{{url('summary-app')}}" class="btn btn-xs btn-success">Click To Go Back</a><center> APPLICANT {{$data->app_id}} : {{$data->fname}} {{$data->oname}}</center></h3>
              </div>

              <div class="box-body ">

               
                         <dl>
               
                             <div class="form-group col-sm-3">
                                     
                               <dt>Applicant Ref</dt>
                                <dd>{{$data->app_id}}</dd>
                            </div>

                            <div class="form-group col-sm-3">
                                {{ Form::label('name', 'Title') }}
                                <dd>{{$data->title}}</dd>
                            </div>

                            <div class="form-group col-sm-3">
                                {{ Form::label('email', 'First Name') }}
                                <dd>{{$data->fname}}</dd>
                            </div>

                            <div class="form-group col-sm-3">
                                {{ Form::label('email', 'Last Name') }}
                               <dd>{{$data->lname}}</dd>
                            </div>

                            <div class="form-group col-sm-3">
                                {{ Form::label('name', 'Other Names') }}
                              <dd>{{$data->oname}}</dd>
                            </div>

                            <div class="form-group col-sm-3">
                                {{ Form::label('email', 'P.O Box') }}
                                <dd>{{$data->po_box}}</dd>
                            </div>

                            <div class="form-group col-sm-3">
                                {{ Form::label('email', 'Town') }}
                               <dd>{{$data->postal_code}}</dd>
                            </div>

                             <div class="form-group col-sm-3">
                                {{ Form::label('email', 'Phone No') }}
                               <dd>{{$data->phone_no}}</dd>
                            </div> 

                            <div class="form-group col-sm-3">
                                {{ Form::label('name', 'Email Address') }}
                               <dd>{{$data->email}}</dd>
                            </div>

                            <div class="form-group col-sm-3">
                                {{ Form::label('name', 'DOB') }}
                                <dd>{{$data->dob}}</dd>
                            </div>
                            <div class="form-group col-sm-3">
                                {{ Form::label('email', 'Gender') }}
                              <dd>{{$data->gender}}</dd>
                            </div>

                             <div class="form-group col-sm-3">
                                {{ Form::label('email', 'ID/Passport ') }}
                               <dd>{{$data->passport}}</dd>
                            </div>

                              <div class="form-group col-sm-3">
                                {{ Form::label('email', 'County') }}
                               <dd>{{$data->county}}</dd>                               
                            </div>

                             <div class="form-group col-sm-3">
                                {{ Form::label('name', ' Home District') }}
                               <dd>{{$data->district}}</dd>
                            </div>

                             <div class="form-group col-sm-3">
                                {{ Form::label('disability', ' Current Salary') }}
                                 <dd>{{$data->current_salary}}</dd>
                            </div>
                           
                            <div class="form-group col-sm-3">
                              
                                {{ Form::label('disability', ' Expected Salary') }}
                                <dd>{{$data->expected_salary}}</dd>
                            </div>

                            <div class="form-group col-sm-3">
                                {{ Form::label('disability', ' Disabled?') }}
                                 <dd>{{$data->disability}}</dd>
                            </div>
                           
                             <div class="form-group col-sm-3">
                                {{ Form::label('disability', ' Is Convicted?') }}
                                <dd>{{$data->convicted}}</dd>
                            </div>

                             <div class="form-group col-sm-3">
                                {{ Form::label('disability', ' Ever Dismissed?') }}
                                <dd>{{$data->dismissed}}</dd>
                            </div>
                            <div class="col-sm-12">
                              <hr>
                            </div>

                            @if(!empty($education))
                             <div class=" col-sm-12">
                            
                               <dt class="label label-success">Education Details</dt>
                  
                            
                               
                            <table class="table table-bordered table-hover order-list table-sm" id="">
                            <thead class=" small">
                              <tr>                       
                                 <th class="text-center">Education</th>
                                 <th class="text-center">Area of Study</th>
                                 <th class="text-center">Institution </th>
                                 <th class="text-center">Year</th>                               
                              </tr>
                            </thead>
                            <tbody>

                              @if(!empty($education))

                              @foreach($education as $educ)

                              <tr id='t0'>
                             
                                <td>{{$educ->edu}} </td>
                                <td>{{$educ->cert1}}</td>
                                <td>{{$educ->institution1}}</td>
                                <td>{{$educ->year1}}</td>
                                                           
                              </tr>
                              @endforeach
                            
                             @endif
                             </tbody>
                             </table>
                              @endif
                            </div>
                           

                               @if(!empty($membership))
                             <div class="form-group col-sm-6">
                             
                               <dt class="label label-primary">Membership Details</dt>
                          
                                <table class="table table-bordered table-hover order-list2 " id="">
                            <thead class="bg-primary small">
                              <tr >
                               
                                <th class="text-center">
                                  Membership Name
                                </th>
                                 <th class="text-center">
                                  Registration Body
                                </th>
                                 <th class="text-center">
                                 Membership No
                                </th>
                               
                              </tr>
                            </thead>
                            <tbody>
                           

                              @foreach($membership as $memb)
                              <tr id='t1'>
                            
                                <td>{{$memb->member}}</td>
                                 <td>{{$memb->body}}</td>
                                 <td>{{$memb->membno}}</td>
                                                             
                              </tr>
                              @endforeach
                            </tbody>
                            </table>
                            </div>
                            @endif


                             @if(!empty($certificates))
                           <div class="form-group col-sm-6">
                            
                               <dt class="label label-warning">Certificate Details</dt>
                           <table class="table table-bordered table-hover order-listON " id="">
                            <thead class="bg-primary small">
                              <tr >
                              
                                <th class="text-center">
                                  Certificate
                                </th>
                                 <th class="text-center">
                                  Institution
                                </th>
                                 <th class="text-center">
                                  Reg Number
                                </th>
                                 <th class="text-center">
                                  Year Of Reg
                                </th>
                               
                              </tr>
                            </thead>
                            <tbody>

                            

                              @foreach($certificates as $certs)
                              <tr id='t1'>
                              
                                 <td>{{$certs->cert}}</td>
                                 <td>{{$certs->institution}}</td>
                                 <td>{{$certs->reg_no}}</td>
                                 <td>{{$certs->year}}</td>
                                                            
                              </tr>
                              @endforeach
                          </tbody>
                          </table>
                            </div>
                            @endif


                             @if(!empty($employer))
                              <div class="form-group col-sm-6">
                                <hr>
                               <dt class="label label-success">Employer Details</dt>
                       
                        <table class="table table-bordered table-hover order-list3 " id="">
                            <thead class="bg-primary small">
                              <tr >
                     
                                <th class="text-center">
                                  Employer
                                </th>
                                <th class="text-center">
                                  Position
                                </th>
                                 <th class="text-center">
                                  From
                                </th>
                                 <th class="text-center">
                                  To
                                </th>
                                 <th class="text-center">
                                  Contact Person
                                </th>
                               
                              </tr>
                            </thead>
                            <tbody>
                            
                              

                                @foreach($employer as $edu)

                             <tr id='t0'>
                             
                                <td>{{$edu->employer}}</td>
                                <td>{{$edu->position}}</td>
                                 <td>{{$edu->from}}</td>
                                <td>{{$edu->to}}</td>
                                 <td>{{$edu->contact_person}}</td>
                            
                               
                              </tr>

                                @endforeach
                              </tbody>
                              </table>
                            </div>  
                            @endif

                           @if(!empty($others))

                              <div class=" col-sm-12">
                                <dt class="label label-info">Other Training/Skills Details</dt>
                      <table class="table table-bordered table-hover order-list4 " id="">
                            <thead class="bg-primary small">
                              <tr >
                         <!--        <th class="text-center">
                                  #
                                </th> -->
                                <th class="text-center">
                                  Training
                                </th>
                                <th class="text-center">
                                  Certificate
                                </th>
                                 <th class="text-center">
                                  Institution
                                </th>
                                 <th class="text-center">
                                  Comp Yr
                                </th>
                               
                              </tr>
                            </thead>
                            <tbody>
                            	      

                              @foreach($others as $other)
                              <tr id='t0'>
                       
                                  <td>{{$other->training}}</td>
                                  <td>{{$other->cert2}}</td>
                                  <td>{{$other->institution2}}</td>
                                  <td>{{$other->year2}}</td>
                                                                  
                              </tr>
                              @endforeach
                              </tbody>

                              </table>
                            </div>
                              @endif

                                @if(!empty($referee))
                              <div class="col-sm-12">
                                  
                               <dt class="label label-primary">Referees Details</dt>
                           <table class="table table-bordered table-hover order-listref " id="">
                            <thead class="bg-success small">
                              <tr >
                           
                                <th class="text-center">
                                  Name
                                </th>
                                 <th class="text-center">
                                  Company
                                </th>
                                 <th class="text-center">
                                  Position
                                </th>
                                <th class="text-center">
                                  Email
                                </th>
                                 <th class="text-center">
                                  Phone
                                </th>
                               
                              </tr>
                            </thead>
                            <tbody>

                             

                                @foreach($referee as $ref)

                               <tr id='t0'>
                                 <td>{{$ref->ref_name}}</td>
                                 <td>{{$ref->ref_company}}</td>
                                 <td>{{$ref->ref_position}}</td>
                                 <td>{{$ref->ref_email}}</td>
                                 <td>{{$ref->ref_phone}}</td>
                                                       
                               
                              </tr>
                           


                                @endforeach
                       
                               </tbody>
                              </table>  
                               @endif
                              
                                </div>  

                         

                           
              </div>

              @endsection