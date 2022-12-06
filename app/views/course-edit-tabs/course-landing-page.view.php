<form>
    <div class="col-md-8 mx-auto">
        <br>
        <div class="h5"><b>Course Landing Page</b> <?=$row->id;?></div>
        <br>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Course Title</span>
            <input value="<?=esc($row->title);?>" type="text" name="title" class="form-control" >
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Course Subtitle</span>
            <input value="<?=esc($row->sub_title);?>" type="text" name="sub_title" class="form-control" >
        </div>

        <div class="row mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label"><b>Description</b></label>
            <div class="col-sm-10">
                <textarea class="form-control" name="descriptions" style="height:100px">
                <?=esc($row->descriptions);?>
                </textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 my-3">
                <select name="language_id" class="form-select">
                    <option value="">---Select Language ---</option>
                </select>
            </div>

            <div class="col-md-6 my-3">
                <select name="level_id" class="form-select">
                    <option value="">---Select Level ---</option>
                </select>
            </div>

            <div class="col-md-6 my-3">
                <select name="category_id" class="form-select">
                    <option value="">---Select Category ---</option>
                    <?php if(!empty($categories)):?>
                      <?php foreach($categories as $cat):?>
                        <option <?=set_select('category_id',$cat->id,$row->category_id)?> value="<?=$cat->id?>"><?=esc($cat->category)?></option>
                        <?php endforeach;?>
                    <?php endif;?>
                </select>
            </div>

            <div class="col-md-6 my-3">
                <select name="sub_category_id" class="form-select">
                    <option value="">---Select Subcategory ---</option>
                </select>
            </div>

            <label><b>Pricing</b> &nbsp;</label> 
            <div class="col-md-4 mb-4">
                <select name="currency_id" class="form-select">
                    <option value="">---Select Currency ---</option>
                </select>
            </div>
            
            <div class="col-md-8 mb-4">
                <select name="price_id" class="form-select">
                    <option value="">---Select Price ---</option>
                </select>
            </div>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Primary Subject</span>
            <input value="<?=esc($row->primary_subject);?>" type="text" name="primary_subject" class="form-control" >
        </div>

        <div class="my-4 row">
            <div class="col-sm-4">
                <img src="<?=ROOT?>/assets/images/no_image.jpg" style="width:100%">
            </div>

            <div class="col-sm-8">
                <div class="h5"><b>Course Image :</b></div>
                Upload your course image here . it must meet our course image quality standards to be accepted. Important guidelines: 
                750x422 pixels, jpg, jpeg,gif or png no text on the image.
                <br><br>
                <input type="file" name="">
                <div class="progress my-4">
                    <div class="progress-bar" role="progressbar" style="width:50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Saving.. 50%</div>
                </div>
            </div>
        </div>

        <div class="my-4 row">
            <div class="col-sm-4">
                <img src="<?=ROOT?>/assets/images/no_image.jpg" style="width:100%">
            </div>
            <div class="col-sm-8">
                <div class="h5"><b>Course Video :</b></div>
               Students who watch a well-made promo video are <b>5X more like to enroll</b> in your course. We've seen that statistic go up to 10X
               for exceptionally awesome videos. <a href="">Learn how to make yours awesome!</a>
                <br><br>
                <input type="file" name="">
                <div class="progress my-4">
                    <div class="progress-bar" role="progressbar" style="width:50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Saving.. 50%</div>
                </div>
            </div>
        </div>

    </div>
</form>