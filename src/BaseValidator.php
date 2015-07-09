<?php namespace Motty\Laravel\Validator;

abstract class BaseValidator
{
    /**
     * The validator instance
     *
     * @var object
     */
    protected $validator;

    /**
     * Data to be validated
     *
     * @var array
     */
    protected $data = [];

    /**
     * Validation rules
     *
     * @var array
     */
    protected $rules = [];

    /**
     * Validation errors
     *
     * @var \Illuminate\Support\MessageBag
     */
    protected $errors = [];

    /**
     * Set data to validate
     *
     * @param  array  $data
     * @return self
     */
    public function with(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Validate the data and the rules to the validator
     *
     * @return boolean
     */
    abstract public function validate();

    /**
     * Return errors
     *
     * @return \Illuminate\Support\MessageBag
     */
    public function errors()
    {
        return $this->errors;
    }
}
