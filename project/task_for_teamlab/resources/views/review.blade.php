@extends('sample')

@section('title', 'Review')

@section('main_content')
    <div>
        <h1>Form for adding a review</h1>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <form method="post" action="/review/check">
        <div>
            @csrf
            <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control"><br>
            <input type="text" name="subject" id="subject" placeholder="Enter Review" class="form-control"><br>
            <textarea name="message" id="message" class="form-control" placeholder="Enter your message"></textarea><br>
            <button type="submit" class="btn btn-success">Send</button>
        </div>
        <div>
            <h1>Reviews</h1>
                <div class="alert alert-warning">
                    @foreach($reviews as $review)
                    <h3>{{ $review->subject }}</h3>
                    <b>{{ $review->email }}</b>>
                    <p>{{ $review->message }}</p>
                    @endforeach
                </div>
        </div>
    </form>
@endsection
