@extends('layouts.app', ['activePage' => 'questions', 'titlePage' => __('Questions')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Questions') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('questions.create') }}" class="btn btn-sm btn-primary">{{ __('Add Question') }}</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <th width="70%"> {{ __('Title') }} </th>
                                    <th width="20%">{{ __('Choice') }}</th>
                                    <th width="10%" class="text-right"> {{ __('Actions') }} </th>
                                    </thead>
                                    <tbody>
                                    @foreach($questions as $question)
                                        <tr>
                                            <td>
                                                {{ $question->title }}
                                            </td>
                                            <td>
                                                <i class="text-{{ $question->choice ? 'success' : 'danger' }} fa fa-{{$question->choice ? 'check-square' : 'close'}}"></i>
                                            </td>
                                            <td class="td-actions text-right">
                                                <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="_method" value="DELETE">

                                                    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('questions.edit', $question->id) }}" data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                        <i class="material-icons">close</i>
                                                        <div class="ripple-container"></div>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
