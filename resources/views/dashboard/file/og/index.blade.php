@extends('dashboard.layout')


@php
    $index = 1;
    $in = 1;

    $mypath = auth()->user()->user_id;
        $destinationPath ="filemanager/og_image/$mypath/";

        if(auth()->user()->role == "superadmin"){
            $destinationPath ='og_image/';
        }
@endphp



@section('content')
    <div class="p-3">
       

        <div class="bg-[#343A40] p-3 rounded text-white">
            <h1 class="text-[20px]">Open Graph Images (1200 * 630) px</h1>
        </div>

       

        <section class="mt-5">
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
            <script type="text/javascript">
                window.onload = function() {
                    var options = {
                        imageBox: '.imageBox',
                        thumbBox: '.thumbBox',
                        spinner: '.spinner',
                        imgSrc: 'avatar.png'
                    }
                    var cropper;
                    document.querySelector('#file').addEventListener('change', function() {
                        document.getElementById('image-list').style.display = "none"
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            options.imgSrc = e.target.result;
                            cropper = new cropbox(options);
                        }
                        reader.readAsDataURL(this.files[0]);
                        this.files = [];
                    })
                    document.querySelector('#btnCrop').addEventListener('click', function() {
                        var imgDataUrl = cropper.getDataURL()

                        const fileInput = document.getElementById('fileInput');
                        fileInput.value = imgDataUrl;


                        const img_preview_croped = document.getElementById('img-preview-croped');
                        img_preview_croped.src = imgDataUrl;


                        const cropperContainer = document.getElementById('croper-container');
                        cropperContainer.style.display = "none"

                        const drowpbox = document.getElementById('drowpbox');
                        drowpbox.style.display = "block"
                    })

                    document.querySelector('#btnZoomIn').addEventListener('click', function() {
                        cropper.zoomIn();
                    })
                    document.querySelector('#btnZoomOut').addEventListener('click', function() {
                        cropper.zoomOut();
                    })
                };
            </script>

            <script>
                const cropperContainer = document.getElementById('croper-container');
                const file = document.getElementById('file');


                const hnadaleSelect = () => {
                    cropperContainer.classList.remove('hidden');
                    const drowpbox = document.getElementById('drowpbox');
                    drowpbox.style.display = "none"
                }
            </script>


            <script>
                'use strict';
                var cropbox = function(options) {
                    var el = document.querySelector(options.imageBox),
                        obj = {
                            state: {},
                            ratio: 1,
                            options: options,
                            imageBox: el,
                            thumbBox: el.querySelector(options.thumbBox),
                            spinner: el.querySelector(options.spinner),
                            image: new Image(),
                            getDataURL: function() {
                                var width = this.thumbBox.clientWidth,
                                    height = this.thumbBox.clientHeight,
                                    canvas = document.createElement("canvas"),
                                    dim = el.style.backgroundPosition.split(' '),
                                    size = el.style.backgroundSize.split(' '),
                                    dx = parseInt(dim[0]) - el.clientWidth / 2 + width / 2,
                                    dy = parseInt(dim[1]) - el.clientHeight / 2 + height / 2,
                                    dw = parseInt(size[0]),
                                    dh = parseInt(size[1]),
                                    sh = parseInt(this.image.height),
                                    sw = parseInt(this.image.width);

                                canvas.width = width;
                                canvas.height = height;
                                var context = canvas.getContext("2d");
                                context.drawImage(this.image, 0, 0, sw, sh, dx, dy, dw, dh);
                                var imageData = canvas.toDataURL('image/png');
                                return imageData;
                            },
                            getBlob: function() {
                                var imageData = this.getDataURL();
                                var b64 = imageData.replace('data:image/png;base64,', '');
                                var binary = atob(b64);
                                var array = [];
                                for (var i = 0; i < binary.length; i++) {
                                    array.push(binary.charCodeAt(i));
                                }
                                return new Blob([new Uint8Array(array)], {
                                    type: 'image/png'
                                });
                            },
                            zoomIn: function() {
                                this.ratio *= 1.1;
                                setBackground();
                            },
                            zoomOut: function() {
                                this.ratio *= 0.9;
                                setBackground();
                            }
                        },
                        attachEvent = function(node, event, cb) {
                            if (node.attachEvent)
                                node.attachEvent('on' + event, cb);
                            else if (node.addEventListener)
                                node.addEventListener(event, cb);
                        },
                        detachEvent = function(node, event, cb) {
                            if (node.detachEvent) {
                                node.detachEvent('on' + event, cb);
                            } else if (node.removeEventListener) {
                                node.removeEventListener(event, render);
                            }
                        },
                        stopEvent = function(e) {
                            if (window.event) e.cancelBubble = true;
                            else e.stopImmediatePropagation();
                        },
                        setBackground = function() {
                            var w = parseInt(obj.image.width) * obj.ratio;
                            var h = parseInt(obj.image.height) * obj.ratio;

                            var pw = (el.clientWidth - w) / 2;
                            var ph = (el.clientHeight - h) / 2;

                            el.setAttribute('style',
                                'background-image: url(' + obj.image.src + '); ' +
                                'background-size: ' + w + 'px ' + h + 'px; ' +
                                'background-position: ' + pw + 'px ' + ph + 'px; ' +
                                'background-repeat: no-repeat');
                        },
                        imgMouseDown = function(e) {
                            stopEvent(e);

                            obj.state.dragable = true;
                            obj.state.mouseX = e.clientX;
                            obj.state.mouseY = e.clientY;
                        },
                        imgMouseMove = function(e) {
                            stopEvent(e);

                            if (obj.state.dragable) {
                                var x = e.clientX - obj.state.mouseX;
                                var y = e.clientY - obj.state.mouseY;

                                var bg = el.style.backgroundPosition.split(' ');

                                var bgX = x + parseInt(bg[0]);
                                var bgY = y + parseInt(bg[1]);

                                el.style.backgroundPosition = bgX + 'px ' + bgY + 'px';

                                obj.state.mouseX = e.clientX;
                                obj.state.mouseY = e.clientY;
                            }
                        },
                        imgMouseUp = function(e) {
                            stopEvent(e);
                            obj.state.dragable = false;
                        },
                        zoomImage = function(e) {
                            var evt = window.event || e;
                            var delta = evt.detail ? evt.detail * (-120) : evt.wheelDelta;
                            delta > -120 ? obj.ratio *= 1.1 : obj.ratio *= 0.9;
                            setBackground();
                        }

                    obj.spinner.style.display = 'block';
                    obj.image.onload = function() {
                        obj.spinner.style.display = 'none';
                        setBackground();

                        attachEvent(el, 'mousedown', imgMouseDown);
                        attachEvent(el, 'mousemove', imgMouseMove);
                        attachEvent(document.body, 'mouseup', imgMouseUp);
                        var mousewheel = (/Firefox/i.test(navigator.userAgent)) ? 'DOMMouseScroll' : 'mousewheel';
                        attachEvent(el, mousewheel, zoomImage);
                    };
                    obj.image.src = options.imgSrc;
                    attachEvent(el, 'DOMNodeRemoved', function() {
                        detachEvent(document.body, 'DOMNodeRemoved', imgMouseUp)
                    });

                    return obj;
                };
            </script>


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

            <style>
                .imageBox {
                    position: relative;
                    height: 700px;
                    width: 1400px;
                    border: 1px solid #aaa;
                    background: #fff;
                    overflow: hidden;
                    background-repeat: no-repeat;
                    cursor: move;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    /* transform: scale(0.5); */
                }

                .imageBox .thumbBox {
                    width: 1202px;
                    height: 632px;
                    box-sizing: border-box;
                    border: 1px solid rgb(102, 102, 102);
                    box-shadow: 0 0 0 1000px rgba(0, 0, 0, 0.5);
                    background: none repeat scroll 0% 0% transparent;
                }

                .imageBox .spinner {
                    position: absolute;
                    top: 0;
                    left: 0;
                    bottom: 0;
                    right: 0;
                    text-align: center;
                    line-height: 400px;
                    background: rgba(0, 0, 0, 0.7);
                }
            </style>


        </section>


    </div>

    {{-- list section  --}}
        <div id="image-list" class="mt-10 p-3">
            <div>
                @foreach ($icons as $image)
                    <div class="border py-1 my-1 px-2 rounded flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            {{-- <img class="h-10 w-16" src="{{ asset('og_image/' . $image->getFilename()) }}" alt="Uploaded Image"> --}}
                            <img class="w-12" src="{{ asset($destinationPath . $image->getFilename()) }}" alt="Uploaded Image">
                            <p>{{ $image->getFilename() }}</p>
                        </div>
                        <div class="flex gap-4">
                            <button type="button" data-toggle="modal"
                                data-target="#exampleModal{{$index++}}"
                                class="bg-green-50 text-green-500 px-2 py-1 border border-green-500 rounded"><i
                                    class="fa-solid fa-pen"></i></button>
                            <button onclick="handleCopy('<?php echo $image->getFilename(); ?>')"
                                class="bg-orange-50 text-orange-500 px-2 py-1 border border-orange-500 rounded"><i
                                    class="fa-regular fa-copy"></i></button>
                            <button data-toggle="modal"
                                data-target="#deleteModal{{$in++ }}"
                                
                                class="bg-red-50 text-red-500 px-2 py-1 border border-red-500 rounded"><i
                                    class="fa-solid fa-trash-can"></i></button>
                        </div>
                    </div>
                    {{-- rename modal  edit --}}
                    <div class="modal fade" id="exampleModal{{ $index-1 }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel{{ $index-1}}"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST" action="/dashboard/file/og_image/rename" class="modal-content">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title"
                                        id="exampleModalLabel{{ substr($image->getFilename(), 0, -4) }}">
                                        {{ substr($image->getFilename(), 0, -4) }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Enter New File Name</p>
                                    <input type="text" name="newname" class="form-control"
                                        value="{{ substr($image->getFilename(), 0, -4) }}">
                                    <input type="text" name="name" class="form-control hidden"
                                        value="{{ substr($image->getFilename(), 0, -4) }}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- rename modal  Delete --}}
                    <div class="modal fade" id="deleteModal{{ $in-1 }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel{{ $in-1 }}"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST" action="/dashboard/file/og_imge/delete" class="modal-content">
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





                 // file uploader 


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
            </script>
        </div>
@endsection
