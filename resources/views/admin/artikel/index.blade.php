@extends('admin/layouts.index')
@section('content')
      <!-- Main Content -->
      <div class="main-content">
            <section class="section">
              <div class="section-header">
                <h1>Posts</h1>
                <div class="section-header-button">
                  <a href="{{url('')}}/ap/artikel/add" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                  <div class="breadcrumb-item"><a href="#">Posts</a></div>
                  <div class="breadcrumb-item">All Posts</div>
                </div>
              </div>
              <div class="section-body">
    
                {{-- <div class="row">
                  <div class="col-12">
                    <div class="card mb-0">
                      <div class="card-body">
                        <ul class="nav nav-pills">
                          <li class="nav-item">
                            <a class="nav-link active" href="#">All <span class="badge badge-white">5</span></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Draft <span class="badge badge-primary">1</span></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Pending <span class="badge badge-primary">1</span></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Trash <span class="badge badge-primary">0</span></a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div> --}}
                <div class="row mt-4">
                  <div class="col-12">
                    @include('admin/layouts.flash_message')
                    <div class="card">
                      <div class="card-header">
                        <h4>All Posts</h4>
                      </div>
                      <div class="card-body">
                        <div class="float-left">
                          <select class="form-control selectric">
                            <option>Action For Selected</option>
                            <option>Move to Draft</option>
                            <option>Move to Pending</option>
                            <option>Delete Pemanently</option>
                          </select>
                        </div>
                        <div class="float-right">
                          <form>
                            <div class="input-group">
                              <input type="text" class="form-control" placeholder="Search">
                              <div class="input-group-append">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                              </div>
                            </div>
                          </form>
                        </div>
    
                        <div class="clearfix mb-3"></div>
    
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <tr>
                              <th class="text-center pt-2">
                                <div class="custom-checkbox custom-checkbox-table custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                  <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                </div>
                              </th>
                              <th>No</th>
                              <th>Title</th>
                              {{-- <th>Category</th> --}}
                              <th>Author</th>
                              <th>Created At</th>
                              <th>Status</th>
                            </tr>
                            @foreach ($artikel as $key => $item)

                            <tr>
                              <td class="text-center">
                                <div class="custom-checkbox custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                  <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                                </div>
                              </td>
                              <td>
                                {{$key + $artikel->firstItem()}}
                              </td>
                              <td>{{ $item->judul }}
                                <div class="table-links">
                                <a href="/ap/artikel/view/{{$item->id}}">View</a>
                                  <div class="bullet"></div>
                                  <a href="/ap/artikel/edit/{{$item->id}}">Edit</a>
                                  <div class="bullet"></div>
                                  <a href="javascript:void(0)" data-href="/ap/artikel/delete/{{$item->id}}" data-toggle="modal" data-target="#confirm-delete" class="text-danger">Trash</a>
                                </div>
                              </td>
                              {{-- <td>
                                <a href="#">Web Developer</a>,
                                <a href="#">Tutorial</a>
                              </td> --}}
                              <td>
                                <a href="#">
                                <img alt="image" src="{{asset('files/artikel/image/'.$item->cover)}}" class="rounded-circle" width="35" data-toggle="title" title=""> <div class="d-inline-block ml-1">{{ $item->user->nama }}</div>
                                {{-- <img alt="image" src="{{ public_path('files/artikel/image/'.$item->cover) }}" class="rounded-circle" width="35" data-toggle="title" title=""> <div class="d-inline-block ml-1">{{ $item->user->nama }}</div> --}}
                                {{-- <img alt="image" src="{{ asset('storage/public/artikel/image/'.$item->cover) }}" class="rounded-circle" width="35" data-toggle="title" title=""> <div class="d-inline-block ml-1">{{ $item->user->nama }}</div> --}}
                                </a>
                              </td>
                              <td>{{ $item->created_at }}</td>
                              <td><div class="badge badge-primary">Published</div></td>
                            </tr>
                                                            
                            @endforeach

                          </table>
                        </div>
                        <div class="float-right">
                          <nav>
                              {{$artikel->onEachSide(1)->render()}}
                          </nav>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>

            <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            Are you sure?
                        </div>
                        <div class="modal-body">
                            Delete post
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-danger btn-ok">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $('#confirm-delete').on('show.bs.modal', function(e) {
                    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                });
            </script>
@endsection