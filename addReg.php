<html>
    <head>
    <style>
    p.one
    {
        font-size: 72px;
    }
    p.two
    {
        font-size:46px;
    }

    </style>
        <title>User added!</title>
    </head>
    <body>
    <?php
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $board = $_POST['boardsize'];
        $race = $_POST['racetype'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];

        echo "First name is: $fname<br>";
        echo "Last name is: $lname<br>";
        echo "Gender is: $gender<br>";
        echo "Board Size is :$board<br>";
        echo "Race type is: $race<br>";
        echo "Age is: $age<br>";
        echo "Email is: $email<br>";
        echo "Phone is: $phone<br>";
        

        include("database.php");
        $dbc = mysql_connect($dbserver,$dbUser,$dbPass)
            or die('Error connecting to MySQL server.');

        mysql_select_db($dbName,$dbc);



        $addQuery = "Insert into Participant(Fname,Lname,Gender,Age,BoardSize,RaceType)".
            "values('$fname','$lname','$gender','$age','$board','$race')";
        
        
        mysql_query($addQuery)
            or die("error entering participant. $addQuery");

        

        $selectID = "Select PID from Participant where Fname='$fname' and Lname='$lname' and Age='$age'";
        
        $result = mysql_query($selectID)
            or die("Error retrieving ID. $selectID");

        $row = mysql_fetch_assoc($result);

        $pid = $row['PID'];


        $addQuery = "Insert into Participant_info(PID,Email,Phone)".
            "values($pid,'$email','$phone')";

        mysql_query($addQuery)
            or die("Error entering participant info. $addQuery");

        echo "<p class='two'>Your Racer Number is:</p><p class='one'> $pid</p>";
    ?>
    </body>
</html>

