@extends("layouts.app")
@section("title", "Post list")

@section('content')
<div class="row">
  <div class="d-flex justify-content-between mb-2">
    <h3>Post List</h3>
    <a class="btn btn-success" href="{{route('admin.post.create')}}" role="button"
      >Create</a
    >
  </div>
  <!-- Blog entries-->
  <div class="col-lg-12">
    <div class="card p-3">
      <table
        id="datatable"
        class="table table-striped"
        style="width: 100%"
      >
        <thead>
          <tr>
            <th>No</th>
            <th>Thumbnail</th>
            <th>Title</th>
            <th>Category</th>
            <th>Tag</th>
            <th style="width: 100px">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($post as $post)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>
              <img src="{{ asset('storage/'.$post->thumbnail)}}" style=" width: 50px;">
            </td>
            <td>{{$post->title}}</td>
            <td>{{$post->category->name}}</td>
            <td>
              <ul>
                @foreach ($post->tags as $tag)
                    <li>{{$tag->name}}</li>
                @endforeach
              </ul>
            </td>
            <td>
              <div class="d-flex grid gap-2">
                <form method="POST" action="{{route('admin.post.destroy', ['id'=> $post->id])}}">
                  @method('DELETE')
                  @csrf
                  <button
                      role="button"
                      type="submit"
                      class="btn btn-danger btn-sm ml-2"
                  >
                      Delete
                  </button>
                </form>
                <a
                  class="btn btn-primary btn-sm"
                  href="{{route('admin.post.edit', ['id'=>$post->id])}}"
                  role="button"
                  >Edit</a
                >
            </div>
            </td>
          </tr> 
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Thumbnail</th>
            <th>Title</th>
            <th>Tag</th>
            <th>Tag</th>
            <th style="width: 100px">Action</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
@endsection