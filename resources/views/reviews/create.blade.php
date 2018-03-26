@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Review') }}</div>

                <div class="card-body">
                    <form action="{{ route('reviews.store') }}" method="POST">
                        @csrf
                        @if(count($errors))
                           <div class="form-group">
                               <div class="alert alert-danger">
                                   <ul>
                                   @foreach ($errors->all() as $error)
                                       <li>{{ $error }}</li>
                                   @endforeach
                                   </ul>
                               </div>

                           </div>
                        @endif
                        <div>
                            <h3>{{ $account->name }}</h3>
                            @include('accounts.partials.date_info')
                        </div>
                        <div class="form-group">
                            <label for="name">{{__('Your Review')}}</label>
                            <textarea required minlength="20" maxlength="{{ $max_characters_per_review }}" class="form-control" name="review" id="review" aria-describedby="reviewHelp">{{ old('review') }}</textarea>
                            <small id="reviewHelp" class="form-text text-muted">Minimum of 20 and maximum of {{ $max_characters_per_review }} characters. Note: Site administrators may choose to publish a shortened version.</small>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="rating">{{ __('Rating') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input required class="form-check-input" type="radio" name="rating" id="rating_1" value="1" @if ( old('rating') == '1') checked @endif>
                                <label class="form-check-label" for="rating_1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input required class="form-check-input" type="radio" name="rating" id="rating_2" value="2" @if ( old('rating') == '2') checked @endif>
                                <label class="form-check-label" for="rating_2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input required class="form-check-input" type="radio" name="rating" id="rating_3" value="3" @if ( old('rating') == '3') checked @endif>
                                <label class="form-check-label" for="rating_3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input required class="form-check-input" type="radio" name="rating" id="rating_4" value="4" @if ( old('rating') == '4') checked @endif>
                                <label class="form-check-label" for="rating_4">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input required class="form-check-input" type="radio" name="rating" id="rating_5" value="5" @if ( old('rating') == '5') checked @endif>
                                <label class="form-check-label" for="rating_5">5</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">{{__('First Name')}}</label>
                            <input required minlength="2" maxlength="255" value="{{ old('name_first') }}" type="text" class="form-control" name="name_first" id="name_first" aria-describedby="name_firstHelp" placeholder="{{__('First Name')}}">
                        </div>
                        <div class="form-group">
                            <label for="name">{{__('Last Name')}}</label>
                            <input required minlength="2" maxlength="255" value="{{ old('name_last') }}" type="text" class="form-control" name="name_last" id="name_last" aria-describedby="name_lastHelp" placeholder="{{__('Last Name')}}">
                        </div>
                        <div class="form-group">
                            <label for="email">{{__('Email')}}</label>
                            <input required value="{{ old('email') }}" type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="{{__('Email')}}">
                            <small id="emailHelp" class="form-text text-muted">Maximum of 60 characters.</small>
                        </div>
                        <input type="hidden" name="account_id" value="{{ $account->id }}">
                        <button type="submit" class="btn btn-primary">{{ __('Publish Review') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
