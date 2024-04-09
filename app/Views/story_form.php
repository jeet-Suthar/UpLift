<div class="dialog-box-bg">

    <div class="dialog-box">
        <div class="dialog-box-header">
            <p>Add Story</p>
            <i class="dialog-box-close-btn fa-solid fa-xmark"></i>
        </div>

        <div class="dialog-box-content">

            <div class="upload-container">
                <div class="media-preview" id="media-preview"></div>

                <form id="post-form" action="add_stories" method="post" enctype="multipart/form-data">

                    <div id="upload-group">
                        <input type="file" id="media-upload" name="media" accept="image/*, video/*">
                        <label class="postlabel upload-icon" for="media-upload"><i class="fas fa-upload"></i></label>
                        <p style="color: #808080;">Upload Image/video</p>

                    </div>
                    <textarea id="caption-input" name="caption" class="caption-input" placeholder="Write a caption..."></textarea>
                </form>
                <!-- <button type="submit" class="submit-btn"><i class="fas fa-upload"></i> Submit</button> -->
            </div>

            <script>
                document.getElementById('media-upload').addEventListener('change', function(event) {
                    var preview = document.getElementById('media-preview');
                    preview.innerHTML = '';
                    const gp = document.getElementById('upload-group');
                    gp.classList.add("myclass");

                    console.log(gp)
                    var file = event.target.files[0];
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        if (file.type.startsWith('image')) {
                            var image = new Image();
                            image.src = event.target.result;
                            preview.appendChild(image);
                        } else if (file.type.startsWith('video')) {
                            var video = document.createElement('video');
                            video.src = event.target.result;
                            video.controls = true;
                            preview.appendChild(video);
                        }

                        // Add cross icon to remove the media
                        var removeIcon = document.createElement('i');
                        removeIcon.classList.add('fas', 'fa-times', 'remove-icon');
                        removeIcon.addEventListener('click', function() {
                            preview.innerHTML = '';
                            document.getElementById('media-upload').value = ''; // Reset file input
                            gp.classList.remove("myclass");

                        });
                        preview.appendChild(removeIcon);

                    }

                    reader.readAsDataURL(file);


                });
            </script>

        </div>

        <div class="dialog-box-footer" id="dialog-box-button">
            <div class="dialog-box-button submit-story-btn">
                Add <i class="fas fa-upload"></i>
            </div>
        </div>


    </div>/

</div>