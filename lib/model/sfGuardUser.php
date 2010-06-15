<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardUser.php 5760 2007-10-30 07:51:16Z francois $
 */
class sfGuardUser extends PluginsfGuardUser
{
    public function getLastLogin($format = 'Y-m-d H:i:s')
    {
        $value = parent::getLastLogin($format);
        if ($value == null)
        {
            //return 'never'; 
        }
        
        return $value;
    }
    
    public function save($con = null)
    {
        if ($this->getIsApproved() == true)
        {
            $this->getProfile()->setIsApproved( true );
        }
        
        parent::save($con);
    }
}

