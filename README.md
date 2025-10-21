Task Scheduler
==============

This is a simple task scheduler demo project.

Installation
============

git clone git@github.com:asimon84/task-scheduler.git

Rename the file ".env.example" to ".env" 

composer install

npm run build

php artisan migrate

php artisan db:seed

php artisan serve

POINTS OF INTEREST
==================

From the dashboard you can view the currently created projects and task priorities. You can drag and drop tasks and they will update priorities. You can select a certain task to view from the drop down.

You can click the navbar menu at the top to go to the projects or tasks pages. From there you can view, create, edit, and delete tasks.
