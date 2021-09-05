<title>Notice Board</title>
<?php
include_once ("../db/db.php");
session_start();  
include_once("includes/head.php");

?>


<!-- Navbar starts-->
<?php include_once("includes/navbar.php"); ?>
<!-- Navbar Ends-->


<!-- Sidebar menu starts-->
<?php include_once("includes/sidebar.php"); ?>
<!-- Sidebar menu ends-->
<style>
    #loading {
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0.7;
        background-color: #fff;
        z-index: 99;
    }

    #loading-image {
        z-index: 100;
    }
</style>
<div id="loading">
    <img id="loading-image" width="150px" src="https://c.tenor.com/I6kN-6X7nhAAAAAi/loading-buffering.gif" alt="Loading..." />
</div>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-bell"></i> Notice Board
            </h1>
            <!--           <p>Start a beautiful journey here</p> -->
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="dashboard.php">Dashbord</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">


                    <div class="row">


                        <div class="clearix"></div>
                        <div class="col-md-12">

                            <!-- <h3 class="tile-title">Subscribe</h3> -->
                            <div class="tile-body">
                                <form id="form" class="row" method="post" data-bvalidator-validate action="insert/couponController.php">
                                    <div class="form-group col-md-4">
                                        <label class="control-label">Select Coupon<span style="color: red">*</span></label>
                                        <select class="form-control" id="couponName" name="couponName" data-bvalidator="required">
                                            <option value="">Please Select</option>
                                        </select>

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label">Result Announce Date <span style="color: red">*</span></label>
                                        <input class="form-control" type="date" id="announceDate" name="announceDate" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31" data-bvalidator="required">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label">Result Announce Time <span style="color: red">*</span></label>
                                        <input class="form-control" type="time" id="announceTime" name="announceTime" data-bvalidator="required">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="control-label">Comment </label>
                                        <textarea class="form-control" cols="50" rows="5" id="comment" name="comment"></textarea>
                                    </div>

                                    <div class="form-group col-md-12 align-self-end">
                                        <button id="save" class="btn btn-primary" type="submit">
                                            <i class="fa fa-floppy-o"></i>Save
                                        </button>
                                    </div>

                                    <div class="col-md-12">
                                        <center id="warning"></center>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!-- table starts -->
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div class="tile-body">
					<div class="table-responsive">
						<table class="table table-hover table-bordered" id="sampleTable">
							<thead>
								<tr>
									<th>Coupon Name</th>
									<th>Result Announce date</th>
                                    <th>Result Announce Time </th>
									<th>Comment</th>
									<th>Action</th>

								</tr>
							</thead>
							<tbody>
								<?php

                                $sel = "SELECT * FROM `notice_board`";
								$exe = mysqli_query($conn, $sel);
								if ($data = mysqli_num_rows($exe) > 0) {


									while ($data = mysqli_fetch_assoc($exe)) {
								?>
										<tr>
											<td><?php echo $data['couponName']; ?></td>
											<td><?php echo $data['announceDate']; ?></td>
											<td><?php echo $data['announceTime'];?></td>
                                            <td><?php echo $data['comment'];?></td>
                                            <td> 
                                                <button data-id="<?php echo $data['id'];?>" class="btn btn-danger btn-sm delete" >Delete</button>
                                        </td>
										</tr>
									<?php
									}
									?>
								<?php
								} else {
									echo "No records found";
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- table ends -->

</main>


<!-- Footer Starts-->
<?php include_once("includes/footer.php"); ?>
<!-- Footer Ends-->



<script type="text/javascript">
    $(document).ready(function() {
        $(".delete").click(function(){
            $('#loading').show();
            var id =$(this).attr("data-id");

                 /* Saving notice board starts */

            $.ajax({
                type: "DELETE",
                url: serviceProvider + "/admin/notice-board/"+id,
                dataType: 'json',
                data: `{"couponName":"${$("#couponName").val()}","announceDate":"${$("#announceDate").val()}","announceTime":"${$("#announceTime").val()}","comment":"${$("#comment").val()}"}`,
                contentType: 'application/json',
                cache: false,
                success: function(data) {
                    console.log(data);
                    if (data.code == 200) {
                        $('#loading').hide();
                        var html = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success!</strong> ${data.message}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    </div>`;


                        $("#warning").html(html);
                    } else {
                        $('#loading').hide();
                        var html = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error </strong>  ${data.message}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    </div>`;

                        $("#warning").html(html);
                    }

                }
            });
          

            /* Saving notice board starts */
           
        });
        $('#loading').hide();
        var serviceProvider = 'https://samruddhi-lucky-draw.herokuapp.com';
        $("#save").click(function(e) {
            $('#loading').show();
            e.preventDefault();

            /* Saving notice board starts */

            $.ajax({
                type: "POST",
                url: serviceProvider + "/admin/notice-board",
                dataType: 'json',
                data: `{"couponName":"${$("#couponName").val()}","announceDate":"${$("#announceDate").val()}","announceTime":"${$("#announceTime").val()}","comment":"${$("#comment").val()}"}`,
                contentType: 'application/json',
                cache: false,
                success: function(data) {
                    if (data.code == 200) {
                        $('#loading').hide();
                        var html = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success!</strong> ${data.message}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    </div>`;


                        $("#warning").html(html);
                    } else {
                        $('#loading').hide();
                        var html = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>Error </strong>  ${data.message}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    </div>`;

                        $("#warning").html(html);
                    }

                }
            });
          

            /* Saving notice board starts */

        });
        /* Getting coupon Name starts */
        $.ajax({
            type: "GET",
            url: serviceProvider + "/coupons",
            cache: false,
            success: function(data) {
                var options = '';
                for (var i = 0; i < data.length; i++) {
                    options += `<option value="${data[i].couponName}">${data[i].couponName}</option>`;
                }
                $("#couponName").html(options);

            }
        });
        /* Getting coupon Name ends */


    });
</script>

</body>

</html>