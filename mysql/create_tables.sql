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
    FOREIGN KEY FK_Client_Trainer (trainerid)
    REFERENCES Trainers(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
    CONSTRAINT PK_Clients PRIMARY KEY (id)
);

CREATE TABLE Questionnaires (
    id INT(6) UNSIGNED AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    comments VARCHAR(1000),
    CONSTRAINT PK_Questionnaires PRIMARY KEY (id)
);

CREATE TABLE Questions (
    id INT(6) UNSIGNED AUTO_INCREMENT,
    question VARCHAR(1000) NOT NULL,
    CONSTRAINT PK_Questions PRIMARY KEY (id)
);

CREATE TABLE QuestionnairesQuestions (
    questionnaireid INT(6) UNSIGNED NOT NULL,
    questionid INT(6) UNSIGNED NOT NULL,
    value INT(3) NOT NULL,
    CONSTRAINT PK_QuestionnairesQuestions PRIMARY KEY (questionnaireid,questionid)
);

CREATE TABLE ClientsQuestionnaires (
    clientid INT(6) UNSIGNED NOT NULL,
    questionnaireid INT(6) UNSIGNED NOT NULL,
    state ENUM('past','current','future'),
    CONSTRAINT PK_ClientsQuestionnaires PRIMARY KEY (clientid,questionnaireid)
);

CREATE TABLE Injuries (
    id INT(6) UNSIGNED AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    comments VARCHAR(1000),
    CONSTRAINT PK_Injuries PRIMARY KEY (id)
);

CREATE TABLE Tracking (
    id INT(6) UNSIGNED AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    trackvar VARCHAR(100) NOT NULL,
    comments VARCHAR(1000),
    clientid INT(6) UNSIGNED,
    FOREIGN KEY FK_Tracking_Client (clientid)
    REFERENCES Clients(id)
    ON UPDATE CASCADE
    ON DELETE RESTRICT,
    CONSTRAINT PK_Tracking PRIMARY KEY (id)
);

CREATE TABLE TrackingValues (
    trackingid INT(6) UNSIGNED NOT NULL,
    date DATE NOT NULL,
    value FLOAT(7,4) NOT NULL,
    comments VARCHAR(1000),
    CONSTRAINT PK_TrackingValues PRIMARY KEY (trackingid,date,value)
);

CREATE TABLE ClientsInjuries (
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

CREATE TABLE ClientsMilestones (
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

CREATE TABLE ClientsPrograms (
    clientid INT(6) UNSIGNED,
    programid INT(6) UNSIGNED,
    state ENUM('past','current','future'),
    loadlevel ENUM('amber','green'),
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

CREATE TABLE ProgramsExercises (
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
