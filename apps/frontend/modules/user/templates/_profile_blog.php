<div class="news">
<h1><?php echo $profile->getFirstName() ?>'s Blog</h1><?php if ($sf_user->isAuthenticated() && $sf_user->getId() == $profile->getUserId()) echo '('.link_to('Add entry', 'user/blogEntry').')' ?>
		<div class="news-item-header">
			<?php echo image_tag('nopicture.jpg') ?>
			<h3>Site going down</h3>
			<h4>Anon Admin on Feb 10th, 2016 at 2:30pm</h4>
		</div>

		<p> Hey everyone....So the site's going to go down, you know impending comet dom and all that. It was really nice knowing you all, well those of you who knew me as more than Anon Admin. You will be missed. Special thanks to <?php echo link_to('drawyourworld', '#') ?> for securing a place for my family and I in one of the comet shelters.<br />Oh, and on the off chance the comet doesn't hit or destroy the earth, see you all in 10 years when the shelter doors open....no sooner, damned time locks.</p>

		<div class="news-item-header">
			<?php echo image_tag('nopicture.jpg') ?>
			<h3>Site going down</h3>
			<h4>Anon Admin on Feb 10th, 2016 at 2:30pm</h4>
		</div>

		<p> Hey everyone....So the site's going to go down, you know impending comet dom and all that. It was really nice knowing you all, well those of you who knew me as more than Anon Admin. You will be missed. Special thanks to <?php echo link_to('drawyourworld', '#') ?> for securing a place for my family and I in one of the comet shelters.<br />Oh, and on the off chance the comet doesn't hit or destroy the earth, see you all in 10 years when the shelter doors open....no sooner, damned time locks.</p>
</div>
