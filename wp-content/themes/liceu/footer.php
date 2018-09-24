        </main>
    </div> 
    <footer class="footer">
      <div class="container">
        <div>
          <p class="copyright">
            <?php echo "&#x24B8; Copyright ".date('Y')." ".get_bloginfo('name'); ?>
          </p>
          <ul class="stamps">
            <li>
              <p>Developed by SD</p>
            </li>
            <li>
              <p>W3C | HTML5</p>
            </li>
          </ul>          
        </div>
        <?php get_template_part('template_parts/social-networks'); ?>
      </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>

