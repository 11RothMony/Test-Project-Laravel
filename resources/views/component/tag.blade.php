<div class="card mb-4">
            <div class="card-header">Tags</div>
            <div class="card-body">
              <div class="row">
                  @foreach ($tag as $tag)
                    <div class="col-sm-6">
                      <a href="{{route('home', ['tag_id'=>$tag->id])}}">{{$tag->name}}</a>
                    </div>
                  @endforeach
                {{-- <div class="col-sm-6">
                  <ul class="list-unstyled mb-0">
                    <li><a href="#!">JavaScript</a></li>
                    <li><a href="#!">CSS</a></li>
                    <li><a href="#!">Tutorials</a></li>
                  </ul>
                </div> --}}
              </div>
            </div>
          </div>