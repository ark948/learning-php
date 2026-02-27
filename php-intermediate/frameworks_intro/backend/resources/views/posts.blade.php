all posts
here is a post -> {{ $post }}

@if ($age >= 18)
    <p>You are an adult. {{ $age }}</p>
@else
    <p>You are a minor {{ $age }}.</p>
@endif