CREATE TABLE Trainers (
    id INT(6) UNSIGNED AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(10),
    quals VARCHAR(300),
    email VARCHAR(100),
    CONSTRAINT PK_Trainers PRIMARY KEY (id)
);

CREATE TABLE Clients (
    id INT(6) UNSIGNED AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    type ENUM('strength','athlete','gen_pop'),
    phone VARCHAR(10),
    email VARCHAR(100),
    comments VARCHAR(1000),
    trainerid INT(6) UNSIGNED,
    FOREIGN KEY FK_Client_Trainer (id)
    REFERENCES Trainers(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
    CONSTRAINT PK_Clients PRIMARY KEY (id)
);

CREATE TABLE Injuries (
    id INT(6) UNSIGNED AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    comments VARCHAR(1000),
    CONSTRAINT PK_Injuries PRIMARY KEY (id)
);

CREATE TABLE ClientInjuries (
    clientid INT(6) UNSIGNED,
    injuryid INT(6) UNSIGNED,
    comments VARCHAR(1000),
    FOREIGN KEY FK_ClientInjuries_Client (clientid)
    REFERENCES Clients(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
    FOREIGN KEY FK_ClientInjuries_Injury (injuryid)
    REFERENCES Injuries(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
    CONSTRAINT PK_ClientInjuries PRIMARY KEY (clientid,injuryid)
);

CREATE TABLE Milestones (
    id INT(6) UNSIGNED AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    type ENUM('competition','personal'),
    comments VARCHAR(1000),
    date DATE,
    CONSTRAINT PK_Milestones PRIMARY KEY (id)
);

CREATE TABLE ClientMilestones (
    clientid INT(6) UNSIGNED,
    milestoneid INT(6) UNSIGNED,
    FOREIGN KEY FK_ClientMilestone_Client (clientid)
    REFERENCES Clients(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
    FOREIGN KEY FK_ClientMilestone_Milestone (milestoneid)
    REFERENCES Milestones(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
    CONSTRAINT PK_ClientMilestones PRIMARY KEY (clientid,milestoneid)
);

CREATE TABLE Programs (
    id INT(6) UNSIGNED AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    type ENUM('strength','athlete','gen_pop'),
    comments VARCHAR(1000),
    startdate DATE,
    enddate DATE,
    CONSTRAINT PK_Programs PRIMARY KEY (id)
);

CREATE TABLE Movements (
    id INT(6) UNSIGNED AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    url VARCHAR(1000) NOT NULL,
    comments VARCHAR(1000),
    CONSTRAINT PK_Movements PRIMARY KEY (id)
);

CREATE TABLE Exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(1000),
    movementid INT(6) UNSIGNED NOT NULL,
    num_sets INT(2) UNSIGNED NOT NULL,
    comments VARCHAR(1000),
    FOREIGN KEY FK_Exercises_Movement (movementid)
    REFERENCES Movements(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
    CONSTRAINT PK_Exercises PRIMARY KEY (id)
);

CREATE TABLE Sets (
    id INT(6) UNSIGNED AUTO_INCREMENT,
    num_reps INT(2) UNSIGNED NOT NULL,
    rpe INT(1) UNSIGNED NOT NULL,
    tempo VARCHAR(10),
    exerciseid INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY FK_Sets_Exercise (exerciseid)
    REFERENCES Exercises(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
    CONSTRAINT PK_Sets PRIMARY KEY (id)
);

CREATE TABLE ClientPrograms (
    clientid INT(6) UNSIGNED,
    programid INT(6) UNSIGNED,
    state ENUM('past','current','future'),
    FOREIGN KEY FK_ClientPrograms_Client (clientid)
    REFERENCES Clients(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
    FOREIGN KEY FK_ClientPrograms_Program (programid)
    REFERENCES Programs(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
    CONSTRAINT PK_ClientPrograms PRIMARY KEY (clientid,programid)
);

CREATE TABLE ProgramExercises (
    programid INT(6) UNSIGNED,
    exerciseid INT(6) UNSIGNED,
    position INT(2) UNSIGNED NOT NULL,
    FOREIGN KEY FK_ProgramExercises_Program (programid)
    REFERENCES Programs(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
    FOREIGN KEY FK_ProgramExercises_Exercise (exerciseid)
    REFERENCES Exercises(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
    CONSTRAINT PK_ProgramExercises PRIMARY KEY (programid,exerciseid)
);
