create table book (
   num int not null auto_increment,
   name  char(40) not null,
   author char(30) not null,
   price int not null,
   genre char(20) not null,
   publisher char(40) not null,
   publish_day char(20) not null,
   recommended int default 0,
   prize int default 0,
   path_img varchar(200) not null,
   primary key(num)
);

insert into book(name,author,price,genre,publisher,publish_day) values('순수','조너선프랜즌',18500,'소설','은행나무','2018.05.11');
insert into book(name,author,price,genre,publisher,publish_day) values('데미안','헤르만 헤세',8000,'소설','민음사','2009.01.20');
insert into book(name,author,price,genre,publisher,publish_day) values('바깥은 여름','김애란',13000,'소설','문학동네','2017.06.28');
insert into book(name,author,price,genre,publisher,publish_day) values('나미야 잡화점의 기적','히가시노 게이고',14800,'소설','현대문학','2012.12.19');
insert into book(name,author,price,genre,publisher,publish_day) values('종의 기원','정유정',13000,'소설','은행나무','2016.05.16');
insert into book(name,author,price,genre,publisher,publish_day) values('공중그네','오쿠다 히데오',12000,'소설','은행나무','2005.01.16');
insert into book(name,author,price,genre,publisher,publish_day) values('82년생 김지영','조남주',13000,'소설','민음사','2016.10.14');
insert into book(name,author,price,genre,publisher,publish_day) values('참을 수 없는 존재의 가벼움','밀란 쿤데라',11000,'소설','민음사','2009.12.24');
insert into book(name,author,price,genre,publisher,publish_day) values('율리시스 무어. 1: 시간의문','피에르도메니코 바칼라리오',9500,'소설','웅진주니어','2006.06.30');
insert into book(name,author,price,genre,publisher,publish_day) values('64의 비밀','박용기',9500,'소설','바람의아이들','2004.01.16');

insert into book(name,author,price,genre,publisher,publish_day) values('월든(완결판)','헨리 데이빗 소로우',13000,'에세이','은행나무','2011.08.22');
insert into book(name,author,price,genre,publisher,publish_day) values('진작 할 걸 그랬어','김소영',14800,'에세이','위즈덤하우스','2018.04.30');
insert into book(name,author,price,genre,publisher,publish_day) values('거의 정반대의 행복','난다',15000,'에세이','위즈덤하우스','2018.02.28');
insert into book(name,author,price,genre,publisher,publish_day) values('노무현:상식 혹은 희망','노무현',12000,'에세이','행복한책읽기','2002.03.05');
insert into book(name,author,price,genre,publisher,publish_day) values('하나네 집으로 놀러 오세요','한연희',8800,'에세이','행복한책읽기','2003.07.01');
insert into book(name,author,price,genre,publisher,publish_day) values('자유찾아 천만리','지현아',15000,'에세이','샘콘텐츠','2017.01.12');
insert into book(name,author,price,genre,publisher,publish_day) values('신화를 만든 정주영 리더십','전도근',12000,'에세이','북오션','2010.04.01');
insert into book(name,author,price,genre,publisher,publish_day) values('법정 스님의 무소유의 행복','장혜민',9800,'에세이','산호와진주','2017.05.26');
insert into book(name,author,price,genre,publisher,publish_day) values('내 인생에 힘이 되어준 한마디','정호승',10500,'에세이','비채','2006.03.08');
insert into book(name,author,price,genre,publisher,publish_day) values('365 매일 읽는 긍정의 한 줄','린다 피콘',13500,'에세이','책이있는풍경','2012.11.30');

insert into book(name,author,price,genre,publisher,publish_day) values('EBS 수능특강 고등 영어영역 영어듣기','EBS한국교육방송공사',7500,'참고서','EBS한국교육방송공사','2018.01.30');
insert into book(name,author,price,genre,publisher,publish_day) values('EBS 수능특강 고등 국어영역 문학','EBS한국교육방송공사',7500,'참고서','EBS한국교육방송공사','2018.01.30');
insert into book(name,author,price,genre,publisher,publish_day) values('EBS 뉴런 중학 수학1(상)','EBS한국교육방송공사',14000,'참고서','EBS한국교육방송공사','2018.01.05');
insert into book(name,author,price,genre,publisher,publish_day) values('EBS 개념완성 고등 과학탐구영역 통합과학','EBS한국교육방송공사',16000,'참고서','EBS한국교육방송공사','2017.12.01');
insert into book(name,author,price,genre,publisher,publish_day) values('에듀윌 부동산공법 체계도','김희상',6000,'참고서','에듀윌','2018.01.02');
insert into book(name,author,price,genre,publisher,publish_day) values('에듀윌 공인중개사 민법판례집','심정욱',17000,'참고서','에듀윌','2018.04.05');
insert into book(name,author,price,genre,publisher,publish_day) values('에듀윌 한국사능력검정시험 기출문제집 고급','에듀윌 한국사교육연구소',21000,'참고서','에듀윌','2017.12.07');
insert into book(name,author,price,genre,publisher,publish_day) values('위포트 코레일 실전 모의고사','위포트 연구소',13800,'참고서','위포트','2018.01.29');
insert into book(name,author,price,genre,publisher,publish_day) values('위포트 한국전력공사 직무능력검사 및 인성검사','위포트 연구소',19800,'참고서','위포트','2018.03.21');
insert into book(name,author,price,genre,publisher,publish_day) values('조민혁의 합격을 부르는 자소서','조민혁',19800,'참고서','위포트','2018.01.26');

insert into book(name,author,price,genre,publisher,publish_day) values('왜 세계의 절반은 굶주리는가','장 지글러',9800,'사회과학','갈라파고스','2007.03.12');
insert into book(name,author,price,genre,publisher,publish_day) values('왜 가난한 사람들은 부자를 위해 투표하는가','토마스 프랭크',16000,'사회과학','갈라파고스','2012.05.25');
insert into book(name,author,price,genre,publisher,publish_day) values('스페인 내전 우리가 그곳에 있었다','애덤 호크실드',27000,'사회과학','갈라파고스','2017.12.22');
insert into book(name,author,price,genre,publisher,publish_day) values('빈곤의 연대기','박선미',16800,'사회과학','갈라파고스','2015.03.25');
insert into book(name,author,price,genre,publisher,publish_day) values('코스모스','칼 세이건',18500,'사회과학','사이언스북스','2006.12.20');
insert into book(name,author,price,genre,publisher,publish_day) values('인체 완전판','앨리스 로버츠',59000,'사회과학','사이언스북스','2012.08.22');
insert into book(name,author,price,genre,publisher,publish_day) values('백년 허리','정선근',17500,'사회과학','사이언스북스','2015.12.31');
insert into book(name,author,price,genre,publisher,publish_day) values('세계 초고층 빌딩','존 힐',20000,'사회과학','안그라픽스','2018.01.08');
insert into book(name,author,price,genre,publisher,publish_day) values('태교 명곡','에모토 마사루',15000,'사회과학','안그라픽스','2007.04.26');
insert into book(name,author,price,genre,publisher,publish_day) values('바다의 마음, 브랜드의 처음','임태수',14000,'사회과학','안그라픽스','2018.03.30');

insert into book(name,author,price,genre,publisher,publish_day) values('삼국지 1','나관중',9800,'고전','창비','2003.07.10');
insert into book(name,author,price,genre,publisher,publish_day) values('삼국지 2','나관중',9800,'고전','창비','2003.07.10');
insert into book(name,author,price,genre,publisher,publish_day) values('삼국지 3','나관중',9800,'고전','창비','2003.07.10');
insert into book(name,author,price,genre,publisher,publish_day) values('삼국지 4','나관중',9800,'고전','창비','2003.07.10');
insert into book(name,author,price,genre,publisher,publish_day) values('햄릿','윌리엄 셰익스피어',7000,'고전','민음사','1998.08.05');
insert into book(name,author,price,genre,publisher,publish_day) values('로미오와 줄리엣','윌리엄 셰익스피어',7000,'고전','민음사','2008.02.28');
insert into book(name,author,price,genre,publisher,publish_day) values('리어 왕','윌리엄 셰익스피어',7000,'고전','민음사','2005.12.01');
insert into book(name,author,price,genre,publisher,publish_day) values('홍길동전, 전우치전','김현양',12000,'고전','문학동네','2010.08.28');
insert into book(name,author,price,genre,publisher,publish_day) values('구운몽','김만중',15000,'고전','문학동네','2013.12.14');
insert into book(name,author,price,genre,publisher,publish_day) values('사씨남정기','김만중',15000,'고전','문학동네','2014.10.04');
