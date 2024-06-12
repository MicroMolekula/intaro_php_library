CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(64) NOT NULL,
    middle_name VARCHAR(64),
    surname VARCHAR(64) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NOT NULL
);

CREATE TABLE book (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    image_book VARCHAR(128) NOT NULL,
    file_book VARCHAR(128) NOT NULL,
    download_allow BOOLEAN NOT NULL,
    genre VARCHAR(128) NOT NULL,
    author VARCHAR(128) NOT NULL,
    created_at TIMESTAMP NOT NULL
);

CREATE TABLE users_book (
    id SERIAL PRIMARY KEY,
    users_id BIGINT NOT NULL,
    book_id BIGINT NOT NULL,
    last_read_date TIMESTAMP,
    FOREIGN KEY (users_id)
        REFERENCES users (id),
    FOREIGN KEY (book_id)
        REFERENCES book (id)
);

