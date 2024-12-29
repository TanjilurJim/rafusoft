@extends('dashboard.layout')

@php
    $index = 1;
    $in = 1;


    $mypath = auth()->user()->user_id;
        $destinationPath ="filemanager/dir_image/$mypath/";

        if(auth()->user()->role == "superadmin"){
            $destinationPath ='dir_image/';
        }

@endphp

@section('content')
    <section class="p-3">

        <div class="bg-[#343A40] p-3 rounded text-white">
            <h1 class="text-[20px]">Dir Page Images</h1>
        </div>


        
        <section class="mt-10">
            <div>
                <div id="croper-container" class="hidden" >
                    <div class="imageBox">
                        <div class="thumbBox"></div>
                        <div class="spinner" style="display: none">Loading...</div>
                    </div>
                    <input type="button" id="btnCrop" value="Crop" class="btn btn-orange mt-3" style="float: left">
                </div>

                <form id="drowpbox" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="preview-zone hidden">
                                        <div class="box box-solid">
                                            <div class="box-header with-border">
                                                <div><b>Preview</b></div>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-danger btn-xs remove-preview">
                                                        <i class="fa fa-times"></i> Reset This Form
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="box-body" id="box-preview"></div>
                                        </div>
                                    </div>
                                    <div class="dropzone-wrapper">
                                        <div class="dropzone-desc">
                                            <i class="fa-solid fa-download scale-150"></i>
                                            <p>Choose an image file or drag it here.</p>
                                        </div>
                                        <input type="file" id="file" onchange="hnadaleSelect()" name="file"
                                            class="dropzone">
                                        <input type="text" class="hidden" name="obj" id="fileInput">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-orange pull-right">Upload</button>
                            </div>
                        </div>
                    </div>
                </form>


            </div>



            <style>
                .box {
                    position: relative;
                    background: #ffffff;
                    width: 100%;
                }

                .box-header {
                    /* color: #444; */
                    display: block;
                    padding: 10px;
                    position: relative;
                    border-bottom: 1px solid #f4f4f4;
                    margin-bottom: 10px;
                }

                .box-tools {
                    position: absolute;
                    right: 10px;
                    top: 5px;
                }

                .dropzone-wrapper {
                    border: 2px dashed #91b0b3;
                    color: #0f1111;
                    position: relative;
                    height: 150px;
                }

                .dropzone-desc {
                    position: absolute;
                    margin: 0 auto;
                    left: 0;
                    right: 0;
                    text-align: center;
                    width: 40%;
                    top: 50px;
                    font-size: 16px;
                }

                .dropzone,
                .dropzone:focus {
                    position: absolute;
                    outline: none !important;
                    width: 100%;
                    height: 150px;
                    cursor: pointer;
                    opacity: 0;
                }

                .dropzone-wrapper:hover,
                .dropzone-wrapper.dragover {
                    background: #ecf0f5;
                }

                .preview-zone {
                    text-align: center;
                }

                .preview-zone .box {
                    box-shadow: none;
                    border-radius: 0;
                    margin-bottom: 0;
                }
            </style>

        </section>


    </section>

    <div class="p-3">
        <div>
            @foreach ($icons as $image)
                <div class="border py-1 my-1 px-2 rounded flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <img class="w-12" src="{{ asset($destinationPath . $image->getFilename()) }}" alt="Uploaded Image">
                        <p>{{ $image->getFilename() }}</p>
                    </div>
                    <div class="flex gap-4">
                        <button type="button" data-toggle="modal"
                            data-target="#exampleModal{{ $index++ }}"
                            class="bg-green-50 text-green-500 px-2 py-1 border border-green-500 rounded"><i
                                class="fa-solid fa-pen"></i></button>
                        <button onclick="handleCopy('<?php echo $image->getFilename(); ?>')"
                            class="bg-orange-50 text-orange-500 px-2 py-1 border border-orange-500 rounded"><i
                                class="fa-regular fa-copy"></i></button>
                        <button data-toggle="modal"
                            data-target="#deleteModal{{ $in++ }}"
                            class="bg-red-50 text-red-500 px-2 py-1 border border-red-500 rounded"><i
                                class="fa-solid fa-trash-can"></i></button>
                    </div>
                </div>
                {{-- rename modal  edit --}}
                <div class="modal fade" id="exampleModal{{ $index-1 }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel{{ $index-1 }}"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="POST" action="/dashboard/file/dir-image/rename" class="modal-content">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title"
                                    id="exampleModalLabel{{ $image->getFilename() }}">
                                    {{ $image->getFilename()}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Enter New File Name</p>
                                <input type="text" name="newname" class="form-control"
                                    value="{{ $image->getFilename() }}">
                                <input type="text" name="name" class="form-control hidden"
                                    value="{{ $image->getFilename() }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- rename modal  Delete --}}
                <div class="modal fade" id="deleteModal{{$in-1 }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel{{ $in-1 }}"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="POST" action="/dashboard/file/dir-image/delete" class="modal-content">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    {{ substr($image->getFilename(), 0, -4) }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you Sure ?</p>
                                <input type="text" name="name" class="form-control hidden"
                                    value="{{ $image->getFilename() }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach

        </div>

        <script>
            const handleCopy = (name) => {
                const host = window.location.origin;
                const folder = "<?php echo $destinationPath; ?>";
                const path = host + "/" + folder + name;
                const textarea = document.createElement('textarea');
                textarea.value = path;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);
                toastr.success('copyed');
            }


            function readFile(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        var htmlPreview =
                            '<img  id="img-preview-croped" class="ms-3" width="60" src="' + e.target.result + '" />' +
                            '<p>' + input.files[0].name + '</p>';
                        var wrapperZone = $(input).parent();
                        var previewZone = $(input).parent().parent().find('.preview-zone');
                        var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

                        wrapperZone.removeClass('dragover');
                        previewZone.removeClass('hidden');
                        boxZone.empty();
                        boxZone.append(htmlPreview);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            function reset(e) {
                e.wrap('<form>').closest('form').get(0).reset();
                e.unwrap();
            }

            $(".dropzone").change(function() {
                readFile(this);
            });

            $('.dropzone-wrapper').on('dragover', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).addClass('dragover');
            });

            $('.dropzone-wrapper').on('dragleave', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).removeClass('dragover');
            });

            $('.remove-preview').on('click', function() {
                var boxZone = $(this).parents('.preview-zone').find('.box-body');
                var previewZone = $(this).parents('.preview-zone');
                var dropzone = $(this).parents('.form-group').find('.dropzone');
                boxZone.empty();
                previewZone.addClass('hidden');
                reset(dropzone);
            });
        </script>

        @if (session('error'))
            <script>
                toastr.error('<?php echo session('error'); ?>')
            </script>
        @endif
    </div>
@endsection
