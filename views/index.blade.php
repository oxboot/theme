@extends('layouts.main')

@section('content')
  <div class="l-container">
    <div class="l-grid">
      @while (have_posts()) @php(the_post())
        @php(the_content())
      @endwhile
    </div>
  </div>
@endsection
