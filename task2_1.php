<?php namespace u8200620\lab1;

    require 'vendor/autoload.php';
    
    use u8200620\lab1\User;
    use Throwable;
    use Symfony\Component\Validator\Exception\InvalidArgumentException;

    try{
        $u1 = new User(1, "Ruslan", "ruslan_arbuzi@gmail.com", "qwerty123");
        echo "u1 is ok and created ".$u1->getCreationDate()->format("Y-m-d H:i:s")."<br>";
        $u2 = new User(2, "Ada", "kok28", "");
        echo "u2 is ok and created ".$u2->getCreationDate()->format("Y-m-d H:i:s")."<br>";
    }catch(InvalidArgumentException $e){
        echo $e->getMessage();
    }catch(Throwable $e){
        echo $e->getMessage();
    }
    
?>
