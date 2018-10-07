﻿<?php $this->load->view("layouts/header"); ?>
      <!-- Small Breadcrumb -->
      <div class="small-breadcrumb">
         <div class="container">
            <div class=" breadcrumb-link">
               <ul>
                  <li><a href="<?php echo base_url(); ?>">Home</a></li>
                  <li><a class="active" href="#">Post a deal</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- Small Breadcrumb -->
      <!-- =-=-=-=-=-=-= Transparent Breadcrumb End =-=-=-=-=-=-= -->
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding  gray ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <div class="col-md-12">
                     <!-- end post-padding -->
                     <div class="post-ad-form extra-padding postdetails">
                        <div class="heading-panel">
                           <h3 class="main-title text-left">
                              Post a Deal
                           </h3>
                        </div>
                  <?php
                     echo $this->session->flashdata('message'); 
                     echo validation_errors(); 
                  ?>
                        <form class="submit-form" action="<?php echo base_url('dealer/postdeal/savedeals'); ?>" method="post">
                           <!-- Title  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label">Title <small>Enter a short title for your deal</small></label>
                                 <input name="code" type="hidden" value="<?php echo $code; ?>">
                                 <input name="title" class="form-control" placeholder="HENRY GOLDEN BOY DELUXED 22MAG 3RD EDITION ENGRV" type="text" value="<?php echo set_value('title'); ?>">
                              </div>
                           </div>
                           <div class="row">
                                <!-- Code  -->
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Code</label>
                                 <input name="itemcode" class="form-control" type="text" placeholder="22BCGBAR1" value="<?php echo set_value('itemcode'); ?>">
                              </div>
                              <!-- Category  -->
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Brand <small>Select Brand</small></label>
                                 <select name="brand" class="brand form-control">
                                    <option label="Select Option"></option>
                                 <?php  foreach ($brands as $brand): ?>
                                    <option value="<?php echo $brand->id; ?>"><?php echo $brand->name; ?></option>
                                 <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                           <div class="row">
                              <!-- Category  -->
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Category <small>Select suitable category for your deal</small></label>
                                 <select name="category" class="category form-control" id="category">
                                    <option label="Select Category"></option>
                                 <?php  foreach ($category as $cat): ?>
                                    <option value="<?php echo $cat->category_code; ?>"><?php echo $cat->name; ?></option>
                                  <?php  endforeach; ?> 
                                 </select>
                              </div>
                              <!-- Subcategory  -->
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Subcategory <small>Select sub category for your deal</small></label>
                                 <select name="subcategory" class="category form-control" id="subcategory">
                                    <option label="Select Option"></option>
                                 </select>
                              </div>
                           </div>
                           <!-- end row -->
                           <!-- end row -->
                           <div class="row">
                              <!-- Category  -->
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">UPC</label>
                                 <input name="upc" class="form-control" placeholder="eg 619835016379" type="text" value="<?php echo set_value('upc'); ?>">
                              </div>
                              <!-- SKU  -->
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">SKU</label>
                                 <input name="sku" class="form-control" type="text" placeholder="8543610" value="<?php echo set_value('sku'); ?>">
                              </div>
                           </div>
                           <!-- end row -->
                           <!-- end row -->
                           <div class="row">
                              <!-- Category  -->
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Price</label>
                                 <input name="price" class="form-control" placeholder="eg 350" type="text" value="<?php echo set_value('price'); ?>">
                              </div>
                              <!-- Price  -->
                              <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
                                 <label class="control-label">Shipping Rate</label>
                                 <input name="shipping" class="form-control" type="text" placeholder="eg Free" value="<?php echo set_value('shipping'); ?>">
                              </div>
                           </div>
                           <!-- end row -->
                           <!-- Image Upload  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                                 <label class="control-label">Photos for your ad <small>Please add images of your deal. (313x234)</small></label>
                                 <div id="dropzone" class="dropzone"></div>
                              </div>
                           </div>
                           <!-- end row -->
                           <!-- Ad Description  -->
                           <div class="row">
                              <div class="col-md-12 col-lg-12 col-xs-12  col-sm-12">
                                 <label class="control-label">Descriptions <small>Enter long description for your deal</small></label>
                                 <textarea name="editor1" id="editor1" rows="12" class="form-control" placeholder=""></textarea>
                              </div>
                           </div>
                           <!-- end row -->
                           <div class="row">
                              <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                 <label class="control-label">Caliber</label>
                                 <input name="caliber" class="form-control" type="text" placeholder="eg 45" value="<?php echo set_value('caliber'); ?>">
                              </div>
                              <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                 <label class="control-label">Frame Description</label>
                                 <input name="framedesc" class="form-control" type="text" placeholder="eg Frame Description" value="<?php echo set_value('framedesc'); ?>">
                              </div>
                              <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                 <label class="control-label">Stock Description</label>
                                 <input class="form-control" name="stock" type="text" placeholder="eg Stock Description" value="<?php echo set_value('stock'); ?>">
                              </div>
                           </div>
                           <!-- end row -->
                            <!-- end row -->
                           <div class="row">
                              <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                                 <label class="control-label">Type</label>
                                 <input name="type" class="form-control" type="text" placeholder="eg A" value="<?php echo set_value('type'); ?>">
                              </div>
                              <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                                 <label class="control-label">Barrel</label>
                                 <input name="barrel" class="form-control" type="text" placeholder="eg 2112" value="<?php echo set_value('barrel'); ?>">
                              </div>
                              <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                                 <label class="control-label">Capacity</label>
                                 <input class="form-control" name="capacity" type="text" placeholder="eg 10" value="<?php echo set_value('capacity'); ?>">
                              </div>
                              <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                                 <label class="control-label">Weight</label>
                                 <input class="form-control" name="weight" type="text" placeholder="eg 12" value="<?php echo set_value('weight'); ?>">
                              </div>
                           </div>
                           <!-- end row -->
                           <button class="btn btn-theme pull-right">Publish My Deal</button>
                        </form>
                     </div>
                     <!-- end post-ad-form-->
                  </div>
                  <!-- end col -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
 <?php $this->load->view("layouts/pagefooter"); ?>
<!-- Ckeditor  -->
<script src="<?php echo base_url(); ?>assets/js/ckeditor/ckeditor.js" ></script>
<!-- Ad Tags  -->
<script src="<?php echo base_url(); ?>assets/js/jquery.tagsinput.min.js"></script>
<!-- DROPZONE JS  -->
<script src="<?php echo base_url(); ?>assets/js/dropzone.js" ></script>
<script src="<?php echo base_url(); ?>assets/js/form-dropzone.js" ></script>
 <script type="text/javascript">
      "use strict";
      
      /*--------- Textarea Ck Editor --------*/
        CKEDITOR.replace( 'editor1' );
       
      /*--------- Ad Tags --------*/ 
       $('#tags').tagsInput({
            'width':'100%'
       });
      
         /*--------- create remove function in dropzone --------*/
         Dropzone.autoDiscover = false;
         var acceptedFileTypes = "image/*"; //dropzone requires this param be a comma separated list
         var fileList = new Array;
         var i = 0;
         $("#dropzone").dropzone({
           addRemoveLinks: true,
           maxFiles: 1, //change limit as per your requirements
         acceptedFiles: '.jpeg,.jpg,.png,.gif,.JPEG,.GIF',
           dictMaxFilesExceeded: "Maximum upload limit reached",
           acceptedFiles: acceptedFileTypes,
         url: "<?php echo base_url('dealer/postdeal/dealsupload/'.$code); ?>",
           dictInvalidFileType: "upload only JPG/PNG",
           init: function () {
               // Hack: Add the dropzone class to the element
               $(this.element).addClass("dropzone");
           }
         });
       (jQuery);
      </script>
     <script style="text/javascript">
   $(document).ready(function(){ 
      $('#category').change(function(){
         $("#subcategory > option").remove(); 
         var category = $('#category').val(); 
         //All Category
         var op = $('<option />');
         op.val("0");
         op.text("All Category");
         $('#subcategory').append(op);
         
         $.post("<?php echo base_url('dealer/postdeal/getsubcategory'); ?>",{category: category})
         .done(function(data){

            $.each(data,function(code,desc) 
            {
               console.log(desc);
               var opt = $('<option />');
               opt.val(code);
               opt.text(desc);
               $('#subcategory').append(opt); 
            });
         });
      });

   });
</script>