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
    description TEXT,
    image_book VARCHAR(128) NOT NULL,
    file_book VARCHAR(128) NOT NULL,
    download_allow BOOLEAN NOT NULL,
    created_at TIMESTAMP NOT NULL
);

CREATE TABLE genre (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL
);

CREATE TABLE author (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL
);

CREATE TABLE book_genre (
    book_id BIGINT NOT NULL,
    genre_id BIGINT NOT NULL,
    FOREIGN KEY (book_id) 
        REFERENCES book (id),
    FOREIGN KEY (genre_id)
        REFERENCES genre (id)
);

CREATE TABLE book_author (
    book_id BIGINT NOT NULL,
    author_id BIGINT NOT NULL,
    FOREIGN KEY (book_id)
        REFERENCES book (id),
    FOREIGN KEY (author_id)
        REFERENCES author (id)
);

CREATE TABLE users_book (
    users_id BIGINT NOT NULL,
    book_id BIGINT NOT NULL,
    last_read_date TIMESTAMP,
    FOREIGN KEY (users_id)
        REFERENCES users (id),
    FOREIGN KEY (book_id)
        REFERENCES book (id)
);