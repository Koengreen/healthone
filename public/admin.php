    <?php 
    global $params;

    if(!isadmin()) {
        logout();
        header ("location:/home");

    }
    else {

        switch ($params[2]) {
            
            case 'home':
                include_once 



        }



    }