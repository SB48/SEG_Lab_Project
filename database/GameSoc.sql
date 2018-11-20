
create database GameSoc;
use GameSoc;

create table Member (
    memberID VARCHAR(12) PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    fullName VARCHAR(100) AS (concat_ws(' ', firstName, lastName)),
    dob DATE NOT NULL CHECK (dob < CURDATE()),
    damageBan BOOLEAN DEFAULT FALSE,
    banBeginDate DATE DEFAULT NULL
);
    
create table Game (
    gameID VARCHAR(12) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    ageRating ENUM('PG','3','7','12','16','18'),
    genre VARCHAR(20),
    description VARCHAR(255),
    copies TINYINT,
    url VARCHAR(150),
    platform VARCHAR(50)
);

create table Staff (
    staffID VARCHAR(12) PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    fullName VARCHAR(100) AS (concat_ws(' ', firstName, lastName)),
    password VARCHAR(50) NOT NULL,
    privelegeLevel ENUM('Secretary', 'Volunteer') NOT NULL DEFAULT 'Volunteer' 
);

create table Rental (
    rentalID VARCHAR(12) PRIMARY KEY,
    gameID Varchar(12) NOT NULL,
    memberID Varchar(12) NOT NULL,
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

INSERT INTO Rules 
VALUES ('rentalPeriod', 2), 
    ('extensionTime', 2), 
    ('gracePeriod', 2),
    ('numExtensions', 2), 
    ('rentalLimit', 2),
    ('numViolationsForBan', 3), 
    ('lengthOfBan', 6);

create table Actions (
     
     staffID VARCHAR(12) PRIMARY KEY,
     memberID VARCHAR(12),
     dateOfAction DATE NOT NULL,
     actionTaken VARCHAR(50) NOT NULL,
     
     FOREIGN KEY (staffID) REFERENCES Staff(staffID) ON DELETE RESTRICT ON UPDATE CASCADE
     FOREIGN KEY (memberID) REFERENCES Member(memberID) ON DELETE RESTRICT ON UPDATE CASCADE
          
);

create table Violates (
    memberID Varchar(12) NOT NULL,
    dateOfViolation DATE NOT NULL,
    nullified BOOLEAN DEFAULT FALSE,
    
    FOREIGN KEY (memberID) REFERENCES Member(memberID) ON DELETE RESTRICT ON UPDATE CASCADE
);
