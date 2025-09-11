<?php

// the logical OR operator returns true if either of the two operands are true

// also || can be used

// also or, OR, Or

// example: you need to clear the cache of a website, if 'expired' or '$purge' is true
$expired = true;
$purged = false;
$clear_cache = $expired || $purged;

var_dump($clear_cache); // bool(true)

// IMPORTANT:
// short-curcuiting is also done in or operator

function connect_to_db()
{
	return true;
}

connect_to_db() || die('Cannot connect to the database.');
// in this example, the message will not evaluate since the first operand is already true

// some special scenarios or gotchas
$result = false or true;

var_dump($result); // bool(false)

// since php evaluates the operator with higher precedence first, the above expression is essentially this:
($result = false) or true;

// therefore, false is assigned to $result

// to fix this, you can use parentheses
$result = (false or true);
var_dump($result); // bool(true)

// or you can use the || operator
$result = false || true;
var_dump($result); // bool(true)

// it is recommended to use || instead of or
