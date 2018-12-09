<<<<<<< HEAD
INSERT INTO Rules 
VALUES ('rentalPeriod', 2), 
    ('extensionTime', 2), 
    ('gracePeriod', 2),
    ('numExtensions', 2), 
    ('rentalLimit', 2),
    ('numViolationsForBan', 3), 
    ('lengthOfBan', 6);

INSERT INTO Game (gameId, name, price, ageRating, genre, copies, url, platform, description)
Values
('040050570900', 'Bomberman', '40', '3', 'Action','4','https://www.mobygames.com/game/bomberman','PC','This top-down action-arcade game consists of nine levels per stage, each tougher than the other, and each final one consisting of the boss that will have to be dealt with. Bomberman can move horizontally and vertically and lay down bombs behind him, thus evaporating the enemies, but beware: Bomberman can block himself with his own bomb, and thus become a victim of his own bomb.'),
('700384950201', 'The Legend of Zelda: A Link to the Past', '42', '7', 'Action','2','https://www.mobygames.com/game/legend-of-zelda-a-link-to-the-past','XBOX','The Legend of Zelda: A Link to the Past is a top-down action game with puzzle-solving elements (similar to the original Legend of Zelda). Players assume the role of Link, and their goal is to rescue Princess Zelda and save the land of Hyrule. All combat in the game is action-oriented - the player can make the protagonist swing the sword at enemies with a press of a button, or spin the sword around for a more powerful attack by holding down the button until it is charged.'),
('004000500500', 'Duke Nukem', '30', '12', 'Action','2','https://www.mobygames.com/game/duke-nukem','PC', 'The main objective of the game is to get to the exit of each level, while destroying enemies and collecting points. Many objects onscreen can be shot including boxes, obstacles and blocks. Besides points, some collectibles include health powerups, gun powerups, and some inventory items with special abilities. The final level of each episode has no exit, and is instead completed by finding and defeating Dr. Proton.'),
('400000500006', 'Wasteland', '39', '16', 'Role-Playing','1','https://www.mobygames.com/game/wasteland','PS4','The main objective of the game is to get to the exit of each level, while destroying enemies and collecting points. Many objects onscreen can be shot including boxes, obstacles and blocks. Besides points, some collectibles include health powerups, gun powerups, and some inventory items with special abilities. The final level of each episode has no exit, and is instead completed by finding and defeating Dr. Proton.'),
('006000000004', 'Wasteland', '39', '16', 'Role-Playing','1','https://www.mobygames.com/game/wasteland','XBOX','The main objective of the game is to get to the exit of each level, while destroying enemies and collecting points. Many objects onscreen can be shot including boxes, obstacles and blocks. Besides points, some collectibles include health powerups, gun powerups, and some inventory items with special abilities. The final level of each episode has no exit, and is instead completed by finding and defeating Dr. Proton.'),
('000800090001', 'Wasteland', '39', '16', 'Role-Playing','2','https://www.mobygames.com/game/wasteland','PC','The main objective of the game is to get to the exit of each level, while destroying enemies and collecting points. Many objects onscreen can be shot including boxes, obstacles and blocks. Besides points, some collectibles include health powerups, gun powerups, and some inventory items with special abilities. The final level of each episode has no exit, and is instead completed by finding and defeating Dr. Proton.'),
('800000005007', 'Air Hockey', '21', '3', 'Action','8','https://www.mobygames.com/game/air-hockey__','PC','In this simulation of the air hockey arcade game the player controls a mallet trying to hit he puck into the opponents goal. The game is played until seven goals are scored (Classic mode) or until the timer reaches zero (Timed mode). There are three difficulty settings. A variety of color choices for the playfield and the puck are available. The game supports two-player versus matches on a single device.'),
('650005008001', 'The Arrival', '40', '18', 'Action','3','https://www.mobygames.com/game/arrival','XBOX','You have a first person view with complete freedom of movement. The puzzles have a science fiction theme, involving either object usage or looking for details. A hint system helps adventure game rookies to get used to the process of puzzle-solving. The game is non-linear and can come to several different endings.');

INSERT INTO STAFF(staffID, firstName, lastName, password, privelegeLevel) 
VALUES 
('043125060798', 'Daenerys', 'Targaryen', '000000000000', default),
('004500375801', 'Jon', 'Snow', '000000000001', default),
('900049280002', 'Tyrion', 'Lannister', '000000000002', default),
('093000346703', 'Arya', 'Stark', '000000000003', default),
('201849938204', 'Cersei', 'Lannister', '000000000004', 'Secretary');

INSERT INTO Member(memberID, firstName, lastName, dob) 
VALUES 
('734689274637','Sansa', 'Stark', 27-08-1990),
('184689728636','Khal', 'Drogo', 01-10-1992),
('292829388813','Joffrey', 'Baratheon', 08-01-1984),
('638104283942','Sandor', 'Clegane', 23-06-1988),
('930000271834','Ramsay', 'Bolton', 18-04-1996);

INSERT INTO Member(memberID, firstName, lastName, dob, damageBan, banBeginDate)
VALUES
('628891281829','Petyr', 'Baelish', '13-12-1978', true, 05-12-2017),
('515193256328','Oberyn', 'Martell', '12-03-1956', true, 02-08-2018),
('718349205671','Eddard', 'Stark', '23-07-1989', true, 06-03-2018);

INSERT INTO Rental(rentalID, gameID, memberID, returnDate, returned, extensions)
VALUES 
('1928547378892', '700384950201', '734689274637', 01-10-2018, true, 0),
('9284728113745', '400000500006', '628891281829', 04-12-2018, true, 1);

INSERT INTO Actions(staffID, memberID, dateOfAction, actionTaken)
VALUES
('043125060798', '515193256328', 02-08-2018, 'ban');

INSERT INTO Violates (memberID, dateOfViolation, nullified)
VALUES 
('292829388813', 04-03-2014, true);
=======
INSERT INTO Rules
VALUES ('rentalPeriod', 2),
    ('extensionTime', 2),
    ('gracePeriod', 52),
    ('numExtensions', 2),
    ('rentalLimit', 2),
    ('numViolationsForBan', 3),
    ('lengthOfBan', 6);

INSERT INTO Game (name, ageRating, price, genre, copies, url, path, platform, description)
Values
('Bomberman', '3', '42', 'Action','4','https://www.mobygames.com/game/bomberman','pictures/bomberman.png','PC','This top-down action-arcade game consists of nine levels per stage, each tougher than the other, and each final one consisting of the boss that will have to be dealt with. Bomberman can move horizontally and vertically and lay down bombs behind him, thus evaporating the enemies, but beware: Bomberman can block himself with his own bomb, and thus become a victim of his own bomb.'),
('The Legend of Zelda: A Link to the Past', '7', '35', 'Action','2','https://www.mobygames.com/game/legend-of-zelda-a-link-to-the-past','public/pictures/zelda-a-link-to-the-past.jpg','XBOX','The Legend of Zelda: A Link to the Past is a top-down action game with puzzle-solving elements (similar to the original Legend of Zelda). Players assume the role of Link, and their goal is to rescue Princess Zelda and save the land of Hyrule. All combat in the game is action-oriented - the player can make the protagonist swing the sword at enemies with a press of a button, or spin the sword around for a more powerful attack by holding down the button until it is charged.'),
('Duke Nukem', '12', '25', 'Action','2','https://www.mobygames.com/game/duke-nukem','pictures/duke-nukem.png','PC', 'The main objective of the game is to get to the exit of each level, while destroying enemies and collecting points. Many objects onscreen can be shot including boxes, obstacles and blocks. Besides points, some collectibles include health powerups, gun powerups, and some inventory items with special abilities. The final level of each episode has no exit, and is instead completed by finding and defeating Dr. Proton.'),
('Wasteland', '16', '30', 'Role-Playing','1','https://www.mobygames.com/game/wasteland','pictures/wasteland.jpg','PS4','The main objective of the game is to get to the exit of each level, while destroying enemies and collecting points. Many objects onscreen can be shot including boxes, obstacles and blocks. Besides points, some collectibles include health powerups, gun powerups, and some inventory items with special abilities. The final level of each episode has no exit, and is instead completed by finding and defeating Dr. Proton.'),
('Wasteland', '16', '28', 'Role-Playing','1','https://www.mobygames.com/game/wasteland','pictures/wasteland.jpg','XBOX','The main objective of the game is to get to the exit of each level, while destroying enemies and collecting points. Many objects onscreen can be shot including boxes, obstacles and blocks. Besides points, some collectibles include health powerups, gun powerups, and some inventory items with special abilities. The final level of each episode has no exit, and is instead completed by finding and defeating Dr. Proton.'),
('Wasteland', '16', '40','Role-Playing','2','https://www.mobygames.com/game/wasteland','pictures/wasteland.jpg','PC','The main objective of the game is to get to the exit of each level, while destroying enemies and collecting points. Many objects onscreen can be shot including boxes, obstacles and blocks. Besides points, some collectibles include health powerups, gun powerups, and some inventory items with special abilities. The final level of each episode has no exit, and is instead completed by finding and defeating Dr. Proton.'),
('Air Hockey', '3', '36', 'Action','8','https://www.mobygames.com/game/air-hockey__','pictures/air-hockey.png','PC','In this simulation of the air hockey arcade game the player controls a mallet trying to hit he puck into the opponents goal. The game is played until seven goals are scored (Classic mode) or until the timer reaches zero (Timed mode). There are three difficulty settings. A variety of color choices for the playfield and the puck are available. The game supports two-player versus matches on a single device.'),
('The Arrival', '18', '16', 'Action','3','https://www.mobygames.com/game/arrival','pictures/the-arrival.jpg','XBOX','You have a first person view with complete freedom of movement. The puzzles have a science fiction theme, involving either object usage or looking for details. A hint system helps adventure game rookies to get used to the process of puzzle-solving. The game is non-linear and can come to several different endings.');

INSERT INTO STAFF(firstName, lastName, password, privelegeLevel)
VALUES
('Daenerys', 'Targaryen', '000000000000', default),
('Jon', 'Snow', '000000000001', default),
('Tyrion', 'Lannister', '000000000002', default),
('Arya', 'Stark', '000000000003', default),
('Cersei', 'Lannister', '000000000004', 'Secretary');

INSERT INTO Member(firstName, lastName, dob)
VALUES
('Sansa', 'Stark', '1990-08-27'),
('Khal', 'Drogo', '1992-10-01'),
('Joffrey', 'Baratheon', '1984-01-08'),
('Sandor', 'Clegane', '1988-06-23'),
('Ramsay', 'Bolton', '1996-04-18');

INSERT INTO Member(firstName, lastName, dob, damageBan, banBeginDate)
VALUES
('Petyr', 'Baelish', '1978-12-13', true, '2017-12-05'),
('Oberyn', 'Martell', '1956-03-12', true, '2018-08-02'),
('Eddard', 'Stark', '1989-07-23', true, '2018-03-06');

INSERT INTO Member(firstName, lastName, dob, normalBan, banBeginDate)
VALUES
('Ned', 'Stark', '1993-11-01', true, '2018-04-10');

INSERT INTO Rental(gameID, memberID, returnDate, returned, extensions)
VALUES
(3, 2, '2018-10-01', true, 0),
(2, 1, '2018-12-04', true, 1);

INSERT INTO Actions(staffID, memberID, dateOfAction, actionTaken)
VALUES
(4, 1, '2018-08-02', 'ban');

INSERT INTO Violates (memberID, dateOfViolation, nullified)
VALUES
(3, '2014-03-04', true);
>>>>>>> development
