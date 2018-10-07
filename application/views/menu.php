 <div class="user-profile">
      <?php 
         if($users->picture == ''){
            $images = base_url().'assets/images/users/9.jpg';
         } else{
            $images = base_url().'assets/pictures/'.$users->picture;
         }
      ?>
         <a href="<?php base_url('profile'); ?>"><img src="<?php echo $images; ?>" alt="Profile Picture"></a>
         <div class="profile-detail">
            <h6><?php echo $users->name; ?></h6>
            <ul class="contact-details">
               <li>
                  <i class="fa fa-map-marker"></i> USA
               </li>
               <li>
                  <i class="fa fa-envelope"></i>
                  <?php echo $users->email; ?>
               </li>
               <li>
                  <i class="fa fa-phone"></i> <?php echo $users->contact; ?>
               </li>
            </ul>
         </div>
         <ul>
            <li  class="active"><a href="<?php echo base_url('profile'); ?>">Profile</a></li>
            <li ><a href="<?php echo base_url('wishlist'); ?>">My Wishlist <span class="badge">
               <?php echo isset($wishlistcount) ? $wishlistcount: 0 ?>
            </span></a></li>
            <!--<li ><a href="messages.html">Messages</a></li>-->
            <li><a href="<?php echo base_url('login/logout'); ?>">Logout</a></li>
         </ul>
   </div>
