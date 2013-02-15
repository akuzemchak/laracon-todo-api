<?php

use Illuminate\Support\MessageBag;
use Illuminate\Support\Contracts\MessageProviderInterface;

class ErrorMessageException extends RuntimeException
{
	/**
	 * The error messages.
	 *
	 * @var Illuminate\Support\MessageBag
	 */
	protected $messages;

	/**
	 * Create new ErrorMessageException.
	 *
	 * @param  mixed  $messages
	 * @param  int  $code
	 * @param  Exception  $previous
	 * @return void
	 */
	public function __construct($messages, $code = 0, Exception $previous = null)
	{
		// Make sure we're working with a MessageBag
		if (!($messages instanceof MessageProviderInterface))
		{
			$messages = new MessageBag((array) $messages);
		}

		$this->messages = $messages->getMessageBag();
		$this->messages->setFormat(':message');

		parent::__construct('', $code, $previous);
	}

	/**
	 * Return error messages.
	 *
	 * @return Illuminate\Support\MessageBag
	 */
	public function getMessages()
	{
		return $this->messages;
	}
}