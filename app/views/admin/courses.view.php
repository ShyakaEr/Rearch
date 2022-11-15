<?php $this->view('admin/admin-header',$data);?>
<?php if($action=='add'):?>
    <div class="card col-md-5 mx-auto">
            <div class="card-body">
              <h5 class="card-title">New Course</h5>

              <!-- No Labels Form -->
              <form class="row g-3" method="POST">
                <div class="col-md-12">
                  <input value="<?= set_value('title');?>" type="text" class="form-control <?=(!empty($errors['title']) ? 'border-danger':'');?>" name="title" placeholder="Course Title">
                  <?php if(!empty($errors['title'])):?>
                    <small class="text-danger"><?=$errors['title']?></small>
                  <?php endif;?>
                </div>

                <div class="col-md-12">
                  <select id="inputState" class="form-select <?=(!empty($errors['category_id']) ? 'border-danger':'');?>" name="category_id">
                    <option value="" selected>Course Category</option>
                    <?php if(!empty($categories)):?>
                        <?php foreach($categories as $cat):?>
                          <option value="<?=$cat->id;?>"><?=esc($cat->category)?></option>
                        <?php endforeach;?>
                    <?php endif;?>
                  </select>
                  <?php if(!empty($errors['category_id'])):?>
                    <small class="text-danger"><?=$errors['category_id']?></small>
                  <?php endif;?>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Save</button>

                  <a href="<?=ROOT;?>/admin/courses">
                   <button type="button" class="btn btn-secondary">Cancel</button>
                  </a>
                </div>
              </form><!-- End No Labels Form -->

            </div>
          </div>
<?php elseif($action=='edit') :?>
<?php else:?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">My Courses 
          <a href="<?=ROOT;?>/admin/courses/add">
            <button class="btn btn-primary float-end"><i class="bi bi-camera-video-fill"></i>  New Courses</button>
          </a>
        </h5>

        <!-- Table with stripped rows -->
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Instructor</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Primary Subject</th>
            <th scope="col">Create At</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <?php if(!empty($rows)):?>
        <tbody>
          <?php foreach($rows as $row):?>
            <tr>
            <th scope="row"><?=$row->id;?></th>
            <td><?=esc($row->title);?></td>
            <td><?=esc($row->user_id_row->names ?? 'Unknown');?></td>
            <td><?=esc($row->category_id_row->category ?? 'Unknown');?></td>
            <td><?=esc($row->price_id);?></td>
            <td><?=esc($row->primary_subject);?></td>
            <td><?=esc($row->create_at);?></td>
            <td>
                <i class="bi bi-pencil-square"></i> 
                <i class="bi bi-trash-fill"></i>
            </td>
            </tr>
            <tr>
              <?php endforeach;?>
        </tbody>
        <?php else:?>
          <tr class="text-center"   ><td col="10"> No records found !!</td></tr>
          <?php endif;?>
    </table>
    <!-- End Table with stripped rows -->

</div>
</div>
<?php endif;?>
<?php $this->view('admin/admin-footer',$data);?>