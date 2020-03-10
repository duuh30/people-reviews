@extends('layouts.app', ['activePage' => 'reports', 'titlePage' => __('Reports')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Reports') }}</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-sm btn-primary">{{ __('Search') }}</button>
                                        </div>
                                        <div class="col-4">
                                            <select class="form-control" name="user_id" id="user">
                                                <option selected value="all">Todos</option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if($selected && count($reviews))
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ __($selected->name) }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th> {{__('Reviewer') }} </th>
                                    <th>{{ __('Average') }}</th>
                                    <th width="10%">{{ __('Actions') }}</th>
                                </thead>
                                <tbody>
                                    @foreach($reviews as $key => $review)
                                        <tr>
                                            <td>{{ $review[0]->reviewer->name }}</td>
                                            <td>{{ ($review->sum('value') / $review->count()) }}</td>
                                            <td>
                                                <a style="cursor: pointer" data-target="#modal-{{$key}}" data-toggle="modal" role="button" aria-expanded="false" aria-controls="colexample"><i class="material-icons">remove_red_eye</i></a>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modal-{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Reviews Of {{ $review[0]->reviewer->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @foreach($selected->reviews->where('reviewer_id', $review[0]->reviewer->id) as $item)
                                                            <div class="card card-body">
                                                                <div>
                                                                    Reviewer : {{ $item->reviewer->name }}
                                                                </div>
                                                                <div>
                                                                    Question : {{ $item->question->title }}
                                                                </div>
                                                                <div>
                                                                    Option : {{ $item->message ?: $item->value }}
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
