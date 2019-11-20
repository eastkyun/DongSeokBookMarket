create table community (
   num int not null auto_increment, --일련번호
   class int not null, -- 게시판 종류 free -> 1 notic -> 2 qna -> 3 상품평 -> 4 (책과 1: n)
   id char(15) not null, --회원아이디
   name  char(10) not null, --회원이름
   subject char(100) not null, --제목
   content text not null, --내용
   regist_day char(20), --작성일 및 시간
   recommended int,
   hit int, --조회수
   primary key(num)
);
