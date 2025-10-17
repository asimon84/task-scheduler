Task Scheduler
==============

This is a simple task scheduler demo project.

Installation
============

git clone git@github.com:asimon84/task-scheduler.git

composer install

php artisan migrate

php artisan db:seed

php artisan serve

npm run build

POINTS OF INTEREST
==================

From the dashboard you can view the currently created schedules. Click the action buttons on the right columnof the table to view the project schedules.

After clicking, you will be taken to the project page. Here you can see the project's schedule that you clicked on. This will list project tasks by order of priority. You can drag and drop tasks to reorder priority. Clicking create new taks button will create a new tasks. Clicking the edit button will allow you to edit an existing task. Clicking the delete button will allow you to delete a task.
