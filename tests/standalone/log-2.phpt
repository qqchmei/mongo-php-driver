--TEST--
Test for MongoLog (pool only)
--SKIPIF--
<?php require __DIR__ ."/skipif.inc"; ?>
--FILE--
<?php
require __DIR__ . "/../utils.inc";
function error_handler($code, $message)
{
	echo $message, "\n";
}

set_error_handler('error_handler');

MongoLog::setModule(MongoLog::POOL);
MongoLog::setLevel(MongoLog::ALL);
$m = new Mongo("mongodb://$STANDALONE_HOSTNAME:$STANDALONE_PORT");
?>
--EXPECTF--
Mongo::__construct(): %s:%d: pool get (%s)
Mongo::__construct(): %s:%d: pool connect (%s)
Unknown: %s:%d: pool done (%s)
