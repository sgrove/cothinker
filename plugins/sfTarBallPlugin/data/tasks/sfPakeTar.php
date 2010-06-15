<?php
/**
 * This task is used to make a tarball of the project ommiting subversion, eclipse, cache and log files
 *
 * It will look for the XSLT file data/transform/clay2propel.xsl
 * 
 * @author  <anoy@arti-shock.com>
 * 
 * usage : 
 *   symfony tar
 * 
 * installation :
 *   Just drop it in SF_DATA_DIR/tasks/
 */


pake_desc( 'Make a distribution tarball' );
pake_task( 'tar', 'project_exists' );

function run_tar( $task, $args ) 
{
  run_freeze($task, $args);
  pake_echo_action('tar', 'Making a tarball');
	exec('PROJ=`pwd | awk \'BEGIN {FS="/"} {print $NF}\'`;cd ..; tar -czf $PROJ.tgz $PROJ --exclude=.svn --exclude=$PROJ/.* --exclude=$PROJ/log/* --exclude=$PROJ/cache/* ; cd $PROJ');
  run_unfreeze($task, $args);
}

?>
