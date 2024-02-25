<?= $this->include('template/header') ?>
<?= $this->include('template/navbar') ?>


<div id="postForm" class="container mt-5" >
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form id="postForm" action="submitPost" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                    <input type="file" class="form-control-file" id="postMedia" name="media">
                    <label class="postlabel" for="postMedia">Upload Image/Video:</label>
                </div>
                <div class="form-group">
                    <label for="postContent">caption</label>
                    <textarea class="form-control" id="postContent" name="caption" rows="1" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Post</button>
            </form>
        </div>
    </div>
</div>