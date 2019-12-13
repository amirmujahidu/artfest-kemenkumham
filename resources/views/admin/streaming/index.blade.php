@extends('admin.layout.layout')

@section('title')
Streaming
@endsection

@section('nav2')
active
@endsection

@section('js')

<meta name="_token" content="{!! csrf_token() !!}" />
<script src="{{asset('lte-admin/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('lte-admin/plugins/ckeditor/ckeditor.js')}}"></script>
<script>
  $(function () {
    CKEDITOR.replace( 'description', {
      extraPlugins: 'imageuploader'
    });
  });
</script>

@include("admin.streaming.ajax")

@endsection
@section('css')
<link rel="stylesheet" href="{{asset('lte-admin/plugins/datepicker/datepicker3.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Streaming
        <small>Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{URL::Route('admin.index')}}"> Home</a></li>
        <li class="active">Streaming</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div id ="flash" class="col-md-12">
            </div>
            <div class="col-md-12" id="successflash">
                <div class="alert alert-success">
                <h4><i class="icon fa fa-check"></i> Data berhasil diupdate!</h4>
              </div>
            </div>
            <div class="col-md-12" id="failflash">
                <div class="alert alert-danger">
                <h4><i class="icon fa fa-check"></i> Data gagal diupdate!</h4>
                <div id="failerror"></div>
              </div>
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                    <!--<h3 class="box-title">Data Table With Full Features</h3>-->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Schedule</th>
                                <th>Link</th>
                                <th>Live</th>
                                <th>Headline</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="datalist">
                            @foreach($streaming as $stream)
                            <tr id="row{{$stream['id']}}">
                               
                                <td>{{$stream['title']}}</td>
                                <td>{{$stream['schedule']}}</td>
                                <td>{{$stream['link_embed']}}</td>
                                <td>@if($stream->is_live == 1)
                                    YES
                                    @else
                                    NO
                                    @endif
                                </td>
                                <td>@if($stream->is_headline == 1)
                                    YES
                                    @else
                                    NO
                                    @endif
                                </td>
                                <td> 
                                    <button type="button" class="btn btn-info editModal" data-toggle="modal" data-target="#editModal" value="{{$stream['id']}}">
                                    Edit
                                    </button>
                                    <button type="button" class="btn btn-danger deleteModal" data-toggle="modal" data-target="#deleteModal" value="{{$stream['id']}}">
                                    Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <center>
                      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editModal" id="btn-add">Tambah</button>
                    </center>

                    </div>

                    <!-- /.box-body -->
                </div>
            </div>
        </div>



    </section>

    <div class="example-modal">
        <div class="modal" id="editModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Streaming</h4>
              </div>
              <div class="modal-body">
                <form id="form" name="form">
                  <input type="hidden" name="id" value="" id="id">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="link_embed">Link</label>
                    <input type="text" class="form-control" id="link_embed" placeholder="Link" name="link_embed">
                  </div>
                  <div class="form-group">
                    <label>Schedule</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="schedule" name="schedule">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <label>LIVE</label>
                    <select class="form-control" id="is_live" name="is_live">
                      <option value="1">YES</option>
                      <option value="0">NO</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Headline</label>
                    <select class="form-control" id="is_headline" name="is_headline">
                      <option value="1">YES</option>
                      <option value="0">NO</option>
                    </select>
                  </div>
                  <input type="submit" value="submit" style="display:none;">
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-save">Save</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <div class="modal" id="deleteModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus Data</h4>
              </div>
              <div class="modal-body">
                <p>Anda yakin ingin menghapus data?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="btndelete">Delete</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
      <!-- /.example-modal -->


    <!-- /.content -->
    @endsection