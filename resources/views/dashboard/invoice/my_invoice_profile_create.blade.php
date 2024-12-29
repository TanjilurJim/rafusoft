@extends('dashboard.layout')


@section('content')
    <div class="p-3">
        <div class="bg-[#343A40] p-3 rounded text-white">
            <h1 class="text-[20px]">Create Invoice Setting</h1>
        </div>
        <section">
            <div class=" my-3">
                <label for="logo">Your Logo</label>
                <div id="croper-container" class="hidden">
                    <div class="imageBox" id="noScrollDiv">
                        <div class="thumbBox"></div>
                        <div class="spinner" style="display: none">Loading...</div>
                    </div>
                </div>
                <form method="POST" enctype="multipart/form-data" class="action" enctype="multipart/form-data">
                    @csrf
                    <div id="crop-box text-start ">
                        <input type="file" onchange="hnadaleSelect()" class="form-control my-3 border" id="file">
                        <input type="text" class="hidden" name="logo" id="fileInput">
                        <input type="button" id="btnCrop" value="Crop" class="btn btn-orange mt-5" ">
                        </div>
                        <div class="cropped">
                        </div>


                        <div class="from-control">
                            <label for="From">From</label>
                            <textarea rows="1" name="from"
                                class="resize-none overflow-hidden auto-rows-auto p-2 border focus:outline-none text-gray-500 border-slate-100 w-full  rounded"></textarea>
                         @error('from')
        <p class="my-3 text-red-600"></p>
    @enderror
                                     </div>
                        <div class="from-control">
                            <label for="From">Notes (optional)</label>
                            <textarea rows="1" name="notes"
                                class="resize-none auto-rows-auto overflow-hidden p-2 border focus:outline-none text-gray-500 border-slate-100 w-full  rounded"
                                placeholder="Notes - any relevant information not already covered"></textarea>
                            @error('notes')
        <p class="my-3 text-red-600"></p>
    @enderror
                        </div>
                        <div class="from-control">
                            <label for="From">Terms (optional)</label>
                            <textarea rows="1" name="terms"
                                class="resize-none overflow-hidden auto-rows-auto p-2 border focus:outline-none text-gray-500 border-slate-100 w-full  rounded"
                                placeholder="Terms and conditions - late fees, payment methods, delivery schedule"></textarea>
                            @error('terms')
        <p class="my-3 text-red-600">{{ $message }}</p>
    @enderror
                        </div>
            
            
                        <button class="btn btn-orange mt-4">Save</button>
                    </form>

                </div>
                <script>
                    window.onload = function() {
                        var options = {
                            imageBox: '.imageBox',
                            thumbBox: '.thumbBox',
                            spinner: '.spinner',
                            imgSrc: 'avatar.png'
                        }
                        var cropper;


                        document.getElementById('btnCrop').classList.add('hidden');
                        console.log(document.getElementById('btnCrop'))


                        document.querySelector('#file').addEventListener('change', function() {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                options.imgSrc = e.target.result;
                                cropper = new cropbox(options);
                            }
                            reader.readAsDataURL(this.files[0]);
                            // this.files = [];

                            console.log('changed')
                            document.getElementById('btnCrop').classList.remove('hidden')
                            document.getElementById('file').classList.add('hidden')


                        })
                        document.querySelector('#btnCrop').addEventListener('click', function() {
                            var imgDataUrl = cropper.getDataURL()
                            document.getElementById('btnCrop').classList.add('hidden');
                            const fileInput = document.getElementById('fileInput');
                            fileInput.value = imgDataUrl;
                            document.querySelector('.cropped').innerHTML += '<img src="' + imgDataUrl + '">';
                            document.getElementById('fileInput').value = imgDataUrl;

                            const cropperContainer = document.getElementById('croper-container');
                            const cropbox = document.getElementById('crop-box');
                            const submit = document.getElementById('submit');
                            cropperContainer.style.display = "none"
                            cropbox.style.display = "none"
                            submit.style.display = "block"
                            document.getElementById('image-list').style.display = "block"



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
                    .imageBox {
                        position: relative;
                        height: 250px;
                        width: 200px;
                        border: 1px solid #aaa;
                        background: #fff;
                        overflow: hidden;
                        background-repeat: no-repeat;
                        cursor: move;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    }

                    .imageBox .thumbBox {
                        width: 200px;
                        height: 80px;
                        box-sizing: border-box;
                        border: 1px solid rgb(102, 102, 102);
                        box-shadow: 0 0 0 1000px rgba(0, 0, 0, 0.5);
                        background: none repeat scroll 0% 0% transparent;
                        border-radius: 3px;
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
            <script src="{{ asset('assets/js/invoice.js') }}"></script>

            </section>
        </div>
@endsection
