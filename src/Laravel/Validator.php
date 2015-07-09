<?php namespace Motty\Laravel\Validator\Laravel;

use Illuminate\Contracts\Validation\Factory;

abstract class Validator extends BaseValidator
{
    /**
     * Validator
     *
     * @var Factory
     */
    protected $validator;

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
     * Validate the data and the rules to the validator
     *
     * @return boolean
     */
    public function validate()
    {
        $validator = $this->validator->make($this->data, $this->rules);

        if ($validator->fails()) {
            $this->errors = $validator->messages();
            return false;
        }

        return true;
    }
}
