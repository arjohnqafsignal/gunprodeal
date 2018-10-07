<?php $this->load->view("layouts/header"); ?>
      <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
      <div class="main-content-area clearfix">
         <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
         <section class="section-padding error-page pattern-bgs gray ">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <div class="row">
                        <!-- Blog Archive -->
                        <div class="posts-masonry">
                           <!-- Blog Post-->
                        <?php  foreach ($results as $promo): ?>
                           <div class="col-md-4 col-sm-6 col-xs-12">
                              <div class="blog-post">
                                 <div class="post-img">
                                    <a href="#"> <img class="img-responsive" alt="" src="<?php echo base_url(); ?>assets/images/blog/1.jpg"> </a>
                                 </div>
                                 <div class="post-info"> <a href="">Promo Duration :</a> <a href="#"><?php echo $this->common->formatdate($promo->start_date); ?> - <?php echo $this->common->formatdate($promo->end_date); ?></a> </div>
                                 <h3 class="post-title"> <a href="<?php echo base_url('promotion/learnmore'); ?>"> <?php echo $promo->title; ?></a> </h3>
                                 <p class="post-excerpt"> <?php echo $promo->description; ?> </p>
                              </div>
                           </div>
                        <?php endforeach; ?>
                        </div>
                        <!--<div class="col-md-12 col-xs-12 col-sm-12">
                           <ul class="pagination pagination-lg">
                              <li> <a href="#"> <i class="fa fa-chevron-left" aria-hidden="true"></i></a></li>
                              <li> <a href="#">1</a> </li>
                              <li class="active"> <a href="#">2</a> </li>
                              <li> <a href="#">3</a> </li>
                              <li> <a href="#">4</a> </li>
                              <li><a href="#"> <i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
                           </ul>
                        </div>-->
                     </div>
                  </div>
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End -->
         </section>
         <!-- =-=-=-=-=-=-= Ads Archives End =-=-=-=-=-=-= -->
<?php $this->load->view("layouts/pagefooter"); ?>