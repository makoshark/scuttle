Scuttle (Development Snapshot)
http://scuttle.org/

Copyright (C) 2004 - 2010 Marcus Campbell
Copyright (C) 2011 Thomas Niepraschk
Copyright (C) 2011 - 2023 Benjamin Mako Hill
Available under the GNU General Public License

============
INSTALLATION
============

* Use the SQL contained in tables.sql to create the necessary database tables. This file was written specifically for MySQL, so may need rewritten if you intend to use a different database system.

* Edit config.inc.php.example and save the changes as a new config.inc.php file in the same directory.

* Set the CHMOD permissions on the /cache/ subdirectory to 777

=============
ARCHIVE LINKS
=============

I've added new functionality to Scuttle to include links to the Internet Archive's Wayback Machine (https://web.archive.org) to to any archiving service that supports the "memento" URL standard. Basically, if you enable this with the two lines I've added to config.inc.php.example, you'll get automatic links placed next to each bookmark that will take you whichever archived copy of the page is closest to in time.

Of course, it is also nice to make sure these are archived. I've written a short archiving program in Python that I plan to run from the cronjob. I will link to here once I have finished debugging it.
