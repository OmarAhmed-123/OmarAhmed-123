show databases ;
CREATE TABLE Courses (
    CourseID INT PRIMARY KEY,
    CourseName VARCHAR(50),
    Level INT
);


CREATE TABLE Students (
    StudentID INT PRIMARY KEY,
    Username VARCHAR(50),
    Password VARCHAR(50),
    Level INT
);

CREATE TABLE Doctors (
    DoctorID INT PRIMARY KEY,
    Username VARCHAR(50),
    Password VARCHAR(50) 
);

CREATE TABLE StudentCourses (
    StudentID INT,
    CourseID INT,
    FOREIGN KEY (StudentID) REFERENCES Students(StudentID),
    FOREIGN KEY (CourseID) REFERENCES Courses(CourseID),
    PRIMARY KEY (StudentID, CourseID)
);
-- Inserting courses for level 1
INSERT INTO Courses (CourseID, CourseName, Level)
VALUES
    (101, 'COMP101', 1),
    (102, 'COMP102', 1),
    (104, 'COMP104', 1),
    (106, 'COMP106', 1),
    (108, 'COMP108', 1),
    (110, 'COMP110', 1),
    (112, 'COMP112', 1),
    (114, 'COMP114', 1);

-- Inserting courses for level 2
INSERT INTO Courses (CourseID, CourseName, Level)
VALUES
    (201, 'COMP201', 2),
    (202, 'COMP202', 2),
    (204, 'COMP204', 2),
    (206, 'COMP206', 2),
    (208, 'COMP208', 2),
    (210, 'COMP210', 2),
    (212, 'COMP212', 2),
    (214, 'COMP214', 2);

-- Inserting courses for level 3
INSERT INTO Courses (CourseID, CourseName, Level)
VALUES
    (301, 'COMP301', 3),
    (302, 'COMP302', 3),
    (304, 'COMP304', 3),
    (306, 'COMP306', 3),
    (308, 'COMP308', 3),
    (310, 'COMP310', 3),
    (312, 'COMP312', 3),
    (314, 'COMP314', 3);

-- Inserting courses for level 4
INSERT INTO Courses (CourseID, CourseName, Level)
VALUES
    (401, 'COMP401', 4),
    (402, 'COMP402', 4),
    (404, 'COMP404', 4),
    (406, 'COMP406', 4),
    (408, 'COMP408', 4),
    (410, 'COMP410', 4),
    (412, 'COMP412', 4),
    (414, 'COMP414', 4);
