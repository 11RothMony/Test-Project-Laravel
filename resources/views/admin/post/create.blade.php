@extends('layouts.app')

@section('title', 'Post create')

@section('content')
<div class="row">
  <div class="d-flex justify-content-between mb-2">
    <h3>Create Category</h3>
    <a class="btn btn-success" href="{{ route('admin.post.index')}}" role="button">Back</a>
  </div>
  <!-- Blog entries-->
  <div class="col-lg-12">
    <div class="card p-3">
      <form method="POST" action="{{route('admin.post.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input
            type="text"
            class="form-control"
            id="title"
            name="title"
          />
        </div>
        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <textarea
            class="form-control"
            id="content"
            name="content"
            rows="5"
          ></textarea>
        </div>
        <div class="mb-3">
          <label for="thumbnail" class="form-label"
            >Choose Thumbnail</label
          >
          <input
            class="form-control"
            type="file"
            id="thumbnail"
            name="thumbnail"
          />
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select
            class="form-select"
            name="category_id"
            aria-label="Default select example"
          >
            <option selected>Select Category</option> 
            @foreach($category as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="tags" class="form-label">Tag</label>
          <div class="tag-wrapper">
            @foreach ($tag as $tag)
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="checkbox"
                name="tags[]"
                value="{{$tag->id}}"
                id="tag{{$tag->id}}"
              />
              <label class="form-check-label" for="tag1">{{$tag->name}}</label>
            </div>
            @endforeach
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif  
  </div>
</div>
@endsection