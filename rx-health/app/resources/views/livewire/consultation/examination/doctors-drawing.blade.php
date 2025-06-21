<div>
    <div class="content">
        {{-- jQuery --}}
        <script type="text/javascript" src="{{ asset('packages/wPaint/lib/jquery.1.10.2.min.js') }}"></script>
        <!-- jQuery UI -->
        <script type="text/javascript" src="{{ asset('packages/wPaint/lib/jquery.ui.core.1.10.3.min.js') }}"></script>
        <script
            type="text/javascript"
            src="{{ asset('packages/wPaint/lib/jquery.ui.widget.1.10.3.min.js') }}"
        ></script>
        <script type="text/javascript" src="{{ asset('packages/wPaint/lib/jquery.ui.mouse.1.10.3.min.js') }}"></script>
        <script
            type="text/javascript"
            src="{{ asset('packages/wPaint/lib/jquery.ui.draggable.1.10.3.min.js') }}"
        ></script>

        <!-- wColorPicker -->
        <link rel="Stylesheet" type="text/css" href="{{ asset('packages/wPaint/lib/wColorPicker.min.css') }}" />
        <script type="text/javascript" src="{{ asset('packages/wPaint/lib/wColorPicker.min.js') }}"></script>

        <!-- wPaint -->
        <link rel="Stylesheet" type="text/css" href="{{ asset('packages/wPaint/wPaint.min.css') }}" />
        <script type="text/javascript" src="{{ asset('packages/wPaint/wPaint.min.js') }}"></script>
        <script
            type="text/javascript"
            src="{{ asset('packages/wPaint/plugins/main/wPaint.menu.main.min.js') }}"
        ></script>
        <script
            type="text/javascript"
            src="{{ asset('packages/wPaint/plugins/text/wPaint.menu.text.min.js') }}"
        ></script>
        <script
            type="text/javascript"
            src="{{ asset('packages/wPaint/plugins/shapes/wPaint.menu.main.shapes.min.js') }}"
        ></script>
        <script
            type="text/javascript"
            src="{{ asset('packages/wPaint/plugins/file/wPaint.menu.main.file.min.js') }}"
        ></script>

        <style>
            .wPaint-menu.ui-draggable.wPaint-menu-alignment-horizontal {
                width: 100% !important;
                height: 42px !important;
                margin: 0 auto !important;
            }

            .wpaint-canvas-res {
                position: relative;
                width: 500px !important;
                height: 200px;
                background-color: #7a7a7a;
                margin: 70px auto 20px auto;
            }

            /* responsiveness for mobile */
            @media (max-width: 576px) {
                .wpaint-canvas-res {
                    width: 250px !important;
                }
            }
        </style>

        <div wire:ignore class="my-2">
            <div id="wPaint" class="wpaint-canvas-res"></div>
        </div>

        {{--
            <center style="margin-bottom: 50px;">
            <input type="button" value="toggle menu" onclick="console.log($('#wPaint').wPaint('menuOrientation')); $('#wPaint').wPaint('menuOrientation', $('#wPaint').wPaint('menuOrientation') === 'vertical' ? 'horizontal' : 'vertical');"/>
            </center>
        --}}

        <center id="wPaint-img"></center>

        <script type="text/javascript">
            var images = ['https://minio.jamsinfra.com/s3-test6150903c-28d9-4412-9067-be8b719f8e36.png'];

            function saveImg(image) {
                var _this = this;

                @this.saveDrawing(image);

                // $.ajax({
                //     type: 'POST',
                //     url: '/test/upload.php',
                //     data: { image: image },
                //     success: function (resp) {
                //         // internal function for displaying status messages in the canvas
                //         _this._displayStatus('Image saved successfully');

                //         // doesn't have to be json, can be anything
                //         // returned from server after upload as long
                //         // as it contains the path to the image url
                //         // or a base64 encoded png, either will work
                //         resp = $.parseJSON(resp);

                //         // update images array / object or whatever
                //         // is being used to keep track of the images
                //         // can store path or base64 here (but path is better since it's much smaller)
                //         images.push(resp.img);

                //         // do something with the image
                //         $('#wPaint-img').attr('src', image);
                //     },
                // });
            }

            function loadImgBg() {
                // internal function for displaying background images modal
                // where images is an array of images (base64 or url path)
                // NOTE: that if you can't see the bg image changing it's probably
                // becasue the foregroud image is not transparent.
                this._showFileModal('bg', images);
            }

            function loadImgFg() {
                // internal function for displaying foreground images modal
                // where images is an array of images (base64 or url path)
                this._showFileModal('fg', images);
            }

            // init wPaint
            $('#wPaint').wPaint({
                menuOffsetLeft: 0,
                menuOffsetTop: -83,
                saveImg: saveImg,
                loadImgBg: loadImgBg,
                loadImgFg: loadImgFg,
                path: '/packages/wPaint/', // set wpaint path for images and cursors to get the relative path
                menuOrientation: 'horizontal', // menu alignment (horizontal,vertical)
            });
        </script>
    </div>
</div>
