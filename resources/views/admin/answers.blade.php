{{-- @extends('layouts.admin', [
  'page_header' => "Toutes les réponses des étudiants",
  'dash' => '',
  'users' => '',
  'questions' => '',
  'answers' => 'active',
  'top_re' => '',
  'all_re' => '',
  'sett' => ''
])

@section('content')
  <div class="content-block box">
    <div class="box-body table-responsive">
      <table id="example1" class="table table-striped table-bordered">
        <thead class="info">
          <tr>
            <th>#</th>
            <th>{{__('message.Student Name')}}</th>
            <th>Question</th>
            <th>{{__('message.Student's Answer')}}</th>
            <th>{{__('message.Correct Answer')}}</th>
            <th>{{__('message.Delete')}}</th>
          </tr>
        </thead>
        <tbody>
          @if ($answers)
            @php($n = 1)
            @foreach ($answers as $key => $answer)
              <tr>
                <td>
                  {{$n}}
                  @php($n++)
                </td>
                <td>{{$answer->user->name}}</td>
                <td>{{$answer->question->question}}</td>
                <td>{{$answer->user_answer}}</td>
                <td>{{$answer->answer}}</td>
                <td>
                  <!-- Delete Button -->
                  <a type="button" class="btn btn-info btn-xs btn-danger" data-toggle="modal" data-target="#{{$answer->id}}deleteModal"><i class="fa fa-close"></i> Supprimer</a>
                  <div id="{{$answer->id}}deleteModal" class="delete-modal modal fade" role="dialog">
                    <!-- Delete Modal -->
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <div class="delete-icon"></div>
                        </div>
                        <div class="modal-body text-center">
                          <h4 class="modal-heading">{{__('message.Are You')}}</h4>
                          <p>{{__('message.Do you')}}</p>
                        </div>
                        <div class="modal-footer">
                          {!! Form::open(['method' => 'DELETE', 'action' => ['AnswersController@destroy', $answer->id]]) !!}
                                {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) !!}
                                {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
@endsection --}}
