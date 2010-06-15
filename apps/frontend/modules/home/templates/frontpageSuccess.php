<?php use_helper('I18N') ?>
<?php use_helper('Date', 'Number', 'I18N', 'Form') ?>
<div class="shcontainer">
	<?php echo image_tag('shineyheader2.gif') ?>
	<p>
		<?php echo __("Cothink is a place where professors and students can come together with their communities to manage projects for the betterment of the world - or at least GPA's.") ?><br />
	(<?php echo link_to('Take a video tour', '#', 'style="color:orange;font-weight:bold; 	"') ?>)
	</p>
</div>
<div id="cothink-steps">
	<h1>Let's get started</h1>
	<div class="cothink-steps" id="step-one">
		<h2>Search for your project</h2>
		<p>
			You can sort projects based on interest, subject, or even class!
		</p>
	</div>
	<div class="cothink-steps" id="step-two">
		<h2>Make a difference</h2>
		<p>
			After a quick application process for the project, join in and use your unique skills to help others.
		</p>
	</div>
	<div class="cothink-steps" id="step-three">
		<h2>Get a better grade</h2>
		<p>
			Use Cothink to auto-notify your professor, or directly print out detailed reports to turn in.
		</p>
	</div>
	<div id="cothink-signup-frontpage">
	

<?php /*
<div id="home-alpha" class="centered">
  <?php echo image_tag('alpha') ?> <br />
  <p class="home-header"><?php echo __("students, we got a deal for you. make some real change through interesting projects, and get a better grade while you're at it.") ?></p>
</div>

<div id="home-text" class="centered">
  <?php echo form_tag('@homepage')?>
    <p class="home-text">Enter your <?php echo input_tag('email','email', array('class' => 'general')).submit_image_tag('button-go', array('class' => 'inline')) ?>and we'll keep you up to date. No spam, we promise.</p>
  </form>
  </div>
 */ ?>
