<?php


/**
 * Session Fixation: is when an attacker forces/tricks a user into using a specific session id.
 * 
 * example: Attacker creates a session, aquires the session id, sends it to the victim.
 * if the victim logs in, they'll be using attacker's sesson id, now the attacker is logged in as them.
 * 
 * How to prevent Session Fixation:
 * 1. Regenerate session id on login
 *  After user logs in, generate a new session to avoid using the one set before authentication.
 * 2. Force HTTPS
 *  Without https, attackers can sniff session IDs, over the network.
 */