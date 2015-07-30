<?php namespace Motty\Laravel\Validator\Traits;

use Motty\Laravel\Validator\Contracts\Validator;
use Motty\Laravel\Validator\Exceptions\ValidateException;

use Exception;

trait Validatable
{
    /**
     * The errors MessageBag instance
     *
     * @var \Illuminate\Support\MessageBag
     */
    protected $errors;

    /**
     * Run the validation checks in the input data
     *
     * @param  array  $data
     *
     * @return bool
     * @throws Exception
     * @throws ValidateException
     */
    public function runValidationChecks(array $data)
    {
        foreach ($this->validators as $validator) {
            if ($validator instanceof Validator) {
                if (!$validator->with($data)->validate()) {
                    $this->errors->merge($validator->errors());
                }
            } else {
                throw new Exception("{$validator} is not an instance of Motty\\Laravel\\Validator\\Contracts\\Validator");
            }
        }

        if ($this->errors->isEmpty()) {
            return true;
        }

        throw new ValidateException('Validation failed', $this->errors);
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
