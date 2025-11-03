<?php do_action( 'fl_content_close' ); ?>

<?

////////////////
// NEW FOOTER //
////////////////
?>
</main><!-- .fl-page-content -->
<?php
	do_action( 'fl_after_content' );
?>

<footer class="fl-page-footer-wrap"<?php FLTheme::print_schema( ' itemscope="itemscope" itemtype="https://schema.org/WPFooter"' ); ?>>
    <h2 class="sr-only">Footer</h2>
    
    <div class="footer_row_wrapper mainfooter">
            
         <?php
             
             $footer_row1col1  = get_field('footer_row1col1', 'option'); 
             $footer_row1col2  = get_field('footer_row1col2', 'option'); 
             $footer_row1col3  = get_field('footer_row1col3', 'option'); 
             $footer_rowlast   = get_field('footer_rowlast', 'option'); 

             if ($footer_row1col1) {
                 ?>
                     <div class="footer_row">

                        <!-- =========== -->
                        <!-- ROW 1 COL 1 -->
                        <!-- =========== -->
                        <?php if ($footer_row1col1['footer_row1col1_title'] || $footer_row1col1['footer_row1col1_cont']) { ?>
                            <div class="footer_col col1">
                            <?php
                                if ($footer_row1col1['footer_row1col1_title']) {
                                    ?><h3 class='h2'><?=$footer_row1col1['footer_row1col1_title'];?></h3><?php
                                }
                                if ($footer_row1col1['footer_row1col1_cont']) {
                                    ?><?=$footer_row1col1['footer_row1col1_cont'];?><?php
                                }
                            ?>
                            </div>
                        <?php } ?>

                        <!-- =========== -->
                        <!-- ROW 1 COL 2 -->
                        <!-- =========== -->
                        <?php if ($footer_row1col2['footer_row1col2_title'] || $footer_row1col2['footer_row1col2_cont']) { ?>
                            <div class="footer_col col2">
                            <?php
                                if ($footer_row1col2['footer_row1col2_title']) {
                                    ?><h3><?=$footer_row1col2['footer_row1col2_title'];?></h3><?php
                                }
                                if ($footer_row1col2['footer_row1col2_cont']) {
                                    ?><?=$footer_row1col2['footer_row1col2_cont'];?><?php
                                }
                            ?>
                            </div>
                        <?php } ?>                        
                        
                        <!-- =========== -->
                        <!-- ROW 1 COL 3 -->
                        <!-- =========== -->
                        <?php if ($footer_row1col3['footer_row1col3_title'] || $footer_row1col3['footer_row1col3_cont']) { ?>
                            <div class="footer_col col3">
                            <?php
                                if ($footer_row1col3['footer_row1col3_title']) {
                                    ?><h3><?=$footer_row1col3['footer_row1col3_title'];?></h3><?php
                                }
                                if ($footer_row1col3['footer_row1col3_cont']) {
                                    ?><?=$footer_row1col3['footer_row1col3_cont'];?><?php
                                }
                            ?>
                            </div>
                        <?php } ?>                                                

                     </div>
                 <?php
             }

            if ($footer_rowlast) {
                 ?>
                     <div class="footer_rowlast">
                        <?=$footer_rowlast;?>
                    </div>
                <?php
            }
             
         ?>

    </div>


</footer>

<?php do_action( 'fl_page_close' ); ?>
<?php

wp_footer();
do_action( 'fl_body_close' );

?>
</body>
</html>



