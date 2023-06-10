-- tables is created in the database (MySQL)
CREATE TABLE orderForm(
    id int not null auto_increment,
    fname varchar(255) not null,
    email varchar(255) not null unique,
    contact_no int not null,
    piz_type varchar(255) not null,
    piz_size varchar(255) not null,
    cru_type varchar(255) not null,
    add_top varchar(255),
    delivery char(3) not null,
    d_address varchar(255),
    pay varchar(255) not null,  
    primary key (id)
);
-- Inserting a single row to test the connectivity
INSERT INTO orderForm(fname, email, contact_no, piz_type, piz_size, cru_type, add_top, delivery, d_address, pay)
VALUES ('Rick Bob', 'firstandlast@email.ca', 1234567890, 'Margherita','small','thin- crust','onions,','yes','Duckworth','cash');