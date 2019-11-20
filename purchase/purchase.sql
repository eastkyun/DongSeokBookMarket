create table purchase (
   purchase_num int not null auto_increment,
   book_num  int not null,
   user_id char(80) not null,
   quantity int not null,
   ship_num int,
   primary key(purchase_num)
);
