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
                  <input value="<?= set_value('primary_subject');?>" type="text" class="form-control <?=(!empty($errors['primary_subject']) ? 'border-danger':'');?>" name="primary_subject" placeholder="Primary Subject">
                  <?php if(!empty($errors['primary_subject'])):?>
                    <small class="text-danger"><?=$errors['primary_subject']?></small>
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
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Edit Course</h5>

      <?php if(!empty($row)):?>

        <div class="float-end">
          <button class="btn btn-success">Save</button>
          <a href="<?=ROOT;?>/admin/courses">
           <button class="btn btn-primary">Back</button>
          </a>
        </div>

        <h5 class=""><?=esc($row->title);?></h5>

        <!-- Bordered Tabs -->
        <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link active" id="intended-learners-tab" data-bs-toggle="tab" data-bs-target="#intended-learners" type="button" role="tab" aria-controls="home" aria-selected="true">Intended Learners</button>
          </li>
          <li class="nav-item" role="presentation">
            <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link" id="curriculum-tab" data-bs-toggle="tab" data-bs-target="#curriculum" type="button" role="tab" aria-controls="profile" aria-selected="false">Curriculum</button>
          </li>
          <li class="nav-item" role="presentation">
            <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link" id="landing-page-tab" data-bs-toggle="tab" data-bs-target="#course-landing-page" type="button" role="tab" aria-controls="contact" aria-selected="false">Course Landing Page</button>
          </li>
          <li class="nav-item" role="presentation">
            <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link" id="promotions-tab" data-bs-toggle="tab" data-bs-target="#promotions" type="button" role="tab" aria-controls="contact" aria-selected="false">Promotions</button>
          </li>
          <li class="nav-item" role="presentation">
            <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link" id="course-messages-tab" data-bs-toggle="tab" data-bs-target="#course-messages" type="button" role="tab" aria-controls="contact" aria-selected="false">Course Messages</button>
          </li>
        </ul>
        <div class="tab-content pt-2" id="borderedTabContent">
          <div class="tab-pane fade show active" id="intended-learners" role="tabpanel" aria-labelledby="intended-learners">
            1Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.
          </div>
          <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum">
            2Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
          </div>
          <div class="tab-pane fade" id="course-landing-page" role="tabpanel" aria-labelledby="course-landing-page">
            3Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
          </div>
          <div class="tab-pane fade" id="promotions" role="tabpanel" aria-labelledby="promotions">
            4Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
          </div>
          <div class="tab-pane fade" id="course-messages" role="tabpanel" aria-labelledby="course-messages">
            5Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
          </div>
        </div><!-- End Bordered Tabs -->
        <?php else:?>
          <div>That Course Was Not Found !!</div>
      <?php endif;?>
    </div>
  </div>
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
            <td><?=esc($row->price_id_row->tier ?? 'Unknown');?></td>
            <td><?=esc($row->primary_subject);?></td>
            <td><?=esc($row->create_at);?></td>
            <td>
              <a href="<?=ROOT;?>/admin/courses/edit/<?=$row->id;?>">
                <i class="bi bi-pencil-square"></i> 
              </a>
              <a href="<?=ROOT;?>/admin/courses/delete/<?=$row->id;?>">
                <i class="bi bi-trash-fill text-danger"></i>
              </a>
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
<script>

  // Get Session from local storage    
  var tab = sessionStorage.getItem("tab") ? sessionStorage.getItem("tab") : "#intended-learners";

  //Call Specific Tab
  function show_tab(tab_name){

    const someTabTriggerEl = document.querySelector(tab_name + "-tab");
    const tab = new bootstrap.Tab(someTabTriggerEl);
    tab.show();
}

  function set_tab(tab_name){
    tab = tab_name;
    sessionStorage.setItem("tab",tab_name);
    alert(tab_name);
}
</script>
<?php $this->view('admin/admin-footer',$data);?>