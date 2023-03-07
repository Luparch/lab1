<?php namespace u8200620\lab1;

    require 'vendor/autoload.php';

    use u8200620\lab1\User;
    use DateTime;

    class Comment
    {
        private User $user;
        private string $text;
        private DateTime $creationDate;

        function __construct(User $user, string $text)
        {
            $this->user = $user;
            $this->text = $text;
            $this->creationDate = new DateTime();
        }

        function getUser() : User
        {
            return $this->user;
        }

        function getText() : string
        {
            return $this->text;
        }

        function getCreationDate() : DateTime
        {
            return $this->creationDate;
        }

        function __toString(){
            return $this->user." says: ".$this->text;
        }
    }

?>
