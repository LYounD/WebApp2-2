
create table student(
	student_id integer primary key,
	name varchar(10) not null,
	year tinyint not null default 1,
	dept_no integer not null,
	major varchar(20)
);

create table department(
	dept_no integer primary ky auto_increment,
	dept_name varchar(20) not null unique,
	office varchar(20) not null
	office_tel varchar(13)
);

alter table student change column major major varchar(30);

alter table student add column gender char(1);


alter table student drop column gender;

insert into student values (20070002, '송은이', 3, 4, '경영학');
insert into student values (20060001, '박미선', 4, 4, '경영학');
insert into student values (20030001, '이경규', 4, 2, '전자공학');
insert into student values (20040003, '김용만', 3, 2, '전자공학');
insert into student values (20060002, '김국진', 3, 1, '컴퓨터공학');
insert into student values (20100002, '한선화', 3, 4, '경영학');
insert into student values (20110001, '송지은', 2, 1, '컴퓨터공학');
insert into student values (20080003, '전효성', 4, 3, '법학');
insert into student values (20040002, '김구라', 4, 5, '영문학');
insert into student values (20070001, '김숙', 4, 4, '경영학');
insert into student values (20100001, '황광희', 3, 4, '경영학');
insert into student values (20110002, '권지용', 2, 1, '전자공학');
insert into student values (20030002, '김재진', 5, 1, '컴퓨터공학');
insert into student values (20070003, '신봉선', 4, 3, '법학');
insert into student values (20070005, '김신영', 2, 5, '영문학');
insert into student values (20100003, '임시환', 3, 1, '컴퓨터공학');
insert into student values (20070007, '정준하', 2, 4, '경영학');

insert into department(dept_name, office, office_tel) values ('컴퓨터공학', '이학관 101호', '02-3290-0123');
insert into department(dept_name, office, office_tel) values ('전자공학', '공학관 401호', '02-3290-2345');
insert into department(dept_name, office, office_tel) values ('법학', '법학관 201호', '02-3290-7896');
insert into department(dept_name, office, office_tel) values ('경영학', '경영관 104호', '02-3290-1112');
insert into department(dept_name, office, office_tel) values ('영문학', '문화관 303호', '02-3290-4412');


update student
set major = '전자전기공학'
where major = '전자공학';
update department
set dept_name = '전자전기공학'
where dept_name = '전자공학';
insert into department(dept_name, office, office_tel) values ('특수교육학과', '공학관 403호', '02-3290-2347');
UPDATE student SET major = '특수교육학과' dept_no = 6 where name = '송지은'
delete from student where name='권지용';
delete from student where name='김재진';

select * from student where major = '컴퓨터공학';
select student_id, year, major from student;
select * from student where year = 3;
select * from student where year = 1 or year = 2;
select * from student where dept_no = (select dept_no from department where dept_name = '경영학');

select * from student where student_id like '%2007%';
select * from student order by student_id;
select major from student group by major having avg(year) > 3;
select * from student where student_id like '%2007%' order by student_id limit 2;

select role from roles, movies where id=movie_id and name='Pi';
select first_name, last_name, role from actors, roles where id = actor_id and movie_id = (select id from movies where name = 'Pi');
select first_name, last_name from actors, roles where actor_id = id and movie_id = (select id from movies where name = 'Kill Bill: Vol. 1') and id in (select actor_id from roles where movie_id = (select id from movies where name = 'Kill Bill: Vol. 2'));
select first_name, last_name, count(movie_id) from actors, roles where id = actor_id group by id order by count(movie_id) desc limit 7; 
select genre from movies_genres group by genre order by count(movie_id) desc limit 3;
select first_name, last_name from (movies_genres natural join movies_directors), directors where id = director_id and genre = 'Thriller' group by id order by count(genre) desc limit 1;

select grade from grades, courses where course_id = id and name = 'Computer Science 143';
select name, grade from grades, students where id = student_id and course_id = (select id from courses where name = 'Computer Science 143') and grade < 'B-';
select s.name, c.name, grade from students s, courses c, grades where s.id = student_id and c.id = course_id and grade <= 'B-';
select name from courses, grades where course_id = id group by course_id having count(student_id) >= 2;