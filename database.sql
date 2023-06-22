create table works (
    id int PRIMARY key AUTO_INCREMENT NOT NULL,
	name(255) varchar NOT NULL,
    start_date datetime,
    end_date datetime,
    status tinyint NOT NULL,
    created_at timestamp,
    updated_at timestamp
);
create table users (
    id int PRIMARY key AUTO_INCREMENT NOT NULL,
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    created_at timestamp,
    updated_at timestamp
);