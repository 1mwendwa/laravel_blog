@extends('pages.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Contact Me</h1>
            <form action="" method="post">
                @csrf

                <div>
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>

                <div>
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" class="form-control">
                </div>

                <div>
                    <label for="message">Message</label>
                    <textarea name="message" rows="5" class="form-control"></textarea>
                </div>

                <button class="btn btn-primary mt-2">Send Message</button>

            </form>
        </div>
    </div>
</div>

@endsection
