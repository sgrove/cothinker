<?php include_partial('edit_project_tasklist', array('project' => $project, 'projectUsers' => $project->getApprovedUsers(), 'collapsable' => 'true'), array('evalScripts' => true))?>