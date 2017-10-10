<!doctype html>
<html @php(language_attributes())>
  @include('partials.head')
  <body @php(body_class())>
    @php(do_action('get_header'))
    @include('partials.header')
    <div class="l-content">
      <main class="l-main">
        @yield('content')
      </main>
      @if (Oxboot\Theme\display_sidebar())
        <aside class="l-sidebar">
          @include('partials.sidebar')
        </aside>
      @endif
    </div>
    @php(do_action('get_footer'))
    @include('partials.footer')
    @php(wp_footer())
  </body>
</html>
