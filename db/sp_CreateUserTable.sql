create table if not exists `user` (
    `email` text primary key,
    `hash` text,
    `salt` text,
    `token` text,
    `created` text
);