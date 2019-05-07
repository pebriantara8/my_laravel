@extends('admin/layouts.index')
@section('content')
      <!-- Main Content -->
      <div class="main-content">
            <section class="section">
              <div class="section-header">
                <div class="section-header-back">
                  <a href="/ap/artikel" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>{{isset($title_page)?$title_page:'Post'}}</h1>
                <div class="section-header-breadcrumb">
                  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                  <div class="breadcrumb-item"><a href="#">Posts</a></div>
                  <div class="breadcrumb-item">Form Post</div>
                </div>
              </div>
    
              <div class="section-body">
    
                <div class="row">
                  <div class="col-12">
                    @include('admin/layouts.flash_message')
                    <form class="needs-validation" action="/ap/artikel/save" method="post" novalidate="" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{Request::segment(4)}}">
                    <div class="card">
                      <div class="card-header">
                        <h4>Write Your Post</h4>
                      </div>
                      <div class="card-body">
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                          <div class="col-sm-12 col-md-7">
                          <input type="text" name="judul" class="form-control" value="{{isset($artikel->judul)?$artikel->judul:''}}" required="">
                            <div class="invalid-feedback">
                                Judul tidak boleh kosong
                            </div>
                          </div>
                        </div>
                        {{-- <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                          <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric">
                              <option>Tech</option>
                              <option>News</option>
                              <option>Political</option>
                            </select>
                          </div>
                        </div> --}}
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                          <div class="col-sm-12 col-md-7">
                            <textarea name="konten" class="summernote-simple" required="">{{isset($artikel->judul)?$artikel->konten:''}}</textarea>
                            <div class="invalid-feedback">
                                Isi konten tidak boleh kosong
                            </div>
                          </div>
                        </div>
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                          <div class="col-sm-12 col-md-7">
                            {{-- <div id="image-preview" class="image-preview"> --}}
                            <div>
                              {{-- <label for="image-upload" id="image-label">Choose File</label> --}}
                              <input type="file" name="image" class="form-control-file" id="image-upload" {{isset($artikel->image)?'required':'required'}}/>
                              <div class="invalid-feedback">
                                Gambar harus diisi
                              </div>
                            </div>
                          </div>
                        </div>
                        {{-- <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                          <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control inputtags">
                          </div>
                        </div> --}}
                        {{-- <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                          <div class="col-sm-12 col-md-7">
                            <select class="form-control selectric">
                              <option>Publish</option>
                              <option>Draft</option>
                              <option>Pending</option>
                            </select>
                          </div>
                        </div> --}}
                        @if(!isset($only_view))
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                          <div class="col-sm-12 col-md-7">
                            <button class="btn btn-primary">Save Post</button>
                          </div>
                        </div>
                        @endif
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </section>
          </div>

          <script src="{{ url('') }}/a_/assets/modules/summernote/summernote-bs4.js"></script>
          <script src="{{ url('') }}/a_/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
          <script src="{{ url('') }}/a_/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
          <script src="{{ url('') }}/a_/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

@endsection

