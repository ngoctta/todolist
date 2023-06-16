create table works (
    id int PRIMARY key AUTO_INCREMENT NOT NULL,
	name varchar NOT NULL,
    start_date datetime,
    end_date datetime,
    status tinyint NOT NULL,
    created_at timestamp,
    updated_at timestamp
)