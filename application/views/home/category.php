<li class="dropdown menu-item"> 
    <a href="#" class="dropdown-toggle sortCategory" data-toggle="dropdown" data-catCode="<?=$category_code?>"><i class="icon fa fa-laptop" aria-hidden="true"></i><?=$name?>
    </a> 

    <?php if ($subMenu != '' ) :?>
        <ul class="dropdown-menu mega-menu-left">
            <li class="yamm-content">
                <div class="row">
                    <?php 
                        foreach ($subMenu as $mListKey => $mList) {
                            /*First Loop*/
                            if ($mListKey == 0 ) {
                                echo '<div class="col-sm-3 col-xs-6  col-md-3">';
                                echo '<ul class="links list-unstyled">';
                            }

                            echo '<li><a  class="sortSubCategory" data-catCode="'.$category_code.'" data-subCatCode="'.$mList['sub_category_code'].'" data-link="'.$mList['list_link'].'">'.$mList['list_name'].'</a></li>';
                            /*Every 5 loop*/
                            if ($mListKey % 5==4 )  {
                                echo '</ul>';
                                echo '</div>';
                                echo '<div class="col-sm-3 col-xs-6 col-md-3"> ';
                                echo '<ul class="links list-unstyled">';
                            }
                        }
                        echo '</ul></div>';
                    ?>
                </div>
            </li>
        </ul>
    <?php endif; ?>
</li>
