<?php $this->view('admin/admin-header',$data);?>
<?php if(!empty($row)):?>
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=ROOT?>/">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
          <li class="breadcrumb-item active"><?=esc($data['row']->first_name)?>  <?=esc($data['row']->last_name) ;?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?=ROOT;?>/<?=esc($data['row']->image)?>" alt="Profile" class="rounded-circle" style="width:150px;max-width:150px;height:150px;object-fit:cover;">
              <h2><?=esc($data['row']->first_name)?>  <?=esc($data['row']->last_name) ;?></h2>
              <h3><?=esc($data['row']->role);?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview" id="profile-overview-tab">Overview</button>
                </li>

                <li class="nav-item">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" id="profile-edit-tab">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings" id="profile-settings-tab">Settings</button>
                </li>

                <li class="nav-item">
                  <button onclick="set_tab(this.getAttribute('data-bs-target'))" class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password" id="profile-change-password-tab">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">
                  <?=esc($data['row']->about)?>
                  </p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?=esc($data['row']->first_name)?>  <?=esc($data['row']->last_name) ;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Company</div>
                    <div class="col-lg-9 col-md-8"><?=esc($data['row']->company)?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Job</div>
                    <div class="col-lg-9 col-md-8"><?=esc($data['row']->role)?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8"><?=esc($data['row']->country)?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?=esc($data['row']->address)?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?=esc($data['row']->phone)?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?=esc($data['row']->user_email)?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                      <div class="d-flex">
                        <img class="js-image-preview"  src="<?=ROOT;?>/<?=esc($data['row']->image)?>" alt="Profile" style="width:150px;max-width:150px;height:150px;object-fit:cover;" alt="Profile" style="width:200px;max-width:200px;height:200px;object-fit:cover">
                        <div class="js-filename m-2">Selected File : None</div>
                      </div>

                        <div class="pt-2">
                          <label href="#" class="btn btn-primary btn-sm" title="Upload new profile image">
                            <i class="text-white bi bi-upload"></i>
                            <input class="js-profile-image-input" onchange="load_image(this.files[0])" type="file" name="image" style="display:none;">
                        </label>
                      <?php if(!empty($errors['image'])):?>
                        <small class="js-error-image text-danger"><?=$errors['image']?></small>
                      <?php endif;?>
                      <small class="js-error-image text-danger"></small>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="first_name" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="first_name" type="text" class="form-control" id="first_name" value="<?=set_value('first_name',$data['row']->first_name);?>" required>
                      </div>
                      <?php if(!empty($errors['first_name'])):?>
                        <small class="text-danger"><?=$errors['first_name']?></small>
                      <?php endif;?>
                      <small class="js-error-first_name text-danger"></small>
                    </div>

                    <div class="row mb-3">
                      <label for="last_name" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="last_name" type="text" class="form-control" id="last_name" value="<?=set_value('last_name',$data['row']->last_name);?>" required>
                      </div>
                      <?php if(!empty($errors['last_name'])):?>
                        <small class="text-danger"><?=$errors['last_name']?></small>
                      <?php endif;?>
                      <small class="js-error-last_name text-danger"></small>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px">
                        <?=set_value('about',$data['row']->about);?>
                        </textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="<?=set_value('company',$data['row']->company);?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="Job" value="<?=set_value('job',$data['row']->job);?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="country" type="text" class="form-control" id="Country" value="<?=set_value('country',$data['row']->country);?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value="<?=set_value('address',$data['row']->address);?>">
                      </div>
                     
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="<?=set_value('phone',$data['row']->phone);?>">
                      </div>
                      <?php if(!empty($errors['phone'])):?>
                        <small class="text-danger"><?=$errors['phone']?></small>
                      <?php endif;?>
                      <small class="js-error-phone text-danger"></small>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="user_email" type="email" class="form-control" id="Email" value="<?=set_value('user_email',$data['row']->user_email);?>">
                      </div>
                      <?php if(!empty($errors['user_email'])):?>
                        <small class="text-danger"><?=$errors['user_email']?></small>
                      <?php endif;?>
                      <small class="js-error-user_email text-danger"></small>
                    </div>

                    <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="twitter_link" type="text" class="form-control" id="Twitter" value="<?=set_value('twitter_link',$data['row']->twitter_link);?>">
                      </div>
                      <?php if(!empty($errors['twitter_link'])):?>
                        <small class="text-danger"><?=$errors['twitter_link']?></small>
                      <?php endif;?>
                      <small class="js-error-twitter_link text-danger"></small>
                    </div>

                    <div class="row mb-3">
                      <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="facebook_link" type="text" class="form-control" id="Facebook" value="<?=set_value('facebook_link',$data['row']->facebook_link);?>">
                      </div>
                      <?php if(!empty($errors['facebook_link'])):?>
                        <small class="text-danger"><?=$errors['facebook_link']?></small>
                      <?php endif;?>
                      <small class="js-error-facebook_link text-danger"></small>
                    </div>

                    <div class="row mb-3">
                      <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="instagram_link" type="text" class="form-control" id="Instagram" value="<?=set_value('instagram_link',$data['row']->instagram_link);?>">
                      </div>
                      <?php if(!empty($errors['instagram_link'])):?>
                        <small class="text-danger"><?=$errors['instagram_link']?></small>
                      <?php endif;?>
                      <small class="js-error-instagram_link text-danger"></small>
                    </div>

                    <div class="row mb-3">
                      <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="linkedin_link" type="text" class="form-control" id="Linkedin" value="<?=set_value('linkedin_link',$data['row']->linkedin_link);?>">
                      </div>
                      <?php if(!empty($errors['linkedin_link'])):?>
                        <small class="text-danger"><?=$errors['linkedin_link']?></small>
                      <?php endif;?>
                      <small class="js-error-linkedin_link text-danger"></small>
                    </div>

                    <div class="js-progress progress my-4 hide">
                      <div class="progress-bar" role="progressbar" style="width:50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Saving.. 50%</div>
                    </div>

                    <div class="text-center">
                      <a href="<?=ROOT;?>/admin">
                      <button type="button" class="btn btn-primary float-start">Back</button>
                      </a>
                      <button type="button" onclick="save_profile(event)" type="submit" class="btn btn-danger float-end">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->
                  
                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
    <?php else: ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <center>That Profile was not found !</center>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif;?>
    <script>

      // Get Session from local storage
      
      var tab = sessionStorage.getItem("tab") ? sessionStorage.getItem("tab") : "#profile-overview";

      //Call Specific Tab
      function show_tab(tab_name){
        const someTabTriggerEl = document.querySelector(tab_name + "-tab");
        const tab = new bootstrap.Tab(someTabTriggerEl);
        tab.show();
      }

      function set_tab(tab_name){
        tab = tab_name;
        sessionStorage.setItem("tab",tab_name);
       
      }

      //Load and seen directly the upload image
      function load_image(file)
      {
         document.querySelector(".js-filename").innerHTML="Selected File: " + file.name;

         //create local resources for images
         var mylink = window.URL.createObjectURL(file);
         document.querySelector(".js-image-preview").src = mylink;
      }

      //Supply a show_tab when window is loaded
      window.onload = function(){
        show_tab(tab);
      }

      //upload function
      function save_profile(e){

        var form   = e.currentTarget.form;
        var inputs = form.querySelectorAll("input,textarea");
        var obj = {};
        var image_added = false;

        for(var i = 0; i< inputs.length; i++){
          var key  = inputs[i].name;
          if(key == 'image'){
            if(typeof inputs[i].files[0] == 'object'){
              obj[key]    = inputs[i].files[0];
              image_added = true;
            }
            
          }else{
            obj[key] = inputs[i].value;
          }
        }

        //validate image
        if(image_added){

          var allowed = ['jpg','jpeg','png'];
          if(typeof obj.image == 'object'){
            var ext =  obj.image.name.split(".").pop();
          }

          if(!allowed.includes(ext.toLowerCase())){
            alert("Only These File Types are allowed in Profile Image : " + allowed.toString(","));
            return;
          }
      }
        send_data(obj);

      }

      function send_data(obj, progbar = 'js-progress'){
        
        var prog = document.querySelector("." + progbar);
        prog.children[0].style.width     = "0%";
        prog.classList.remove("hide");

        //create virtual form to create and send data
        var myform= new FormData();

        for(key in obj){
          myform.append(key,obj[key]);
        }

        //create HTTP request Object
        var ajax  = new XMLHttpRequest();
        ajax.addEventListener('readystatechange',function(){

          if(ajax.readState == 4){

            if(ajax.status == 200){
              //everything went well
              console.log(ajax.responseText);
              //handle_result(ajax.responseText);
            }else{
              //server error
              alert("an error occured");
            }
          }
        });

        ajax.upload.addEventListener('progress',function(e){

          var percentage   = Math.round((e.loaded / e.total) * 100);
          prog.children[0].style.width     = percentage + "%";
          prog.children[0].innerHTML = "Saving ..." + percentage + "%";

        });
        ajax.open('post','',true);
        ajax.send(myform);


      }

      function handle_result(result){

        var obj = JSON.parse(result);

        if(typeof obj =='object'){
          //object was created

          if(typeof obj.errors == 'object'){
            //we have errors
            display_errors(obj.errors);
            alert("Please correct the errors on the page");
          }else{
            //save complete
            alert("Profile Saved Successfully");
            window.location.reload();
          }
        }
      }

      function display_errors(errors){

        for(key in errors){

          console.log(".js-error-"+key);
          document.querySelector(".js-error-firstname").innerHTML = errors[key];
          //document.querySelector(".js-error-"+key).innerHTML = errors[key];
        }
      }
      

     
    </script>
  <?php $this->view('admin/admin-footer',$data);?>
