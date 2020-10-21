<?php

use Symfony\Component\HttpFoundation\RedirectResponse;

$Redirect = new RedirectResponse($Site->getParent()->getUrlRewrittenWithHost());

$Redirect->setStatusCode(301);
$Redirect->send();

exit;
