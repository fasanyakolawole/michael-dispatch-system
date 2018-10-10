<?php

class APIResponse
{

    /**
     * @var boolean
     * Boolean value holding the status of this request.
     * True means request was successful and false means an error occured.
     */
    private $status;

    /**
     * @var mixed
     * Could be any data type, representing the result of the request if successful;
     */
    private $result;

    /**
     * @var array
     * A list of all error messages that led to a false status;
     */
    private $errors;

    /**
     * APIResponse constructor.
     * @param bool $status
     * @param mixed $result
     * @param array $errors
     */
    public function __construct($status, $result, array $errors)
    {
        $this->status = $status;
        $this->result = $result;
        $this->errors = $errors;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus(bool $status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     */
    public function setErrors(array $errors)
    {
        $this->errors = $errors;
    }



}