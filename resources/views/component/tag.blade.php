<div class="card mb-4">
  <div class="card-header">Tags</div>
  <div class="card-body">
    <div class="row">
        @foreach ($tags as $tag)
          <div class="col-sm-6">
            <a href="{{route('home', ['tag_id'=>$tag->id])}}">{{$tag->name}}</a>
          </div>
        @endforeach
    </div>
  </div>
</div>