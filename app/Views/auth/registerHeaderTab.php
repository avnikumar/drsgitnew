<?php
// $router = service('router');
// $currentController = $router->controllerName();
// $currentMethod = $router->methodName();
$uri = service('uri');
$segment1 = $uri->getSegment(1);
?>
<div class="title-reg text-center mb-4">Create an Account</div>
<div class="col-md-12 mb-4">
    <div class="d-flex justify-content-center">
        <a href="/register-patient" class="btn btn-outline-primary mr-2 flex-fill <?= $segment1=='register-patient'?'btn-reg-active':'';?>">Patient</a>
        <a href="/register-doctor" class="btn btn-outline-primary mr-2 flex-fill <?= $segment1=='register-doctor'?'btn-reg-active':'';?>">Doctors</a>
        <a href="/register-partner" class="btn btn-outline-primary flex-fill <?= $segment1=='register-partner'?'btn-reg-active':'';?>">Partners</a>
    </div>
</div>