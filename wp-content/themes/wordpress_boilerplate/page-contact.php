<?php
/*
Template Name: Contact
*/

 get_header(); ?>

<section id="main">
	<div class="row">
<div class="wrapper wrapper-inset">
			<div class="mod article" <?php post_class(); ?>>
				<header class="hd">
					<h2 class="h2"><?php the_title(); ?></h2>
				</header>
				<section data-context="text" class="bd">
  <div class="wufoo_container">

          <form id="form1" name="form1" class="wufoo page" autocomplete="off" enctype="multipart/form-data" method="post" action="https://andrewheins.wufoo.com/forms/z7x3k1/#public">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
              <?php the_content(); ?>
						
						<?php endwhile; ?>	

            <?php endif; ?>


            <ul>
              <li>
                <label>
                  Email <span class="instruct" id="instruct2">Absolutely will not be shared.</span>
                </label>
                <div>
                  <input id="Field2" name="Field2" type="email" spellcheck="false" class="required" value="" maxlength="255" tabindex="1" placeholder="you@example.com" required /> 
                </div>
              </li>
              <li>
                <label>
                  Message <span id="req_1" class="req">*</span>
                </label>
                <div>
                  <textarea id="Field1" 
                    name="Field1" 
                    class="required" 
                    spellcheck="true" 
                    rows="10" cols="50" 
                    tabindex="3" 
                    placeholder="Connecting on a whole new level..."
                    required  ></textarea>
                </div>
                <div>
                  <input id="saveForm" name="saveForm" class="btTxt submit" type="submit" value="Submit Message" />
                </div>
              </li>

              <li class="hide">
                <label for="comment">Do Not Fill This Out</label>
                <textarea name="comment" id="comment" rows="1" cols="1"></textarea>
                <input type="hidden" id="idstamp" name="idstamp" value="du/OwQ4OHDakP6e9bmAfmcYFgp4IXR4joh3Pvb3KMIE=" />
              </li>
            </ul>
          </form>
        </div>
				</section>
			</div>

		</div>
	</div>

</section>

<?php get_footer(); ?>
