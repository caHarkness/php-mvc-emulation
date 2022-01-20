<?php
    ob_clean();

    function getLiveVideoID()
    {
        $vid = null;

        if($data = file_get_contents("https://www.youtube.com/pinkshades/live"))
        {
            // Find the video ID in there
            if (preg_match("/\'VIDEO_ID\': \"(.*?)\"/", $data, $matches))
                $vid = $matches[1];
            else
            throw new Exception("Couldn't find video ID");
        }
        else
        throw new Exception("Couldn't find video ID");

        return $vid;
    }

    echo getLiveVideoID();


    ob_end_flush();
    exit;
?>