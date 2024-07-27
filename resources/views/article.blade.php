 @extends("layouts.app")
 @section('title', 'Blog')

 @section('content')
 <div class="container mt-5">
      <div class="row">
        <div class="col-lg-8">
          <!-- Post content-->
          <article>
            <!-- Post header-->
            <header class="mb-4">
              <!-- Post title-->
              <h1 class="fw-bolder mb-1">{{$post->title}}</h1>
              <!-- Post meta content-->
              <div class="text-muted fst-italic mb-2">
                Posted on January 1, 2022 by Young Rothmony
              </div>
              <!-- Post categories-->
              @foreach ($post->tags as $tag)
                <a
                class="badge bg-secondary text-decoration-none link-light"
                href="#!"
                >
                {{$tag->name}}
                </a>
              @endforeach
            </header>
            <!-- Preview image figure-->
            <figure class="mb-4">
              <img
                class="img-fluid rounded"
                {{-- src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" --}}
                src="{{ asset('storage/'.$post->thumbnail)}}"
                alt="..."
              />
            </figure>
            <!-- Post content-->
            <section class="mb-5">
              <p class="fs-5 mb-4">
                {{ $post->content}}
              </p>
            </section>
          </article>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
          <!-- Search widget-->
           @include("component.search")
          <!-- Tags widget-->
           @include("component.tag")
        </div>
      </div>
    </div>
@endsection