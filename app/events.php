<?php

// ------------------------------------------------------------
// Event Listeners
// ------------------------------------------------------------

User::creating(function($user)
{
	$user->api_key = User::createApiKey();
});