<?php
?>

<h1>Title</h1>
<p>This text is part of the footer. This partial view will be rendered on every page. Below, you will see the parameters passed in the URI encoded in JSON.<p>

<pre><?php echo json_encode($arrParameters, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES); ?></pre>

<hr>