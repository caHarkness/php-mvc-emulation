<?php
    define("DATABASE_FILE_NAME", "master.db");
    define("DATABASE_DIRECTORY", "/var/www/api.caharkness.com/db");

    class Database
    {
        public static function query($input)
        {
            $output = array();
            $pdo    = new PDO("sqlite:" . DATABASE_DIRECTORY . "/" . DATABASE_FILE_NAME);
            
            $pdo->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);

            if (file_exists(DATABASE_DIRECTORY . "/{$input}"))
                $input = file_get_contents(DATABASE_DIRECTORY . "/{$input}");

            $query = $pdo->prepare($input);

            if (func_num_args() > 1)
            {
                $args = func_get_args();
                array_shift($args);

                $query->execute($args);
            }
            else
            $query->execute();

            while ($row = $query->fetch())
                array_push($output, $row);

            $pdo = null;

            foreach ($output as $i => $row)
                foreach ($row as $key => $value)
                    if (is_numeric($key))
                        unset($output[$i][$key]);

            return
            array_values($output);
        }
    }
?>