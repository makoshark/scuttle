Scuttle (Development Snapshot)
http://scuttle.org/

Copyright (C) 2004 - 2010 Marcus Campbell
Copyright (C) 2011 Thomas Niepraschk
Copyright (C) 2011 Benjamin Mako Hill
Available under the GNU General Public License

============
INSTALLATION
============

* Use the SQL contained in tables.sql to create the necessary database tables. This file was written specifically for MySQL, so may need rewritten if you intend to use a different database system.

* Edit config.inc.php.example and save the changes as a new config.inc.php file in the same directory.

* Set the CHMOD permissions on the /cache/ subdirectory to 777

=====================
PHP 8 Transition/Bugs
=====================

Notes:

- Things are working but (a) I have not touched the RSS code.

- The search.in.php stuff seems broken such that if you search in subsets the selection is totally broken when it comes back.

- There are still a number of errors that show up.
