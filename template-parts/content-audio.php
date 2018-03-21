<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bloghub
 */

?>
<div class="card">
          <article>
            <header class="entry-header">
            <?php  bloghub_post_formats(); ?>
            
              <!--share-visit-->
              <ul class="share-visit-article">
                <li><?php bloghub_blog_date(); ?></li>
                <li><a href="#"><i class="fa fa-share-alt"></i> 5</a></li>
              </ul>
              <!--/share-visit--> 
            </header>
          </article>
        </div>