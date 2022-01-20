--create table if not exists `Json` (
--    `Key` text,
--    `Value` text
--);

replace into `Json` (
    `Key`,
    `Value`
) values (
    ?,
    ?
);