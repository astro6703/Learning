create database portfolio;

create table portfolio.answers (
    id int not null primary key auto_increment,
    postedAt datetime not null,
    question1Answer int not null check (question1Answer >= 1 and question1Answer <= 2),
    question2Answer int not null check (question2Answer >= 1 and question2Answer <= 3),
    fullTextAnswer varchar(1000) not null,
    studentFullName varchar(200) not null,
    email varchar(200) not null
)