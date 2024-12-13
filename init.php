<?php

global $db;


function tableExists($db, $tableName) {
    $query = "SELECT EXISTS (
        SELECT FROM information_schema.tables 
        WHERE table_schema = 'public' 
        AND table_name = :table_name
    )";
    $result = $db->query($query, ['table_name' => $tableName])->fetch(PDO::FETCH_ASSOC);
    return $result['exists'] ?? false;
}
function insertDataIfEmpty($db, $tableName, $data) {
    $rowCount = $db->query("SELECT COUNT(*) AS count FROM $tableName")->fetch(PDO::FETCH_ASSOC)['count'];
    if ($rowCount == 0) {
        foreach ($data as $query) {
            $db->query($query);
        }
    }
}



$queries = [
    'packages' => "
        CREATE TABLE IF NOT EXISTS packages (
            id SERIAL PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            description TEXT
        );
    ",
    'authors' => "
        CREATE TABLE IF NOT EXISTS authors (
            id SERIAL PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL
        );
    ",
    'author_package' => "
        CREATE TABLE IF NOT EXISTS author_package (
            id SERIAL PRIMARY KEY,
            author_id INT NOT NULL,
            package_id INT NOT NULL,
            CONSTRAINT fk_author FOREIGN KEY (author_id) REFERENCES authors ON DELETE CASCADE,
            CONSTRAINT fk_package FOREIGN KEY (package_id) REFERENCES packages ON DELETE CASCADE
        );
    ",
    'versions' => "
        CREATE TABLE IF NOT EXISTS versions (
            id SERIAL PRIMARY KEY,
            release_date DATE NOT NULL,
            name VARCHAR(255) NOT NULL,
            package_id INT NOT NULL,
            CONSTRAINT fk_package FOREIGN KEY (package_id) REFERENCES packages ON DELETE CASCADE
        );
    ",
    'admins' => "
        CREATE TABLE IF NOT EXISTS admins (
            id SERIAL PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
        );
    ",
];
$a=0;
foreach ($queries as $tableName => $sql) {
    if (!tableExists($db, $tableName)) {
     
        $db->query($sql);
    }else {
       $a++; 
    }
}
if($a === 4) exit();

$initialData = [
    'packages' => [
        "INSERT INTO packages (name, description) VALUES
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
        ('ESLint', 'Find and fix problems in your JavaScript code.');"
    ],
    'authors' => [
        "INSERT INTO authors (name, email) VALUES
        ('Ryan Dahl', 'ryan.dahl@example.com'),
        ('Jordan Walke', 'jordan.walke@example.com'),
        ('Evan You', 'evan.you@example.com'),
        ('Misko Hevery', 'misko.hevery@example.com'),
        ('John-David Dalton', 'john.dalton@example.com'),
        ('Matt Zabriskie', 'matt.zabriskie@example.com'),
        ('Rick Hanlon', 'rick.hanlon@example.com'),
        ('Tobias Koppers', 'tobias.koppers@example.com'),
        ('Sebastian McKenzie', 'sebastian.mckenzie@example.com'),
        ('Anders Hejlsberg', 'anders.hejlsberg@example.com');"
    ],
    'author_package' => [
        "INSERT INTO author_package (author_id, package_id) VALUES
        (1, 1),
        (2, 2),
        (3, 3),
        (4, 4),
        (5, 5),
        (6, 6),
        (7, 7),
        (8, 8),
        (9, 9),
        (10, 10),
        (2, 11),
        (3, 12),
        (4, 13),
        (5, 14),
        (6, 15),
        (7, 16),
        (8, 17),
        (9, 18),
        (10, 19),
        (1, 20);"
    ],
    'versions' => [
        "INSERT INTO versions (release_date, name, package_id) VALUES
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
        ('2023-07-19', '8.39.0', 20);"
    ],
    'admins' => [
        "INSERT INTO admins (username, password) VALUES
        ('admin', '0000');"
    ],
];

// Insert data into each table
foreach ($initialData as $tableName => $data) {
    insertDataIfEmpty($db, $tableName, $data);
}
