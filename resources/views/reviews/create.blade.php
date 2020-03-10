@extends('layouts.app', ['activePage' => 'reviews', 'titlePage' => __('Review')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('reviews.create', $user->id) }}" autocomplete="off" id="form-submit" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Review of ')}} {{ $user->name }}</h4>
                                <h4 class="card-title">{{ __('Departament') }} {{$user->department->name}}</h4>
                                <p class="card-category"></p>
                            </div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('status') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('questions.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                    </div>
                                </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class=" text-primary">
                                                    <th width="60%">Title</th>
                                                    @foreach([0,1,2,3,4,5] as $item)
                                                        <th>{{ $item }}</th>
                                                    @endforeach
                                                    </thead>
                                                <tbody>
                                                @foreach($questions as $key => $question)
                                                    @if($question->choice)
                                                        <tr>
                                                            <td>{{ $question->title }}</td>
                                                            @foreach([0,1,2,3,4,5] as $item)
                                                                <td>
                                                                    <input {{ $loop->first ? 'checked' : '' }} data-value="{{$item}}" type="checkbox" name="questions[{{$question->id}}][value]" class="checkboxes form-control">
                                                                </td>
                                                            @endforeach
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @if(count($questions))
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead class=" text-primary">
                                                    <th width="40%">Title</th>
                                                    <th width="60%">Message</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($questions as $key => $question)
                                                            @if(!$question->choice)
                                                                <tr>
                                                                    <td>{{ $question->title }}</td>
                                                                    <td>
                                                                        <input type="text" required="required" name="questions[{{$question->id}}][message]" class="form-control">
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Add Review') }}</button>
                            </div>
                            @endif
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#form-submit").submit((e) => {
            e.preventDefault();
            $("input[type='checkbox']:checked").each((i, el) => {
               $(el).val($(el).data('value'));
            });

            $("#form-submit").submit();
        });

        $(".checkboxes").click((e) => {
           let tr = $(e.target).parent().parent();

           $(tr).find('input[type="checkbox"]:checked').each((i, el) => {
               $(el).prop('checked', false);
           });

           $(e.target).prop('checked', true);
        });
    </script>
@endsection
