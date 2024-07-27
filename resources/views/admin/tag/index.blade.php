@extends('layouts.app')

@section('title', 'Tag')

@section('content')
<div class="row">
        <div class="d-flex justify-content-between mb-2">
          <h3>Category List</h3>
          <a class="btn btn-success" href="{{route('admin.tag.create')}}" role="button"
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
                  <th>Category</th>
                  <th style="width: 100px">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tags as $tag)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$tag->name}}</td>
                    <td>
                      <div class="d-flex grid gap-2">
                        <form method="POST" action="{{route('admin.tag.destroy', ['id'=> $tag->id])}}">
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
                        class="btn btn-primary btn-sm "
                        href="{{ route('admin.tag.edit', ['id'=>$tag->id])}}"
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
                  <th>Tag</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>

@endsection