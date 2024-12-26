<html>
    <head>
        <style>
            body{overflow-x:hidden;}
            label{
    font-size:16px;
    font-weight:bold;
    color:#000;
}
.mybtn{width:auto;padding:15px; border-radius:5px; margin-left:3px;color:#fff; background-color:#4e73df;border:none;}
.mybtn:hover{background-color:#0067ffcc;}
            .logo{height:75px;width:75px;}
            td{text-align:center;}
            .h2{color:red;font-weight:bold; font-size:x-large;}
            #rep{margin:0; position:absolute;z-index:1000; background-color:#fff;}
        /*scrollbar */
        ::-webkit-scrollbar {width: 0px;} /* width */
        ::-webkit-scrollbar-track { box-shadow: inset 0 0 5px inherit; border-radius: 10px; }/* Track */
        ::-webkit-scrollbar-thumb { background: inherit; border-radius: 10px; }/* Handle */
        ::-webkit-scrollbar-thumb:hover { background: inherit; }/* Handle on hover */
        </style>
    </head>
<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                </div>
                <img src="img/ems.png" style="height:50px;width:50px;border-radius:50%;" /> 
                <!-- <div class="sidebar-brand-text mx-3"> E M S</div> -->
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
<?php if($_SESSION['userid']):?>


     <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

    <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-plus"></i>
                    <span>Add</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="addroom.php">Add Room</a>
                        <a class="collapse-item" href="addbranch.php">Add Branch</a>
                        <a class="collapse-item" href="addstu.php">Add Student</a>
                        <a class="collapse-item" href="addsub.php">Add Subject</a>
                        <a class="collapse-item" href="addstaff.php">Add Staff</a>
                        <a class="collapse-item" href="addslot.php">Add Slot</a>
                    </div>
                </div>
            </li>


     <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Allottment</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="roomall.php">Room Allottment</a>
                        <a class="collapse-item" href="staffall.php">Staff Allottment</a>
                    </div>
                </div>
            </li>
   <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Reports</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                         <a class="collapse-item" href="bform.php">B-form</a>
                         <a class="collapse-item" href="roomrep.php">Room Report</a>
                         <a class="collapse-item" href="facrep.php">Faculty Report</a>
                         <a class="collapse-item" href="consrep.php">Consolidated Report</a>
                        </div>
                </div>
            </li>
   <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="fas fa-ban" style='color:red'></i>
                    <span style='color:red'>Reset All</span>
                </a>
            </li>

<?php else:    ?>          
         
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="live-test-updates.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                EMS
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="new-user-testing.php">New User</a>
                        <a class="collapse-item" href="registered-user-testing.php">Already Registered User</a>
                    </div>
                </div>
            </li>

<?php endif;    ?>          

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->