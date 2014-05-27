create table if not exists Participant(
    PID int(8) unique Primary Key AUTO_INCREMENT,
    Fname varchar(30),
    Lname varchar(30),
    Gender varchar(30),
    Age int(10),
    BoardSize varchar(30),
    RaceType varchar(30),
    Time time,
    Place varchar(30),
    Expand int(10)
    )Auto_increment=1000;


create table if not exists Participant_info(
    PID int(8) unique Primary Key,
    Email varchar(100),
    Phone varchar(100),
    Expand int(10)
    



    );
