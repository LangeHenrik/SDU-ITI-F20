<?php 
include "../app/views/partials/head.php"; 
include "../app/views/partials/menu.php";
?>
<div class="container">
    <div class ="row">
        <div class = "col-12">
        <br>
            <?php if($viewbag["imageUploadMSG"][0] == "true"):?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?=$viewbag["imageUploadMSG"][1]?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; if($viewbag["imageUploadMSG"][0] == "false"):?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?=$viewbag["imageUploadMSG"][1]?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif;?>
       </div>
    </div>
    <div class ="row">
        <div class ="col-2">
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseUpload" aria-expanded="false" aria-controls="collapseUpload">
        Upload Image
        </button>
        </div>
        <div class ="col-10">
            <div class="collapse" id="collapseUpload">
            <div class="card card-body">
            <form action="/njens16/mvc/public/image/upload" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="imageHeader">Image header</label>
                    <input type="text" class="form-control" id="imageHeader" name="imageHeader" placeholder="Image header">
                </div>
                <div class="form-group">
                    <label for="imageDescription">Image description</label>
                     <textarea class="form-control" id="imageDescription" name="imageDescription" rows="3" placeholder="Image description"></textarea>
                </div>
                <div class="form-group">
                    <label for="imageFile">Select image to upload</label>
                    <input type="file" class="form-control-file" id="imageFile" name="imageFile">
                </div>
            <button type="submit" class="btn btn-primary">Save Image</button>
            </form>
            </div>
            </div>
        </div>
<?php
for ($i = 0; $i < sizeof($viewbag["images"]); $i ++)
{
    if ( $i / 4 === 0 )
    {
        echo "</div><div class ='row'>";
    }
?>
    <div class = 'col-3'>
    <br>
    <figure class="figure">
    <p><b>User:</b> <?=$viewbag["images"][$i]["username"]?><br>
    <b>Header:</b> <?=$viewbag["images"][$i]["imageHeader"]?></p>
    <img src="<?=$viewbag["images"][$i]["imageData"]?>" class="figure-img img-fluid rounded" alt="<?=$viewbag["images"][$i]["imageHeader"]?>">
    <figcaption class="figure-caption"><b>Description: </b><?=$viewbag["images"][$i]["imageDescription"]?></figcaption>
    </figure>
    </div>
<?php
}

?>
</div>


<?php include '../app/views/partials/foot.php'; ?>
