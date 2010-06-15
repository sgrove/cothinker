<?php use_helper('I18N') ?>
<?php use_helper('Date', 'Number', 'I18N', 'Form', 'Object', 'Global') ?>
<div class="shcontainer">
	<?php echo image_tag('shineyheader2.gif') ?>
	<p>
		<?php echo __("Cothink is the place where professors and students come together with community leaders to manage projects for the betterment of the world - or at least GPA's.") ?><br />
	<?php  echo link_to('Take a video tour', '#', 'style="color:orange;font-weight:bold; 	"') ?>
	</p>
</div>
<div id="cothink-steps">
	<h1>Let's get started</h1>
	<div class="cothink-steps" id="step-one">
		<h2>Recruit a stellar team</h2>
		<p>
			using CoThink's report cards, where members review each other and offer feedback on their experiences
		</p>
	</div>
	<div class="cothink-steps" id="step-two">
		<h2>Manage Projects Online</h2>
		<p>
			 via our complete online project-management suite, for free!
		</p>
	</div>
	<div class="cothink-steps" id="step-three">
  		<h2>Collaborate Across Projects</h2>
		<p>
			with CoThink's vibrant community: Share knowledge and experience.
		</p>
	</div>
  <?php //echo include_component('home', 'signUpForm'); ?>
<hr class="clear" />
</div>
<object width="425" height="344"><param name="movie" value="http://www.youtube.com/v/04VLPDfWsXI&hl=en&fs=1"></param><param name="allowFullScreen" value="true"></param><embed src="http://www.youtube.com/v/04VLPDfWsXI&hl=en&fs=1" type="application/x-shockwave-flash" allowfullscreen="true" width="425" height="344"></embed></object>
<?php /*
<ul id="featured-project-menu">
	<li><?php echo link_to(__("More Projects"), "#") ?></li>
	<li><?php echo link_to(__("Apply"), "#") ?></li>
	<li><?php echo link_to(__("Recommend"), "#") ?></li>
	<li id="last"><?php echo link_to(__("Subscribe"), '#') ?></li>
</ul>
      */ ?>
	</div>
</div>


<?php /*
<div id="home-alpha" class="centered">
  <?php echo image_tag('alpha') ?> <br />
  <p class="home-header"><?php echo ucfirst(__("students, we got a deal for you. Make some real change through interesting projects, and get a better grade while you're at it.")) ?><br /><br />Check back with us later for an invitation to test out the service.</p>
</div>

<div id="home-text" class="centered">
  <?php echo form_tag('@homepage')?>
    <p class="home-text">
      
      <?php //echo ucfirst(__("Enter your %email_input% and we'll keep you up to date. No spam, we promise.", array('%email_input%' => input_tag('email','email', array('class' => 'general')).submit_image_tag('button-go', array('class' => 'inline'))))) ?></p>
  </form>
  </div>
 */ ?>
