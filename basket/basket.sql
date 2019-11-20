create table basket (
   basket_num int not null auto_increment,
   book_num  int not null,
   user_id char(80) not null,
   quantity int not null,
   primary key(basket_num)
);
