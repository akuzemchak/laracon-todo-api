<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

	"accepted"        => ":attribute must be accepted",
	"active_url"      => ":attribute is not a valid URL",
	"after"           => ":attribute must be a date after :date",
	"alpha"           => ":attribute may only contain letters",
	"alpha_dash"      => ":attribute may only contain letters, numbers, and dashes",
	"alpha_num"       => ":attribute may only contain letters and numbers",
	"before"          => ":attribute must be a date before :date",
	"between"         => array(
		"numeric" => ":attribute must be between :min - :max",
		"file"    => ":attribute must be between :min - :max kilobytes",
		"string"  => ":attribute must be between :min - :max characters",
	),
	"confirmed"       => ":attribute confirmation does not match",
	"date"            => ":attribute is not a valid date",
	"date_format"     => ":attribute does not match the format :format",
	"different"       => ":attribute and :other must be different",
	"digits"          => ":attribute must be :digits digits",
	"digits_between"  => ":attribute must be between :min and :max digits",
	"email"           => ":attribute must be a valid email address",
	"exists"          => ":attribute does not exist",
	"image"           => ":attribute must be an image",
	"in"              => ":attribute is invalid",
	"integer"         => ":attribute must be an integer",
	"ip"              => ":attribute must be a valid IP address",
	"max"             => array(
		"numeric"     => ":attribute must be less than :max",
		"file"        => ":attribute must be less than :max kilobytes",
		"string"      => ":attribute must be less than :max characters",
	),
	"mimes"           => ":attribute must be a file of type: :values",
	"min"             => array(
		"numeric"     => ":attribute must be at least :min",
		"file"        => ":attribute must be at least :min kilobytes",
		"string"      => ":attribute must be at least :min characters",
	),
	"not_in"           => ":attribute is invalid",
	"numeric"          => ":attribute must be a number",
	"regex"            => ":attribute is formatted incorrectly",
	"required"         => ":attribute is required",
	"required_if"      => ":attribute is required when :other is :value",
	"required_with"    => ":attribute is required when :values is present",
	"required_without" => ":attribute is required when :values is not present",
	"same"             => ":attribute and :other must match",
	"size"             => array(
		"numeric"    => ":attribute must be :size",
		"file"       => ":attribute must be :size kilobytes",
		"string"     => ":attribute must be :size characters",
	),
	"unique"          => ":attribute has already been taken",
	"url"             => ":attribute is incorrectly formatted",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(
		'description' => 'Description',
		'name' => 'Name',
	),

);
