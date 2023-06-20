<?php

namespace PagarMe\v5\Exceptions;

final class PagarMeException extends \Exception
{
    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    private $errors;

    /**
     * @param string $type
     * @param string $parameterName
     * @param string $errorMessage
     */
    public function __construct($message, $errors)
    {
        $this->message = $message;
        $this->errors = $errors;

        $exceptionMessage = $this->buildExceptionMessage();

        parent::__construct($message);
    }

    /**
     * @return string
     */
    private function buildExceptionMessage()
    {
		$errorsMessage = '';

		foreach($this->errors as $errorPath => $errorMessage ){
			$errorsMessage .= sprintf("[%s]: %s\n", $errorPath, implode( "\n" , $errorMessage ) );
		}
		
		return $errorsMessage;
    }

    /**
     * @return string
     */
    public function getErrors()
    {
        return $this->errors;
    }

}
