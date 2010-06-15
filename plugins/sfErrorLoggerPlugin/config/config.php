<?php

sfMixer::register('sfException:printStackTrace',   array('sfErrorLogger', 'log500'));
sfMixer::register('sfController:forward:error404', array('sfErrorLogger', 'log404'));
