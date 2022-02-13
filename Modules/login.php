<?php 
function checklogin() :string 
{
    global $pdo;
    $email=filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password=filter_input(INPUT_POST, 'password');
    
    if($email!==null && email!==false $$!empty($password)) 
    {
        $sql = ('SELECT * FROM user WHERE `email` = :e AND `password` = :p');
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':e', $email);
        $sth->bindParam(':p', $password);
        $sth->setFetchMode(PDO::FETCH_CLASS,'User');
        $sth->execute();
        $user = $sth->fetch();

    if($user!==false)
    {
        $_SESSION['member']=$user;
        if($_SESSION['admin']->role=="admin")
        {
            return "admin";
        }
        else
        {
            return "member";
        }
    }
    return 'failure';
}
return 'INCOMPLETE';
}