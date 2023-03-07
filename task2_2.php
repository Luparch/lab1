<?php namespace u8200620\lab1;
    require 'vendor/autoload.php';
    //require 'Comment.php';
    
    use u8200620\lab1\User;
    use u8200620\lab1\Comment;
    use DateTime;
    use Throwable;
    use Symfony\Component\Validator\Exception\InvalidArgumentException;

    try{
        $ruslan = new User(1, "Ruslan", "ruslan_arbuzi@gmail.com", "qwerty123");
        $max = new User(3, "Max", "max@gmail.com", "asdfghjklqwe");
        $arr = [new Comment($ruslan, "first"), new Comment($ruslan, "second")];
        $dateTime = new DateTime();
        $eve = new User(2, "Eve", "zxcvbnm@gmail.com", "passpass");
        $arr[] = new Comment($eve, "prelast");
        $arr[] = new Comment($max, "last");

        foreach($arr as $comment){
            if(($comment->getUser()->getCreationDate() < $dateTime)){
                echo $comment."<br>";
            }
        }
    }catch(InvalidArgumentException $e){
        echo $e->getMessage();
    }catch(Throwable $e){
        echo $e->getMessage();
    }
    
?>