create table qna (
   num int not null auto_increment,
   name  char(10) not null,
   subject char(100) not null,
   content text not null,
   regist_day char(20),
   recommended int,
   hit int,
   primary key(num)
);
