<li class="comment">
    <div class="comment-info">
        <img class="pull-left hidden-xs img-circle" src="
            <?php echo base_url(); ?>assets/images/blog/c1.png" alt="author">
            <div class="author-desc">
                <div class="author-title">
                    <strong> <?=isset($USERNAME) ?$USERNAME :'' ?> </strong>
                    <ul class="list-inline pull-right">
                        <li>
                            <a href="#"><?=timespan( strtotime($created_at) , time(), 2). ' ago'?></a>
                        </li>
                        <!-- <li>
                            <a href="#">
                                <i class="fa fa-reply"></i> Reply
                            </a>
                        </li> -->
                    </ul>
                </div>
                <!-- COMMENTS || MESSAGES -->
                <?= $message ?>
            </div>
        </div>
    </li>