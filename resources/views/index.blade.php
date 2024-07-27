@extends("layouts.app")

@section('title', 'Drone NR')

@push('page_style')
    
@endpush
  <Style>
    .limit_text {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2; /* number of lines to show */
            line-clamp: 2; 
    -webkit-box-orient: vertical;}
  </Style>
@section('content')

<div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
          <!-- Nested row for non-featured blog posts-->
          <div class="row">
            <div class="col-lg-12">
              <!-- Featured blog post-->
              {{-- <div class="card mb-4">
                <a href="{{route('article')}}"
                  ><img
                    class="card-img-top"
                    src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg"
                    alt="..."
                /></a>
                <div class="card-body">
                  <div class="small text-muted">January 1, 2022</div>
                  <h2 class="card-title">Featured Post Title</h2>
                  <p class="card-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a
                    laboriosam. Dicta expedita corporis animi vero voluptate
                    voluptatibus possimus, veniam magni quis!
                  </p>
                  <a class="btn btn-primary" href="{{route('article')}}">Read more →</a>
                </div>
              </div> --}}
            </div>
              <!-- Blog post-->
              @foreach ($posts as $post)
              <div class="col-lg-6">
                <div class="card mb-4" style="height: 450px;">
                  <a href="{{route('article', ['id' => $post->id])}}"
                    ><img
                      class="card-img-top"  style="height: 220px; object-fit: cover;"
                      {{-- src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" --}}
                      src="{{ asset('storage/'.$post->thumbnail)}}"
                      alt="..."
                  /></a>
                  <div class="card-body">
                    <div class="small text-muted">{{$post->created_at->format('F, d, Y')}}</div>
                    <h2 class="card-title h4 limit_text">{{$post->title}}</h2>
                    <p class="card-text limit_text">
                      {{$post->content}}
                    </p>
                    <a class="btn btn-primary" href="{{route('article', ['id' => $post->id])}}">Read more →</a>
                  </div>
                </div>
              </div>
              @endforeach
          </div>
          <!-- Pagination-->
          {{ $posts->links() }}
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
          <!-- Search widget-->
          @include('component.search')
          <!-- Tags widget-->
          @include('component.tag')
        </div>
      </div>
@endsection