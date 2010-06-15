<?php

if (sfConfig::get('app_sfSupportPlugin_routes_register', true) && in_array('sfSupport', sfConfig::get('sf_enabled_modules')))
{
  $r = sfRouting::getInstance();

  // preprend our routes
  $r->prependRoute('sf_support', '/support', array('module' => 'sfSupport', 'action' => 'index'));
  $r->prependRoute('sf_ticket_create', '/mytickets/create/:id', array('module' => 'sfTicket', 'action' => 'create'), array('id' => '\d+'));
  $r->prependRoute('sf_tickets', '/mytickets/opened', array('module' => 'sfTicket', 'action' => 'opened'));
  $r->prependRoute('sf_ticket_closed', '/mytickets/closed', array('module' => 'sfTicket', 'action' => 'closed'));
  $r->prependRoute('sf_ticket', '/mytickets/show/:id', array('module' => 'sfTicket', 'action' => 'show'), array('id' => '\d+'));
  $r->prependRoute('sf_ticket_reply', '/mytickets/reply/:id', array('module' => 'sfTicket', 'action' => 'reply'), array('id' => '\d+'));
}
