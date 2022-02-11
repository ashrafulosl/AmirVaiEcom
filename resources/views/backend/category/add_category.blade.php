@extends('backend.master.backend_master')
@section('title','Dashboard')

    @section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
    @endsection
@section('body')




<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12">
                <div class="ml-auto text-left">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL('makecommand')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-12">
                <div class="card widget-box">
                    <div class="card-header  widget-title">
                        <h5 class="card-title">Add Category</h5>
                    </div>
                    <div class="card-body">
                    <form autocomplete="off" action="{{URL('makecommand/insert_category')}}" method="post" enctype='multipart/form-data'>
                      {{csrf_field()}}

                        <div class="control-group col-md-12 col-12">
                            <label class="control-label col-md-3 col-12">
                                Category Name :
                            </label>
                            <div class="controls col-md-9 col-12">
                                <input type="text" name="name" id="name" class="" required>
                            </div>
                        </div>

                        <div class="control-group col-md-12 col-12">
                            <label class="control-label col-md-3 col-12">
                                Parent Name:
                            </label>
                            <div class="controls col-md-9 col-12">
                                <select data-live-search="true" name="parent_id" class="selectpicker" required>
                                    <option value="0">root</option>
                                    @foreach($d_parent_id as $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="control-group col-md-12 col-12">
                            <label class="control-label col-md-3 col-12">
                                Icon:
                            </label>
                            <div class="controls col-md-9 col-12">
                              <input type="file" class="" name="icon" id="w4-image" onchange="readURL(this);">
                              <div class="show_img_in_input_w">
                                   <img id="blah" class="show_img_in_input" src="" alt="your image" />
                              </div>
                                <script type="text/javascript">
                                function readURL(input) {
                                if (input.files && input.files[0]) {
                                  var reader = new FileReader();
                                  reader.onload = function (e) {
                                      $('#blah').attr('src', e.target.result);};
                                  reader.readAsDataURL(input.files[0]);}}
                                </script>
                            </div>
                        </div>
                        <div class="control-group col-md-12 col-12">
                            <label class="control-label col-md-3 col-12">
                                Description:
                            </label>
                            <div class="col-md-9 col-12">
                                <textarea id="editor" name="description" class="editor1"></textarea>
                            </div>
                        </div>

                        <div class="control-group col-md-12 col-12">
                        <br><hr><br>
                            <label class="control-label col-md-3 col-12">
                                Enable this categoy:
                            </label>
                            <div class="controls col-md-9 col-12">
                                <input type="checkbox" checked name="status" value="1">
                            </div>
                        </div>

                        <div class="control-group col-md-12 col-12">
                              <div class="show_img_in_input_w">
                                <input type="submit" value="save" class="btn btn-primary">
                              </div>
                        </div>

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

                <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
                <script>
                    ClassicEditor
                        .create( document.querySelector( '#editor' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>

@endsection

