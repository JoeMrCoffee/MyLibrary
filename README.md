# MyLibrary

### About
MyLibrary is a simple web-based way to organize your personal library of books or other related items with reviews, cost, date read, title, author etc. I made it because my father wanted something simpler than a lot of the service-based platforms out there so it is designed around his requirements. 

### Installation
There is a docker-compose file included in the repository for easier install as well as the .sql structure for quickly setting up the database to accept data. Ensure that the MySQL instance has a database name 'mylibrary' and then import the mylibraryStructure.sql to that 

By default the MySQLlogin.ini file points to the docker host and gathers the data, but if any user wishes to adjust it - they may to a different MySQL instance in the host or a remote device. 

All contact from the web-interface to the MySQL database happens in the header.php file. Modifying the header.php file can adjust where to look for the MySQLlogin.ini file and / or the host URI. 

### Usage
The MyLibrary application / web interface is made to be self hosted on a VM, container, or old system that can be backed up and maintained on premise. Alternatively, it should be simple enough to run in a LAMP stack in the cloud - either in Linode, AWS, or other turnkey cloud provider. 

There is no log in as this is designed to run on-prem in an isolated environment for a select person or group of person(s) with no separation of user privilege. Just open the host IP/mylibrary.php (e.g. 10.10.10.10/mylibrary.php or 192.168.1.10/mylibrary.php, etc.) 

Once running all the books entered will display their title, author and data read on the home page in a row of 5 entries per row. Click 'VIEW' to see the detailed information about each entry. To create a new entry click the 'NEW BOOK' at the top bar. All books can have their entries updated by clicking on the 'VIEW' and under the details click 'Update'. 

The pop-up information about each book on the home page is the information in the 'Comment' section per book. By design the comment should be shorter than the 'Review' section - again based on my father's method for organization. 


### Troubleshooting
#### Bring up
When getting started the initial bring up can be standard LAMP stack with the MySQL template/structure imported. PHPMyAdmin would provide a graphical way to create a database, and also import the structure to begin accepting data. Command line methods are fine as well. Something similar to below should work to get started.

mysql -u [user] -p [database_name] < [filename].sql

More reference: https://phoenixnap.com/kb/how-to-backup-restore-a-mysql-database

#### Uploading images
The images folder in the repo needs to be set with the correct permissions to accept the image files. If created from the docker-compose file, enter the websvr-lamp instace by running "docker exec -it websvr-lamp bash" command. It should enter at the location /var/www/html/ directory. Simply then run 'chown www-data:www-data -R images/' to change the directory permission to the web server owner. This should resolve the issues. 

If deployed in a different LAMP instance, the same rule would apply, but the user needs to navigate to the web server host /var/www/html/ directory and run 'chown www-data:www-data -R images/'.

