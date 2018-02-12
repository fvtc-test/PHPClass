<div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                   <!-- $dashboard=true (& other links) because it was set on page load from the Admin.php controller. This sets the active class
                    to the correct menu link-->
                    <li
                        <?php
                        if(isset($dashboard)){
                          echo " class='active'";
                        }
                        ?>
                    >
                        <a href="/mysite/admin/"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li
                        <?php
                        if(isset($manage_marathons)){
                            echo " class='active'";
                        }
                        ?>
                    >
                        <a href="/mysite/admin/manage_marathons/"><i class="fa fa-fw fa-cogs"></i> Manage Marathons</a>
                    </li>
                    <li
                        <?php
                        if(isset($add_marathons)){
                            echo " class='active'";
                        }
                        ?>
                    >
                        <a href="/mysite/admin/add_marathons/"><i class="fa fa-fw fa-plus-square"></i> Add Marathons</a>
                    </li>
                    <li
                        <?php
                        if(isset($manage_runners)){
                            echo " class='active'";
                        }
                        ?>
                    >
                        <a href="/mysite/admin/manage_runners/"><i class="fa fa-fw fa-users"></i> Manage Runners</a>
                    </li>
                    <!--
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>-->
                    <li
                        <?php
                        if(isset($registration)){
                            echo " class='active'";
                        }
                        ?>
                    >
                        <a href="/mysite/admin/registration/"><i class="fa fa-fw fa-list-alt"></i> Registration</a>
                    </li>
                </ul>
            </div>
