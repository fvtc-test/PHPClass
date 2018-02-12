
<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <?=validation_errors('<p class="error">')?>
                                <?php
                                  if(isset($error_message)){
                                   echo "<p class='error'>$error_message</p>";
                                      $error_message=null;
                                  }
                                ?>
                            </div>

                    <div class="row">
                        <div class="col-md-5 col-md-offset-1 col-xs-12">
                            <h2 class="form">Login</h2>
                            <?php

                                echo form_open('home/login');
                            echo "<label>Email</label>";
                                echo form_input('email','');
                            echo "<label>Password</label>";
                            echo form_input ('password','', ''). "<br>";
                            echo form_submit('submit','Login');
                            echo form_close();
                            ?>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <h2 class="form">Create an Account</h2>
                            <?php

                            echo form_open('home/create');
                            echo "<label>Full Name</label>";
                            echo form_input('user_name','');
                            echo "<label>Email</label>";
                            echo form_input('email','');
                            echo "<label>Password</label>";
                            echo form_input ('password','');
                            echo "<label>Confirm Password</label>";
                            echo form_input ('password2',''). "<br>";
                            echo form_submit('submit','Create Account');
                            echo form_close();
                            ?>
                        </div>
                    </div>

            </div>
           <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <!--  <button type="button" class="btn btn-primary">Save changes</button>-->
            </div>

        </div>
    </div>
</div>