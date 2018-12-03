create database GameSoc;
use GameSoc;

create table Member (
    memberID INT(8) PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    fullName VARCHAR(100) AS (concat_ws(' ', firstName, lastName)),
    dob DATE NOT NULL CHECK (dob < CURDATE()),
    damageBan BOOLEAN DEFAULT FALSE,
    normalBan BOOLEAN DEFAULT FALSE,
    banBeginDate DATE DEFAULT NULL,
    amountDue TINYINT DEFAULT 0
    );
    
create table Game (
    gameID INT(12) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    price TINYINT NOT NULL,
    ageRating ENUM('PG','3','7','12','16','18'),
    genre VARCHAR(20),
    description VARCHAR(1000),
    copies TINYINT,
    url VARCHAR(150),
    platform VARCHAR(50)
);

create table Staff (
    staffID INT(8) PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    fullName VARCHAR(100) AS (concat_ws(' ', firstName, lastName)),
    password VARCHAR(50) NOT NULL,
    privelegeLevel ENUM('Secretary', 'Volunteer') NOT NULL DEFAULT 'Volunteer' 
);


create table Rental (
    rentalID INT(12) PRIMARY KEY AUTO_INCREMENT,
    gameID INT(12) NOT NULL,
    memberID INT(8) NOT NULL,
    returnDate DATE NOT NULL,
    returned BOOL DEFAULT FALSE,
    extensions TINYINT,
    
    FOREIGN KEY (memberID) REFERENCES Member(memberID) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (gameID) REFERENCES Game(gameID) ON DELETE RESTRICT ON UPDATE CASCADE
);

create table Rules (
    rule VARCHAR(30) PRIMARY KEY, 
    value TINYINT NOT NULL
);

create table Actions (
     
     staffID INT(8) PRIMARY KEY,
     memberID INT(8),
     dateOfAction DATE NOT NULL,
     actionTaken VARCHAR(50) NOT NULL,
     
     FOREIGN KEY (staffID) REFERENCES Staff(staffID) ON DELETE RESTRICT ON UPDATE CASCADE,
     FOREIGN KEY (memberID) REFERENCES Member(memberID) ON DELETE RESTRICT ON UPDATE CASCADE
          
);

create table Violates (
    memberID INT(8) NOT NULL,
    dateOfViolation DATE NOT NULL,
    nullified BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (memberID) REFERENCES Member(memberID) ON DELETE RESTRICT ON UPDATE CASCADE
);
