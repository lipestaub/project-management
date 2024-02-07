CREATE DATABASE project_manager

CREATE TABLE public.user(
    id serial4 NOT NULL,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(32) NOT NULL,
    CONSTRAINT user_pkey PRIMARY KEY (id)
);

CREATE TABLE public.project(
    id serial4 NOT NULL,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) NULL,
    start_date DATE NULL,
    end_date DATE NULL,
    CONSTRAINT project_pkey PRIMARY KEY (id)
);

CREATE TABLE public.task(
    id serial4 NOT NULL,
    description VARCHAR(255) NOT NULL,
    project_id int4 NOT NULL,
    start_date DATE NULL,
    end_date DATE NULL,
    CONSTRAINT task_pkey PRIMARY KEY (id),
    FOREIGN KEY (project_id) REFERENCES project(id)
);

CREATE TABLE public.assignment(
    id serial4 NOT NULL,
    user_id int4 NOT NULL,
    task_id int4 NOT NULL,
    date TIMESTAMPTZ DEFAULT CURRENT_TIMESTAMP AT TIME ZONE 'UTC' - INTERVAL '3 hours',
    CONSTRAINT assignment_pkey PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES "user"(id),
    FOREIGN KEY (task_id) REFERENCES task(id)
);