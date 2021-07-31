<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
               
            </div>
            <div class="modal-body">
                <div class="productFields col-md-12">
                 
              

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(function(){
       
       
              $(document).on('click','.buyNowBtn',function(){
            productId = $(this).attr('data-productid');
            coupounIdForModal = "<?php echo $coupounIdForModal; ?>"
          $.post("getProductById.php",{
                      productId:productId,
                      coupounIdForModal:coupounIdForModal
                      },
                    function(data)
                    {
                       $(".productFields").html(data);
                      
                      
                     
                      
                    });
          
      });
    });
</script>