@extends('layouts.admin', [
  'page_header' => 'Utilisateurs',
  'dash' => '',
  'quiz' => '',
  'users' => 'active',
  'questions' => '',
  'top_re' => '',
  'all_re' => '',
  'sett' => ''
])

@section('content')
@include('message')
  @if ($auth->role == 'A')
    <div class="margin-bottom">
      <button type="button" class="btn btn-wave" data-toggle="modal" data-target="#createModal">{{__('message.Add Student')}}</button>
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#AllDeleteModal">{{__('message.Delete All Student')}}s</button>
    </div>
    <!-- All Delete Button -->
    <div id="AllDeleteModal" class="delete-modal modal fade" role="dialog">
      <!-- All Delete Modal -->
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="delete-icon"></div>
          </div>
          <div class="modal-body text-center">
            <h4 class="modal-heading">{{__('message.Are you')}}</h4>
            <p>{{__('message.Do you')}}</p>
          </div>
          <div class="modal-footer">
            {!! Form::open(['method' => 'POST', 'action' => 'DestroyAllController@AllUsersDestroy']) !!}
                {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
    <!-- Create Modal -->
    <div id="createModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{__('message.Add Student')}}</h4>
          </div>
          {!! Form::open(['method' => 'POST', 'action' => 'UsersController@store']) !!}
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name', "Nom de l'utilisateur") !!}
                    <span class="required">*</span>
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Entrez votre nom']) !!}
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                  </div>
                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email', 'Addresse E-mail') !!}
                    <span class="required">*</span>
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'eg: info@examlpe.com', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                  </div>
                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password', 'Mot de passe') !!}
                    <span class="required">*</span>
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder'=>'Entrez votre mot de passe', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                  </div>
                  <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                      {!! Form::label('role', 'Role') !!}
                      <span class="required">*</span>
                      {!! Form::select('role', ['S' => 'Student', 'A'=>'Administrator'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                      <small class="text-danger">{{ $errors->first('role') }}</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                    {!! Form::label('mobile', 'No. de téléphone') !!}
                    <span class="required">*</span>
                    {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'eg: +91-123-456-7890', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('mobile') }}</small>
                  </div>
                  <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                    {!! Form::label('city', 'Prénom') !!}
                    {!! Form::text('city', null, ['class' => 'form-control', 'placeholder'=>'Entrez Votre Prénom']) !!}
                    <small class="text-danger">{{ $errors->first('city') }}</small>
                  </div>
                  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    {!! Form::label('address', 'Addresse') !!}
                    {!! Form::textarea('address', null, ['class' => 'form-control', 'rows'=>'5', 'placeholder' => 'Entrez Votre addresse']) !!}
                    <small class="text-danger">{{ $errors->first('address') }}</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="btn-group pull-right">
                {!! Form::reset("Annuler", ['class' => 'btn btn-default']) !!}
                {!! Form::submit("Ajouter", ['class' => 'btn btn-wave']) !!}
              </div>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    <div class="content-block box">
      <div class="box-body table-responsive">
        <table id="example1" class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>{{__('message.Student Name')}}</th>
              <th>Prénom</th>
              <th>Email</th>
              <th>{{__('message.Mobile No.')}}</th>
              
              <th>Addresse</th>
              <th>Role utilisateur</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @if ($users)
              @php($n = 1)
              @foreach ($users as $key => $user)
                <tr>
                  <td>
                    {{$n}}
                    @php($n++)
                  </td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->city}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->mobile}}</td>
                  
                  <td>{{$user->address}}</td>
                  <td>{{$user->role == 'S' ? 'Student' : '-'}}</td>
                  <td>
                    <!-- Edit Button -->
                    <a type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{$user->id}}EditModal"><i class="fa fa-edit"></i> Editer</a>
                    <!-- Delete Button -->
                    <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#{{$user->id}}deleteModal"><i class="fa fa-close"></i> Supprimer</a>
                    <div id="{{$user->id}}deleteModal" class="delete-modal modal fade" role="dialog">
                      <!-- Delete Modal -->
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="delete-icon"></div>
                          </div>
                          <div class="modal-body text-center">
                            <h4 class="modal-heading">{{__('message.Are you')}}</h4>
                            <p>{{__('message.Do you')}}</p>
                          </div>
                          <div class="modal-footer">
                            {!! Form::open(['method' => 'DELETE', 'action' => ['UsersController@destroy', $user->id]]) !!}
                                {!! Form::reset("Non", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                                {!! Form::submit("Oui", ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <!-- edit model -->
                <div id="{{$user->id}}EditModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Editer un Utilisateur </h4>
                      </div>
                      {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UsersController@update', $user->id]]) !!}
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {!! Form::label('name', 'Name') !!}
                                <span class="required">*</span>
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Entrez votre nom']) !!}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {!! Form::label('email', 'Email address') !!}
                                <span class="required">*</span>
                                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'eg: info@example.com', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                              </div>
                              {{-- <label for="">Change Password: </label>
                              <input type="checkbox" name="changepass"> --}}
                              {{-- <input type="radio" value="1" name="changepass" id="ch1">&nbsp;Yes
                               <input type="radio" value="0" name="changepass" checked id="ch2">&nbsp;No --}}
                               <br>
                              <div id="pass" class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                {!! Form::label('password', 'Password') !!}
                                <span class="required">*</span>
                               
                                <input class="form-control" type="password" value="" placeholder="Enter new password" name="password">
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                              </div>

                              <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                                  {!! Form::label('role', 'User Role') !!}
                                  
                                  {!! Form::select('role', ['S' => 'Student', 'A'=>'Administrator'], null, ['class' => 'form-control select2', 'required' => 'required']) !!}
                                  <small class="text-danger">{{ $errors->first('role') }}</small>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                {!! Form::label('mobile', 'Mobile No.') !!}
                                
                                {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'eg: +91-123-456-7890']) !!}
                                <small class="text-danger">{{ $errors->first('mobile') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                {!! Form::label('city', 'Prenom') !!}
                                {!! Form::text('city', null, ['class' => 'form-control', 'placeholder'=>'Entrez votre Prenom']) !!}
                                <small class="text-danger">{{ $errors->first('city') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                {!! Form::label('address', 'Address') !!}
                                {!! Form::textarea('address', null, ['class' => 'form-control', 'rows'=>'5', 'placeholder' => 'Entrez votre Addresse']) !!}
                                <small class="text-danger">{{ $errors->first('address') }}</small>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <div class="btn-group pull-right">
                            {!! Form::submit("Mettre à jour", ['class' => 'btn btn-wave']) !!}
                          </div>
                        </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  @endif
@endsection
@section('scripts')


<script>
  $('#ch1').click(function(){
    $('#pass').show();
  });

  $('#ch2').click(function(){
    $('#pass').hide();
  });
</script>

@endsection
