<?php

class Person {
	/**
	 * @var int $age value of age
	 */
	protected $age;

	/**
	 * @var string $name value of name
	 */
	protected $name;

	/**
	 * constructor
	 *
	 * @param int $newAge
	 * @param string $newName
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data types are out of bounds
	 * @throws \Exception if some other exception occurs
	 * @throws \TypeError if data types violate type hints
	 */

	public function __construct(int $newAge, string $newName) {
		try {
			$this->setAge($newAge);
			$this->setName($newName);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * Accessor for age
	 *
	 * @return int value of age
	 */
	/**
	 * @return int
	 */
	public function getAge(): int {
		return $this->age;
	}

	/**
	 * Mutator for age
	 *
	 * @param int $newAge new value of age
	 * @throws \InvalidArgumentException if age is not a positive number
	 * @throws \RangeException if age is less than 18 or greater than 118
	 * @throws \TypeError if not an int
	 */
	public function setAge(int $newAge) : void {
		if($newAge < 0) {
			throw(new \InvalidArgumentException("Age cannot be less than 0"));
		} elseif($newAge <= 18) {
			throw (new \RangeException("hi caleb"));
		}elseif($newAge > 118) {
			throw(new \RangeException("captain @deepdivedylan"));
		}
		$this->age = $newAge;
	}

	/**
	 * Accessor for name
	 *
	 * @return string $newName
	 */
	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * Mutator for name
	 *
	 * @param string $newName new value of name
	 * @throws \RangeException if value is > 64 characters
	 * @throws \TypeError if value is not a string
	 */
	public function setName(string $newName): void {
		$newName = trim($newName);
		$newName = filter_var($newName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(strlen($newName) > 64) {
			throw (new \RangeException("Name cannot exceed 64 characters in length"));
		}

		$this->name = $newName;
	}

	public function __toString() {
		return $this->name . " is " . $this->age . " years old";
	}
}

$ryan = new Person(25, "Ryan");

echo $ryan;