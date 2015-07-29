<?php namespace Motty\Laravel\Validator;

use Illuminate\Contracts\Validation\Factory;

abstract class BaseValidator
{
    /**
     * Validator factory object
     *
     * @var Factory
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
     * Validation messages
     *
     * @var array
     */
    public $messages = [];

    /**
     * Construct
     *
     * @param Factory $validator
     */
    public function __construct(Factory $validator)
    {
        $this->validator = $validator;
    }

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
    public function validate()
    {
        $validator = $this->validator->make($this->data, $this->rules, $this->messages);

        if ($validator->fails()) {
            $this->errors = $validator->messages();
            return false;
        }

        return true;
    }

    /**
     * Return the errors message bag
     *
     * @return \Illuminate\Support\MessageBag
     */
    public function errors()
    {
        return $this->errors;
    }
}
