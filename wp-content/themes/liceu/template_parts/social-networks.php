<?php if ( get_theme_mod('telegram') || get_theme_mod('git') || get_theme_mod('facebook') || get_theme_mod('linkedin') || get_theme_mod('instagram') || get_theme_mod('twitter') || get_theme_mod('pinterest') || get_theme_mod('rss') ) : ?>
	<nav class="social-networks">
	    <ul>
	        <?php if ( get_theme_mod('facebook') ) : ?>
	        <li>
	            <a href="<?php echo get_theme_mod('facebook');  ?>" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
	        </li>
	        <?php endif; ?>
	        <?php if ( get_theme_mod('twitter') ) : ?>
	        <li>
	            <a href="<?php echo get_theme_mod('twitter');  ?>" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
	        </li>
	        <?php endif; ?>
	        <?php if ( get_theme_mod('youtube') ) : ?>
	        <li>
	            <a href="<?php echo get_theme_mod('youtube');  ?>" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>
	        </li>
	        <?php endif; ?>   
	        <?php if ( get_theme_mod('git') ) : ?>
	        <li>
	            <a href="<?php echo get_theme_mod('git');  ?>" title="GIT" target="_blank"><i class="fab fa-github"></i></a>
	        </li>
	        <?php endif; ?>   
	        <?php if ( get_theme_mod('instagram') ) : ?>
	        <li>
	            <a href="<?php echo get_theme_mod('instagram');  ?>" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
	        </li>
	        <?php endif; ?>
	        <?php if ( get_theme_mod('linkedin') ) : ?>
	        <li>
	            <a href="<?php echo get_theme_mod('linkedin');  ?>" title="Linkedin" target="_blank"><i class="fab fa-linkedin"></i></a>
	        </li>
	        <?php endif; ?>
	        <?php if ( get_theme_mod('googleplus') ) : ?>
	        <li>
	            <a href="<?php echo get_theme_mod('googleplus');  ?>" title="Google Plus" target="_blank"><i class="fab fa-google-plus"></i></a>
	        </li>
	        <?php endif; ?>        
	        <?php if ( get_theme_mod('pinterest') ) : ?>
	        <li>
	            <a href="<?php echo get_theme_mod('pinterest');  ?>" title="Pinterest" target="_blank"><i class="fab fa-pinterest"></i></a>
	        </li>
	        <?php endif; ?>
	        <?php if ( get_theme_mod('rss') ) : ?>
	        <li>
	            <a href="<?php echo get_theme_mod('rss');  ?>" title="RSS" target="_blank"><i class="fab fa-rss"></i></a>
	        </li>
	        <?php endif; ?>        
	        <?php if ( get_theme_mod('telegram') ) : ?>
	        <li>
	            <a href="<?php echo get_theme_mod('telegram');  ?>" title="Telegram" target="_blank"><i class="fab fa-telegram"></i></a>
	        </li>
	        <?php endif; ?>                   
	    </ul>
	</nav>
<?php endif; ?>