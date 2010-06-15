<div id="cothink-signup-frontpage">
	<h1>Join Us</h1>
	<?php echo form_tag('user/register') ?>
		<ul>
		<li>
			<label for="first_name">First Name</label><?php echo input_tag("first_name") ?><br />
			<label for="last_name">Last Name</label><?php echo input_tag("last_name") ?>
		</li>
		<li>
			<?php echo label_for('register_password', 'Password'), input_password_tag("register_password") ?><br />
			<?php echo label_for('register_password_confirm', 'Confirm Password'), input_password_tag("register_password_confirm") ?>

		</li>
		<li>
			<?php echo label_for('register_email', __('Email')), input_tag("register_email") ?><br />
			<?php echo label_for('department', __('Department')), select_tag('department', objects_for_select($departments, 'getUuid', 'getName', '', array()), array('class'=>'xxx', 'style' => 'width:100px;')) ?>
		</li>
		</ul>
		<div style="text-align:center;clear:both;">
			<?php echo submit_tag('Submit', array('class' => 'btn', 'style' => 'color:black;')) ?>
		</div>
	</form>
</div>
