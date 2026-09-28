CREATE DATABASE IF NOT EXISTS movie_db;
USE movie_db;

DROP TABLE IF EXISTS movies;

CREATE TABLE movies (
    movie_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    director VARCHAR(100) NOT NULL,
    release_year INT NOT NULL,
    genre VARCHAR(50) NOT NULL
);

INSERT INTO movies (title, director, release_year, genre) VALUES
('Inception', 'Christopher Nolan', 2010, 'Sci-Fi'),
('The Godfather', 'Francis Ford Coppola', 1972, 'Crime'),
('Pulp Fiction', 'Quentin Tarantino', 1994, 'Drama'),
('Spirited Away', 'Hayao Miyazaki', 2001, 'Animation'),
('The Dark Knight', 'Christopher Nolan', 2008, 'Action');