CREATE TABLE Clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    type ENUM('strength','athlete','gen_pop'),
    phone VARCHAR(10),
    email VARCHAR(100),
    comments VARCHAR(1000),
    trainerid INT(6) UNSIGNED,
    FOREIGN KEY FK_Client_Trainer (id),
    REFERENCES Trainers(id)
);

CREATE TABLE Trainers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(10),
    quals VARCHAR(300),
    email VARCHAR(100)
);

CREATE TABLE Injuries (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    comments VARCHAR(1000),
);

CREATE TABLE Milestones (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    type ENUM('competition','personal'),
    comments VARCHAR(1000),
    date DATE
);

CREATE TABLE Programs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    type ENUM('strength','athlete','gen_pop'),
    comments VARCHAR(1000),
    startdate DATE,
    enddate DATE
);

CREATE TABLE Exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(1000),
    movementid INT(6) UNSIGNED NOT NULL,
    num_sets INT(2) UNSIGNED NOT NULL,
    comments VARCHAR(1000),
    FOREIGN KEY FK_Exercises_Movement (movementid),
    REFERENCES Movements(id)
);

CREATE TABLE Sets (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    num_reps INT(2) UNSIGNED NOT NULL,
    rpe INT(1) UNSIGNED NOT NULL,
    tempo VARCHAR(10),
    exerciseid INT(6) UNSIGNED NOT NULL,
    FOREIGN KEY FK_Sets_Exercise (exerciseid),
    REFERENCES Exercises(id)
);

CREATE TABLE Movements (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    url VARCHAR(1000) NOT NULL,
    comments VARCHAR(1000),
);

CREATE TABLE ClientMilestones (
    clientid INT(6) UNSIGNED PRIMARY KEY,
    milestoneid INT(6) UNSIGNED PRIMARY KEY,
    FOREIGN KEY FK_ClientMilestone_Client (clientid),
    REFERENCES Clients(id),
    FOREIGN KEY FK_ClientMilestone_Milestone (milestoneid),
    REFERENCES Milestones(id)
);

CREATE TABLE ClientPrograms (
    clientid INT(6) UNSIGNED PRIMARY KEY,
    programid INT(6) UNSIGNED PRIMARY KEY,
    state ENUM('past','current','future'),
    FOREIGN KEY FK_ClientPrograms_Client (clientid),
    REFERENCES Clients(id),
    FOREIGN KEY FK_ClientPrograms_Program (programid),
    REFERENCES Programs(id)
);

CREATE TABLE ProgramExercises (
    programid INT(6) UNSIGNED PRIMARY KEY,
    exerciseid INT(6) UNSIGNED PRIMARY KEY,
    position INT(2) UNSIGNED NOT NULL,
    FOREIGN KEY FK_ProgramExercises_Program (programid),
    REFERENCES Programs(id),
    FOREIGN KEY FK_ProgramExercises_Exercise (exerciseid),
    REFERENCES Exercises(id)
);

CREATE TABLE ClientInjuries (
    clientid INT(6) UNSIGNED PRIMARY KEY,
    injuryid INT(6) UNSIGNED PRIMARY KEY,
    comments VARCHAR(1000),
    FOREIGN KEY FK_ClientInjuries_Client (clientid),
    REFERENCES Clients(id),
    FOREIGN KEY FK_ClientInjuries_Injury (injuryid),
    REFERENCES Injuries(id)
);
