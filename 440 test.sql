CREATE TABLE Students(
	ID int primary key auto_increment,
    studentId Int unique,
    name varchar(20),
    major varchar(20),
    year varchar(15)
    );

create table courses(
ID int primary key auto_increment,
studentid int,
courseName Varchar(20),
units varchar(5)
);

insert into Student(Studentid, name, major, year) Value (200507859, 'Rutvik', 'CompSci', 'Senior');
insert into courses(studentId, coursename, units) values (200507859, 'COMP440', '3.0');
insert into courses(studentId, coursename, units) values (200507859, 'COMP490', '3.0');
    