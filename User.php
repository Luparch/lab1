<?php namespace u8200620\lab1;

    require 'vendor/autoload.php';

    use DateTime;
    use Symfony\Component\Validator\Validation;
    use Symfony\Component\Validator\ConstraintViolationListInterface;
    use Symfony\Component\Validator\Constraints\Length;
    use Symfony\Component\Validator\Constraints\NotBlank;
    use Symfony\Component\Validator\Constraints\Email;
    use Symfony\Component\Validator\Exception\InvalidArgumentException;

    class User
    {
        private int $id;
        private string $name;
        private string $email;
        private string $password;
        private DateTime $creationDate;

        function __construct(int $id, string $name, string $email, string $password)
        {
            $validator = Validation::createValidator();

            $violations = $validator->validate($name, [
                new Length(['min' => 2]),
                new NotBlank()
            ]);
            self::checkViolations($violations);
            
            $violations = $validator->validate($email, [
                new Email()
            ]);
            self::checkViolations($violations);
            
            $violations = $validator->validate($password, [
                new Length(['min' => 8]),
                new NotBlank()
            ]);
            self::checkViolations($violations);
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->creationDate = new DateTime();
        }

        private static function checkViolations(ConstraintViolationListInterface $violations) : void
        {
            if (0 !== count($violations)) {
                $violationsMsg = "";
                foreach ($violations as $violation) {
                    $violationsMsg .= $violation->getMessage().'<br>'; 
                }
                throw new InvalidArgumentException($violationsMsg);
            }
        }

        function getId() : int
        {
            return $this->id;
        }

        function getName() : string
        {
            return $this->name;
        }

        function getEmail() : string
        {
            return $this->email;
        }

        function getPassword() : string
        {
            return $this->password;
        }

        function getCreationDate() : DateTime
        {
            return $this->creationDate;
        }

        function __toString()
        {
            return "#".$this->id."#".$this->name."[".$this->email."]";
        }
    }

?>
