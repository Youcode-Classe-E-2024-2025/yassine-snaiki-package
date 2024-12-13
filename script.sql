create database packagesdb;

\c packagesdb;

create table packages (
    id serial primary key,
    name varchar(255) not null,
    description text
);
create table authors (
    id serial primary key,
    name varchar(255) not null,
    email varchar(255) not null
);

create table author_package (
    id serial primary key,
    author_id int not null,
    package_id int not null,
    constraint fk_author foreign key (author_id) references authors ON DELETE CASCADE,
    constraint fk_package foreign key (package_id) references packages ON DELETE CASCADE
);

create table versions (
    id serial primary key,
    release_date date not null,
    name varchar(255) not null,
    package_id int not null,
    constraint fk_package foreign key (package_id) references packages ON DELETE CASCADE
);

INSERT INTO packages (name, description) VALUES
('Express', 'Fast, unopinionated, minimalist web framework for Node.js.'),
('React', 'A JavaScript library for building user interfaces.'),
('Vue', 'A progressive framework for building user interfaces.'),
('Angular', 'A platform for building mobile and desktop web applications.'),
('Lodash', 'A modern JavaScript utility library delivering modularity, performance, & extras.'),
('Axios', 'Promise based HTTP client for the browser and Node.js.'),
('Jest', 'Delightful JavaScript Testing Framework with a focus on simplicity.'),
('Webpack', 'A static module bundler for modern JavaScript applications.'),
('Babel', 'A JavaScript compiler.'),
('TypeScript', 'Strongly typed programming language that builds on JavaScript.'),
('Moment', 'Parse, validate, manipulate, and display dates in JavaScript.'),
('Chart.js', 'Simple yet flexible JavaScript charting library.'),
('Redux', 'A Predictable State Container for JS Apps.'),
('TailwindCSS', 'A utility-first CSS framework for rapid UI development.'),
('Next.js', 'The React Framework for Production.'),
('Nuxt.js', 'The intuitive Vue framework.'),
('Three.js', 'A JavaScript 3D library.'),
('D3', 'Bring data to life with HTML, SVG, and CSS.'),
('Socket.io', 'Bidirectional and low-latency communication for every platform.'),
('ESLint', 'Find and fix problems in your JavaScript code.');



INSERT INTO authors (name, email) VALUES
('Ryan Dahl', 'ryan.dahl@example.com'),    -- Author of Express
('Jordan Walke', 'jordan.walke@example.com'), -- Author of React
('Evan You', 'evan.you@example.com'),       -- Author of Vue
('Misko Hevery', 'misko.hevery@example.com'), -- Author of Angular
('John-David Dalton', 'john.dalton@example.com'), -- Author of Lodash
('Matt Zabriskie', 'matt.zabriskie@example.com'), -- Author of Axios
('Rick Hanlon', 'rick.hanlon@example.com'),  -- Author of Jest
('Tobias Koppers', 'tobias.koppers@example.com'), -- Author of Webpack
('Sebastian McKenzie', 'sebastian.mckenzie@example.com'), -- Author of Babel
('Anders Hejlsberg', 'anders.hejlsberg@example.com'), -- Author of TypeScript
('Jordan Walke', 'jordan.walke@example.com'), -- Author of Moment
('Evan You', 'evan.you@example.com'),       -- Author of Chart.js
('Misko Hevery', 'misko.hevery@example.com'), -- Author of Redux
('John-David Dalton', 'john.dalton@example.com'), -- Author of TailwindCSS
('Matt Zabriskie', 'matt.zabriskie@example.com'), -- Author of Next.js
('Rick Hanlon', 'rick.hanlon@example.com'),  -- Author of Nuxt.js
('Tobias Koppers', 'tobias.koppers@example.com'), -- Author of Three.js
('Sebastian McKenzie', 'sebastian.mckenzie@example.com'), -- Author of D3
('Anders Hejlsberg', 'anders.hejlsberg@example.com'), -- Author of Socket.io
('Ryan Dahl', 'ryan.dahl@example.com');    -- Author of ESLint


INSERT INTO author_package (author_id, package_id) VALUES
(1, 1),  -- Ryan Dahl is the author of Express
(2, 2),  -- Jordan Walke is the author of React
(3, 3),  -- Evan You is the author of Vue
(4, 4),  -- Misko Hevery is the author of Angular
(5, 5),  -- John-David Dalton is the author of Lodash
(6, 6),  -- Matt Zabriskie is the author of Axios
(7, 7),  -- Rick Hanlon is the author of Jest
(8, 8),  -- Tobias Koppers is the author of Webpack
(9, 9),  -- Sebastian McKenzie is the author of Babel
(10, 10), -- Anders Hejlsberg is the author of TypeScript
(2, 11), -- Jordan Walke is the author of Moment
(3, 12), -- Evan You is the author of Chart.js
(4, 13), -- Misko Hevery is the author of Redux
(5, 14), -- John-David Dalton is the author of TailwindCSS
(6, 15), -- Matt Zabriskie is the author of Next.js
(7, 16), -- Rick Hanlon is the author of Nuxt.js
(8, 17), -- Tobias Koppers is the author of Three.js
(9, 18), -- Sebastian McKenzie is the author of D3
(10, 19), -- Anders Hejlsberg is the author of Socket.io
(1, 20); -- Ryan Dahl is the author of ESLint


insert into versions (release_date, name, package_id) values
('2010-11-16', '4.18.2', 1),
('2011-02-15', '4.19.0', 1),
('2012-03-10', '5.0.0', 1),
('2013-04-20', '5.1.0', 1),
('2014-06-30', '5.2.0', 1),
('2015-08-25', '6.0.0', 1),

('2013-05-29', '18.2.0', 2),
('2014-07-15', '19.0.0', 2),
('2015-09-01', '20.0.0', 2),
('2016-10-10', '21.0.0', 2),
('2017-11-20', '22.0.0', 2),
('2018-12-30', '23.0.0', 2),

('2014-02-01', '3.2.47', 3),
('2015-03-15', '4.0.0', 3),
('2016-04-20', '4.1.0', 3),
('2017-05-25', '4.2.0', 3),
('2018-06-30', '5.0.0', 3),
('2019-07-10', '5.1.0', 3),

('2010-10-20', '15.2.3', 4),
('2011-11-11', '16.0.0', 4),
('2012-12-15', '17.0.0', 4),
('2013-01-20', '18.0.0', 4),
('2014-02-25', '19.0.0', 4),
('2015-03-10', '20.0.0', 4),

('2012-01-19', '4.17.21', 5),
('2013-02-25', '5.0.0', 5),
('2014-03-30', '5.1.0', 5),
('2015-04-15', '5.2.0', 5),
('2016-05-20', '6.0.0', 5),
('2017-06-25', '6.1.0', 5),

('2014-02-01', '1.3.4', 6),
('2016-01-01', '29.5.0', 7),
('2017-08-15', '5.75.0', 8),
('2017-07-15', '7.20.12', 9),
('2018-09-25', '4.9.5', 10),
('2019-01-05', '2.29.4', 11),
('2020-04-14', '4.2.1', 12),
('2021-02-10', '4.2.0', 13),
('2021-08-01', '3.3.0', 14),
('2022-10-25', '13.0.0', 15),
('2022-12-15', '3.0.0', 16),
('2023-03-19', '0.152.2', 17),
('2023-05-08', '7.10.0', 18),
('2023-06-13', '4.5.4', 19),
('2023-07-19', '8.39.0', 20);

create table admins(id serial primary key, username varchar(255) not null,
password varchar(255) not null);

insert into admins(username,password) values('admin','0000');
