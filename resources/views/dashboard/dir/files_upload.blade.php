@extends('dashboard.layout')
@php
    $index = 1;
    $in = 1;

    $mypath = auth()->user()->user_id;
    $destinationPath = "filemanager/$files/$mypath/";
@endphp


@section('content')
    <div class="p-3">
        <div class="bg-[#343A40] p-3 rounded text-white flex justify-between items-center">
            <h1 class="text-[20px]">{{ $title }}</h1>
            <a href="/dashboard/dir/user/files" class="btn btn-orange">Back</a>
        </div>
        <section>

           
            @if ($size < auth()->user()->dir_file_limit)
            <section class="mt-3">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="dropzone-wrapper">
                                        <div class="dropzone-desc">
                                            <i class="fa-solid fa-image scale-150"></i>
                                            <p class="mt-2">Choose an Image file or drag it here.</p>
                                        </div>
                                        <input type="file" onchange="getImage()" name="file" id="fileInput"
                                            class="dropzone">
                                        <button type="button" class="btn btn-primary hidden" id="image-preview-button"
                                            data-toggle="modal" data-target="#exampleModal"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <img id="imagePreview" class="hidden" src="" alt="Image Not Supported">
                                    <p id="error-message" class="text-center text-red-600 my-4 hidden">Image size does not
                                        match</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success " id="upload-button">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>          
            @else
            <div class="mt-5 mb-4">
                <div class="w-96 mx-auto bg-slate-200 shadow-inner  text-center py-2 rounded-sm">
                    <h1 class=" text-[22px] font-medium mb-3">Quota Exceeded</h1>
                    <a href="/contact" class="btn btn-orange"><i class="fa-solid fa-gem"></i> Upgrade Your Plane</a>
                </div>
            </div>
            @endif




        </section>



        <div id="image-list" class="p-3">
            <div>
                @foreach ($images as $image)
                    <div class="border py-1 my-1 px-2 rounded flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <img class="w-12" src="{{ asset($destinationPath . $image->getFilename()) }}"
                                alt="Uploaded Image">
                            <p>{{ $image->getFilename() }}</p>
                        </div>
                        <div class="flex gap-4">
                            <button type="button" data-toggle="modal" data-target="#exampleModal{{ $index++ }}"
                                class="bg-green-50 text-green-500 px-2 py-1 border border-green-500 rounded"><i
                                    class="fa-solid fa-pen"></i></button>
                            <button onclick="handleCopy('<?php echo $image->getFilename(); ?>')"
                                class="bg-orange-50 text-orange-500 px-2 py-1 border border-orange-500 rounded"><i
                                    class="fa-regular fa-copy"></i></button>
                            <button data-toggle="modal" data-target="#deleteModal{{ $in++ }}"
                                class="bg-red-50 text-red-500 px-2 py-1 border border-red-500 rounded"><i
                                    class="fa-solid fa-trash-can"></i></button>
                        </div>
                    </div>
                   

                    <div class="modal fade" id="exampleModal{{ $index - 1 }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel{{ $index - 1 }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST" action="/dashboard/dir/file/rename/{{$files}}" class="modal-content">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel{{ substr($image->getFilename(), 0, -4) }}">
                                        {{ substr($image->getFilename(), 0, -4) }}</h5>
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
                   
                    

                    <div class="modal fade" id="deleteModal{{ $in - 1 }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel{{ $in - 1 }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST" action="/dashboard/file/delete/{{$files}}" class="modal-content">
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
    
    
    
            </script>
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
                /* width: 40%; */
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

        <script>
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


        <script>
            function getImage() {
                const expectedHeight = <?php echo json_encode($height); ?>;
                const expectedWidth = <?php echo json_encode($width); ?>;
                document.getElementById('image-preview-button').click();
                const fileInput = document.getElementById('fileInput');
                const imagePreview = document.getElementById('imagePreview');
                const error = document.getElementById('error-message');
                const uploadButton = document.getElementById('upload-button');
                const reader = new FileReader();
                reader.onload = function(e) {

                    const img = new Image();
                    img.onload = function() {
        
                        if (expectedWidth == 0) {
                            imagePreview.classList.remove('hidden')
                            error.classList.add('hidden')
                            uploadButton.disabled = false;
                            imagePreview.src = e.target.result;
                        } else {
                            if (this.width == expectedWidth && this.height == expectedHeight) {
                                imagePreview.classList.remove('hidden')
                                error.classList.add('hidden')
                                uploadButton.disabled = false;
                                imagePreview.src = e.target.result;
                            } else {
                                error.classList.remove('hidden')
                                uploadButton.disabled = true;
                            }
                        }
                    }


                    img.src = e.target.result;
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        </script>

        @if (session('error'))
            <script>
                toastr.error('<?php echo session('error'); ?>')
            </script>
        @endif


        @error('icon')
            <script>
                toastr.error('<?php echo $message; ?>')
            </script>
        @enderror
    </div>
@endsection
